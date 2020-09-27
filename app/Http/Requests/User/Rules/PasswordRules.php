<?php

declare(strict_types=1);

namespace Brewmap\Http\Requests\User\Rules;

use Brewmap\Http\Requests\BaseRules;

class PasswordRules extends BaseRules
{
    protected static array $rules = [
        "required",
        "string",
        "min:8",
    ];   
}
