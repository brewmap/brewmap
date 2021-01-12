<?php

declare(strict_types=1);

namespace Brewmap\Http\Requests\Profile;

use Brewmap\Http\Requests\BaseRequest;
use Brewmap\Http\Requests\Profile\Rules\AvatarFileRules;

class UpdateProfileAvatarRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            "file" => AvatarFileRules::rules(),
        ];
    }
}
