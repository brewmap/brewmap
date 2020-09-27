<?php

declare(strict_types=1);

namespace Brewmap\Http\Requests\User\Rules;

use Brewmap\Http\Requests\BaseRules;

class EmailRules extends BaseRules 
{
    protected static array $rules = [
        "required",
        "email",
    ];
}
