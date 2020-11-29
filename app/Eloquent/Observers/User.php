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

        if ($this->isFirstUser()) {
            $user->isAdmin = true;
        }
    }

    public function created(UserModel $user): void
    {
        $user->profile()->create();
    }

    protected function isFirstUser(): bool
    {
        return UserModel::query()->count() === 0;
    }
}
