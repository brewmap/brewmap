<?php

declare(strict_types=1);

namespace Brewmap\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = "Brewmap\Http\Controllers";

    public function map(): void
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    protected function mapApiRoutes(): void
    {
        Route::prefix("api")
            ->middleware("api")
            ->namespace($this->namespace)
            ->group(base_path("routes/api.php"));
    }

    protected function mapWebRoutes(): void
    {
        Route::middleware("web")
            ->namespace($this->namespace)
            ->group(base_path("routes/web.php"));
    }
}
