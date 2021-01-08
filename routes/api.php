<?php

declare(strict_types=1);

use Brewmap\Http\Controllers\API\ApplicationController;
use Brewmap\Http\Controllers\API\AuthenticationController;
use Brewmap\Http\Controllers\API\ProfileController;
use Illuminate\Routing\Router;

/** @var Router $router */
$router = app(Router::class);

$router->get("/", ApplicationController::class);

$router->post("/login", [AuthenticationController::class, "login"]);
$router->post("/register", [AuthenticationController::class, "register"]);

$router->group([
    "middleware" => "auth:sanctum",
], function () use ($router): void {
    $router->get("/profile", [ProfileController::class, "edit"]);
    $router->put("/profile/updated", [ProfileController::class, "update"]);
});
