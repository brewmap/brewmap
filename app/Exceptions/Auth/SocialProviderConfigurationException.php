<?php

declare(strict_types=1);

namespace Brewmap\Exceptions\Auth;

use Exception;
use Illuminate\Http\Response;

class SocialProviderConfigurationException extends Exception
{
    protected $message = "Attempted social service provider is not configured properly.";
    protected $code = Response::HTTP_NOT_IMPLEMENTED;  
}
