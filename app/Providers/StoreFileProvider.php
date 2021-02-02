<?php

declare(strict_types=1);

namespace Brewmap\Providers;

use Brewmap\Contracts\StoreFile;
use Brewmap\Services\Profile\StoreFileService as Service;
use Illuminate\Support\ServiceProvider;

class StoreFileProvider extends ServiceProvider
{
    public function register(): void
    {
        app()->bind(StoreFile::class, fn (): Service => new Service());
    }
}
