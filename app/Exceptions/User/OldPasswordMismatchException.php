<?php

declare(strict_types=1);

namespace Brewmap\Exceptions\User;

use Brewmap\Exceptions\ApiException;
use Illuminate\Http\Response;

class OldPasswordMismatchException extends ApiException
{
    protected $message = "Old password is mismatch!";
    protected $code = Response::HTTP_UNPROCESSABLE_ENTITY;
}
