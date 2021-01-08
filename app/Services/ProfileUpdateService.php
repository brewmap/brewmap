<?php

declare(strict_types=1);

namespace Brewmap\Services;

use Brewmap\Eloquent\Profile;
use Carbon\Carbon;

class ProfileUpdateService
{
    private $profile;

    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
    }

    public function updateProfileData(array $input): void
    {
        $input["birthday"] = Carbon::parse($input["birthday"]);
        $this->profile
            ->where("user_id", auth()->user()->id)
            ->update($input->parseDates());
    }
}
