<?php

declare(strict_types=1);

namespace Brewmap\Services;

class UpdateProfileService
{
    public function updateProfileData(array $input): void
    {
        auth()->user()->profile->update($input);
    }
}
