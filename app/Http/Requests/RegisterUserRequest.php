<?php

declare(strict_types=1);

namespace Brewmap\Http\Requests;

class RegisterUserRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            "email" => [
                "required",
                "email",
                "unique:users",
            ],
            "password" => [
                "required",
                "string",
                "min:8",
                "confirmed",
            ],
            "name" => [
                "required",
                "min:4",
                "max:20",
                "alpha_dash",
            ],
        ];
    }
}
