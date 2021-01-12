<?php

declare(strict_types=1);

namespace Brewmap\Http\Requests\User;

use Brewmap\Http\Requests\BaseRequest;
use Brewmap\Http\Requests\User\Rules\EmailRules;

class UpdateEmailRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            "email" => EmailRules::rules([
                "unique:users",
            ]),
        ];
    }
}
