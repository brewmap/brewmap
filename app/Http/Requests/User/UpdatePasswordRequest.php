<?php

declare(strict_types=1);

namespace Brewmap\Http\Requests\User;

use Brewmap\Http\Requests\BaseRequest;
use Brewmap\Http\Requests\User\Rules\PasswordRules;

class UpdatePasswordRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            "password" => PasswordRules::rules([
                "confirmed",
            ]),
            "old_password" => PasswordRules::rules([]),
        ];
    }
}
