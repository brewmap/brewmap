<?php

declare(strict_types=1);

namespace Brewmap\Eloquent\Observers;

use Brewmap\Eloquent\User as UserModel;
use Illuminate\Support\Str;

class User
{
    public function creating(UserModel $user): void
    {
        if ($user->id === null) {
            $user->id = Str::uuid()->toString();
        }
    }

    public function created(UserModel $user): void
    {
        $user->profile()->create();
    }
}
