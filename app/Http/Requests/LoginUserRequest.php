<?php

declare(strict_types=1);

namespace Brewmap\Http\Requests;

class LoginUserRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            "email" => [
                "required",
                "email",
            ],
            "password" => [
                "required",
                "string",
                "min:8",
            ],
        ];
    }
}
