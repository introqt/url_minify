<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Url;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class UrlService
 *
 * @package App\Services
 */
class UrlService implements UrlServiceInterface
{
    /**
     * @param UrlDtoInterface $url_dto
     * @return Url
     */
    public function createUrl(UrlDtoInterface $url_dto): Url
    {
        $url = $this->generateUniqueUrl();

        return Url::create([
            'original_url' => $url_dto->getOriginalUrl(),
            'expires_at' => $url_dto->getExpiresAt(),
            'short_url' => $url,
        ]);
    }

    /**
     * @param string $direction
     * @return Collection
     */
    public function getUrls($direction = 'ASC'): Collection
    {
        return Url::orderBy('expires_at', $direction)->get();
    }

    /**
     * @param $url
     */
    public function updateTransitionsCounter($url): void
    {
        $url->update([
            'transitions' => $url->transitions + 1,
        ]);
    }

    /**
     * @return string
     */
    private function generateUniqueUrl(): string
    {
        do {
            $url = \Str::random(10);
        } while ($this->checkIfUrlExists($url));

        return $url;
    }

    /**
     * @param string $url
     * @return bool
     */
    private function checkIfUrlExists(string $url): bool
    {
        return Url::whereShortUrl($url)->count() > 0;
    }
}
