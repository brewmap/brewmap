<?php

declare(strict_types=1);

namespace Brewmap\Http\Requests;

class BaseRules
{
    protected static array $rules;
    public static function rules(array $additionalRules = []): array
    {
        return array_merge(static::$rules, $additionalRules);
    }
}
