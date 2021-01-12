<?php

declare(strict_types=1);

namespace Brewmap\Http\Requests\Profile\Rules;

use Brewmap\Http\Requests\BaseRules;

class AvatarFileRules extends BaseRules
{
    protected static array $rules = [
        "required",
        "mimes:jpg,png,jpeg,gif",
        "max:2048",
    ];
}
