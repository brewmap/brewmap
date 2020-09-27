<?php

declare(strict_types=1);

namespace Brewmap\Exceptions;

use Brewmap\Exceptions\Auth\ApiException;
use Illuminate\Foundation\Exceptions\Handler as LaravelHandler;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends LaravelHandler
{
    public function render($request, Throwable $exception): Response
    {
        if ($request->isJson() || $exception instanceof ApiException) {
            return response()->json(
                [
                    "message" => $exception->getMessage(),
                ],
                $exception->getCode() ?? Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
        return parent::render($request, $exception);
    }
}
