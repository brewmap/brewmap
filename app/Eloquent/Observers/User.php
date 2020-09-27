<?php

declare(strict_types=1);

namespace Brewmap\Eloquent\Observers;

use Brewmap\Eloquent\Traits\CreatingWithUuid;
use Brewmap\Eloquent\User as UserModel;

class User
{
    use CreatingWithUuid;

    public function created(UserModel $user): void
    {
        $user->profile()->create();
    }
}
