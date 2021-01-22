<?php

declare(strict_types=1);

namespace Brewmap\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Profile extends JsonResource
{
    /**
     * @param Request $request
     */
    public function toArray($request): array
    {
        /** @var Profile $profile */
        $profile = $this->resource;

        return [
            "data" => [
                "public_name" => $profile->publicName,
                "avatar_path" => $profile->avatarPath,
                "birthday" => $profile->birthday,
            ],
        ];
    }
}
