<?php

declare(strict_types=1);

use Brewmap\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware("auth:api")->get("/user", fn(Request $request): User => $request->user());
