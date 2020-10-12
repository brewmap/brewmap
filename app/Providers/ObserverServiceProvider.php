<?php

declare(strict_types=1);

namespace Brewmap\Providers;

use Brewmap\Eloquent\Country;
use Brewmap\Eloquent\Observers\Country as CountryObserver;
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
        Country::observe(CountryObserver::class);
        User::observe(UserObserver::class);
    }
}
