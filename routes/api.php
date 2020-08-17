<?php

declare(strict_types=1);

use Brewmap\Http\Controllers\API\ApplicationController;
use Illuminate\Routing\Router;

/** @var Router $router */
$router = app(Router::class);

$router->get("/", ApplicationController::class);
