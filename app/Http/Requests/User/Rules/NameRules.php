<?php

declare(strict_types=1);

namespace Brewmap\Http\Requests\User\Rules;

use Brewmap\Http\Requests\BaseRules;

class NameRules extends BaseRules
{
    protected static array $rules = [
        "required",
        "min:4",
        "max:20",
        "alpha_dash",
    ];
}
