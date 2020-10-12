<?php

declare(strict_types=1);

namespace Brewmap\Nova\Resources;

use Brewmap\Eloquent\Country as EloquentCountry;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Country extends Resource
{
    public static string $model = EloquentCountry::class;
    public static $title = "name";
    public static $search = [
        "code",
        "slug",
        "name",
    ];

    /**
     * @throws InvalidArgumentException
     */
    public static function indexQuery(NovaRequest $request, $query): Builder
    {
        if (empty($request->get("orderBy"))) {
            $query->getQuery()->orders = [];
            return $query->orderBy("code");
        }

        return $query;
    }

    public function fields(Request $request): array
    {
        return [
            Text::make("flag", fn (): string => view("nova.partials.flag")->with("country", $this)->render())
                ->asHtml()
                ->onlyOnIndex(),
            Text::make("code")
                ->sortable()
                ->rules(["required", "max:255"]),
            Text::make("slug")
                ->sortable()
                ->onlyOnIndex()
                ->rules(["required", "max:255"]),
            Text::make("name")
                ->sortable()
                ->rules(["required", "max:255"]),
        ];
    }

    public static function authorizedToCreate(Request $request): bool
    {
        return false;
    }

    public function authorizedToUpdate(Request $request): bool
    {
        return false;
    }

    public function authorizedToDelete(Request $request): bool
    {
        return false;
    }
}
