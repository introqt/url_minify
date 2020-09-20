<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;

interface UrlService
{
    public function createUrl();

    public function getUrls(): Collection;
}
