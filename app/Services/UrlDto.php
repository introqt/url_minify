<?php

declare(strict_types=1);

namespace App\Services;

/**
 * Class UrlDto
 *
 * @package App\Services
 */
class UrlDto implements UrlDtoInterface
{
    /** @var string */
    private $original_url;

    /** @var string|null */
    private $expires_at;

    /**
     * UrlDto constructor.
     *
     * @param array $request
     */
    public function __construct(array $request)
    {
        $this->setOriginalUrl($request['original_url']);
        $this->setExpiresAt($request['expires_at'] ?? null);
    }

    /**
     * @return string
     */
    public function getOriginalUrl(): string
    {
        return $this->original_url;
    }

    /**
     * @return string
     */
    public function getExpiresAt(): ?string
    {
        return $this->expires_at;
    }

    /**
     * @param string $original_url
     */
    private function setOriginalUrl(string $original_url): void
    {
        $this->original_url = $original_url;
    }

    /**
     * @param string|null $expires_at
     */
    private function setExpiresAt(?string $expires_at): void
    {
        $this->expires_at = $expires_at;
    }
}
