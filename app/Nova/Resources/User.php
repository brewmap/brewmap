<?php

declare(strict_types=1);

namespace Brewmap\Nova\Resources;

use Brewmap\Eloquent\User as EloquentUser;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;

class User extends Resource
{
    public static string $model = EloquentUser::class;
    public static $title = "name";
    public static $search = [
        "id",
        "name",
        "email",
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),
            Gravatar::make()->maxWidth(64),
            Text::make("Name")
                ->sortable()
                ->rules(["required", "max:255"]),
            Text::make("Email")
                ->sortable()
                ->rules(["required", "email", "max:254"])
                ->creationRules(["unique:users,email"])
                ->updateRules(["unique:users,email,{{resourceId}}"]),
            Boolean::make('Administrator', 'is_admin'),
            DateTime::make("Email verified at")
                ->sortable()
                ->hideWhenCreating()
                ->hideWhenUpdating(),
            Password::make("Password")
                ->onlyOnForms()
                ->creationRules(["required", "string", "min:8"])
                ->updateRules(["nullable", "string", "min:8"]),
        ];
    }
}
