<?php

declare(strict_types=1);

namespace Brewmap\Exceptions\User;

use Brewmap\Exceptions\ApiException;
use Illuminate\Http\Response;

class NewEmailChangingException extends ApiException
{
    protected $message = "Please choose another email address.";
    protected $code = Response::HTTP_UNPROCESSABLE_ENTITY;
}
