<?php

declare(strict_types=1);

namespace Brewmap\Exceptions\Auth;

use Exception;
use Illuminate\Http\Response;

class SocialProviderConfigurationException extends Exception
{
    protected $message;
    protected $code = Response::HTTP_NOT_IMPLEMENTED;

    public function __construct()
    {
        $this->message = __("auth.social_service_error");
    }
}
