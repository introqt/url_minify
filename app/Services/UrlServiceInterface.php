<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Url;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface UrlServiceInterface
 *
 * @package App\Services
 */
interface UrlServiceInterface
{
    /**
     * @param UrlDtoInterface $url
     * @return Url
     */
    public function createUrl(UrlDtoInterface $url): Url;

    /**
     * @param string $direction
     * @return Collection
     */
    public function getUrls($direction = 'ASC'): Collection;

    /**
     * @param $url
     */
    public function updateTransitionsCounter($url): void ;
}
