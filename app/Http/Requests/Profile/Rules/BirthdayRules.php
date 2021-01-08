<?php

declare(strict_types=1);

namespace Brewmap\Http\Requests\Profile\Rules;

use Brewmap\Http\Requests\BaseRules;

class BirthdayRules extends BaseRules
{
    protected static array $rules = [
        "date",
    ];
}
