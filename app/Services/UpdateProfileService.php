<?php

declare(strict_types=1);

namespace Brewmap\Services;

use Illuminate\Contracts\Auth\Guard;

class UpdateProfileService
{
    protected Guard $guard;

    public function __construct(Guard $guard)
    {
        $this->guard = $guard;
    }

    public function updateProfileData(array $input): void
    {
        $this->guard->user()->profile->update($input);
    }
}
