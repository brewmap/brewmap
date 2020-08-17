<?php

declare(strict_types=1);

use Brewmap\Http\Controllers\HomeController;
use Illuminate\Routing\Router;

/** @var Router $router */
$router = app(Router::class);

$router->get("/", HomeController::class);
