<?php

declare(strict_types=1);

namespace Brewmap\Nova\Metrics;

use Brewmap\Eloquent\User;
use Laravel\Nova\Metrics\Value;
use Laravel\Nova\Metrics\ValueResult;

class Users extends Value
{
    public function calculate(): ValueResult
    {
        return $this->result(User::query()->count());
    }

    public function uriKey(): string
    {
        return "users";
    }
}
