<?php

declare(strict_types=1);

namespace Brewmap\Nova\Metrics;

use Brewmap\Eloquent\User;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Value;
use Laravel\Nova\Metrics\ValueResult;

class NewUsers extends Value
{
    public function calculate(NovaRequest $request): ValueResult
    {
        return $this->count($request, User::class);
    }

    public function ranges(): array
    {
        return [
            "TODAY" => "Today",
            "MTD" => "Month To Date",
            "QTD" => "Quarter To Date",
            "YTD" => "Year To Date",
        ];
    }

    public function uriKey(): string
    {
        return "new-users";
    }
}
