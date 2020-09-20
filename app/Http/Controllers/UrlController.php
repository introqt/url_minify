<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CreateUrlRequest;
use App\Models\Url;
use App\Services\UrlDto;
use App\Services\UrlServiceInterface;

/**
 * Class UrlController
 *
 * @package App\Http\Controllers
 */
class UrlController extends Controller
{
    /** @var UrlServiceInterface */
    private $service;

    /**
     * UrlController constructor.
     *
     * @param UrlServiceInterface $service
     */
    public function __construct(UrlServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('home', [
            'urls' => $this->service->getUrls()
        ]);
    }

    /**
     * @param CreateUrlRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(CreateUrlRequest $request)
    {
        $dto = new UrlDto($request->all());

        $url = $this->service->createUrl($dto);

        return redirect()->back()->with('success', "Your shroten link: " . url($url->short_url));
    }

    /**
     * @param Url $url
     * @return \Illuminate\Http\RedirectResponse
     */
    public function link(Url $url)
    {
        // todo: ideally move to middleware; response depends on bussiness logic
        if (now()->gte($url->expires_at)) {
            abort(404);
        }

        $this->service->updateTransitionsCounter($url);

        return redirect()->to($url->original_url);
    }
}
