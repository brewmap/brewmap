<?php

declare(strict_types=1);

namespace Brewmap\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as LaravelHandler;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends LaravelHandler
{
    public function render($request, Throwable $e): Response
    {
        if ($request->isJson() || $e instanceof ApiException) {
            return response()->json(
                [
                    "message" => $e->getMessage(),
                ],
                $e->getCode()
            );
        }

        return parent::render($request, $e);
    }
}
