<?php

declare(strict_types=1);

namespace Brewmap\Nova\Metrics;

use Brewmap\Eloquent\Country;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Value;
use Laravel\Nova\Metrics\ValueResult;

class Countries extends Value
{
    public function calculate(NovaRequest $request): ValueResult
    {
        return $this->count($request, Country::class);
    }

    public function uriKey(): string
    {
        return "countries";
    }
}
