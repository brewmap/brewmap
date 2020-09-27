<?php

declare(strict_types=1);

namespace Brewmap\Http\Requests\User;

use Brewmap\Http\Requests\BaseRequest;
use Brewmap\Http\Requests\User\Rules\EmailRules;
use Brewmap\Http\Requests\User\Rules\PasswordRules;

class LoginUserRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            "email" => EmailRules::rules(),              
            "password" => PasswordRules::rules()
        ];
    }
}
