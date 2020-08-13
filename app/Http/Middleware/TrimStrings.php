<?php

declare(strict_types=1);

namespace Brewmap\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    protected $except = [
        "password",
        "password_confirmation",
    ];
}
