<?php

declare(strict_types=1);

namespace Brewmap\Exceptions\User;

use Brewmap\Exceptions\ApiException;
use Illuminate\Http\Response;

class NewEmailChangingException extends ApiException
{
    protected $message = "This email is being used by another user!";
    protected $code = Response::HTTP_UNPROCESSABLE_ENTITY;
}
