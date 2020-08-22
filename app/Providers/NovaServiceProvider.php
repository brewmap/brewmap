<?php

declare(strict_types=1);

namespace Brewmap\Providers;

use Brewmap\Eloquent\User as BrewmapUser;
use Brewmap\Nova\Metrics\NewUsers;
use Brewmap\Nova\Resources\User;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    protected function routes(): void
    {
        Nova::routes()->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    protected function gate(): void
    {
        Gate::define(
            "viewNova",
            function (BrewmapUser $user): bool {
                return true;
            }
        );
    }

    protected function resources(): void
    {
        Nova::resources([
            User::class,
        ]);
    }

    protected function cards(): array
    {
        return [
            new NewUsers(),
        ];
    }
}
