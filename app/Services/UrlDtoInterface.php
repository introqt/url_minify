<?php

declare(strict_types=1);

namespace App\Services;

/**
 * Interface UrlDtoInterface
 *
 * @package App\Services
 */
interface UrlDtoInterface
{
    /**
     * @return string
     */
    public function getOriginalUrl(): string;

    /**
     * @return string|null
     */
    public function getExpiresAt(): ?string;
}
