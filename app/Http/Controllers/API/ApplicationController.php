<?php

declare(strict_types=1);

namespace Brewmap\Http\Controllers\API;

use Brewmap\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApplicationController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        return response()->json(
            [
                "environment" => config("app.env"),
                "locale" => $request->getLocale(),
            ]
        );
    }
}
