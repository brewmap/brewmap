<?php

declare(strict_types=1);

namespace Brewmap\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as LaravelHandler;
use Symfony\Component\HttpFoundation\Response;

class Handler extends LaravelHandler
{
    protected function unauthenticated($request, AuthenticationException $exception): Response
    {
        return response()->json(["message" => $exception->getMessage()], Response::HTTP_UNAUTHORIZED);
    }
}
