<?php

declare(strict_types=1);

use Brewmap\Http\Controllers\HomeController;
use Brewmap\Http\Controllers\API\AuthenticationController;
use Illuminate\Routing\Router;

/** @var Router $router */
$router = app(Router::class);

$router->get("/", HomeController::class);

$router->get('/facebook', [AuthenticationController::class, "redirectToFacebook"]);
$router->get('/facebook/callback', [AuthenticationController::class, "handleFacebookCallback"]);