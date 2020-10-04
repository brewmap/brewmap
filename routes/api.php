<?php

declare(strict_types=1);

use Brewmap\Http\Controllers\API\ApplicationController;
use Brewmap\Http\Controllers\API\AuthenticationController;
use Illuminate\Routing\Router;

/** @var Router $router */
$router = app(Router::class);

$router->get("/", ApplicationController::class);

$router->post("/login", [AuthenticationController::class, "login"]);
$router->post("/register", [AuthenticationController::class, "register"]);
