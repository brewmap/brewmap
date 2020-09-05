<?php

declare(strict_types=1);

namespace Brewmap\Providers;

use Brewmap\Eloquent\Observers\User as UserObserver;
use Brewmap\Eloquent\User;
use Illuminate\Support\ServiceProvider;
use RuntimeException;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * @throws RuntimeException
     */
    public function boot(): void
    {
        User::observe(UserObserver::class);
    }
}
