<?php

declare(strict_types=1);

namespace Brewmap\Http\Requests\Profile;

use Brewmap\Http\Requests\BaseRequest;
use Brewmap\Http\Requests\Profile\Rules\AvatarPathRules;
use Brewmap\Http\Requests\Profile\Rules\BirthdayRules;
use Brewmap\Http\Requests\Profile\Rules\PublicNameRules;

class UpdateProfileRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            "public_name" => PublicNameRules::rules(),
            "birthday" => BirthdayRules::rules(),
            "avatar_path" => AvatarPathRules::rules(),
        ];
    }
}
