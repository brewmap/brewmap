<?php

declare(strict_types=1);

namespace Brewmap\Exceptions\Auth;

use Illuminate\Http\Response;

class UnauthorizedException extends ApiException
{
    protected $code = Response::HTTP_UNAUTHORIZED;
}
