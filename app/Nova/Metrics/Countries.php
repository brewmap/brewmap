<?php

declare(strict_types=1);

namespace Brewmap\Nova\Metrics;

use Brewmap\Eloquent\Country;
use Laravel\Nova\Metrics\Value;
use Laravel\Nova\Metrics\ValueResult;

class Countries extends Value
{
    public function calculate(): ValueResult
    {
        return $this->result(Country::query()->count());
    }

    public function uriKey(): string
    {
        return "countries";
    }
}
