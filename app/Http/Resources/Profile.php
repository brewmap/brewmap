<?php

declare(strict_types=1);

namespace Brewmap\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Profile extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function toArray($request): array
    {
        return [
            "data" => [
                "public_name" => $this->public_name,
                "avatar_path" => $this->avatar_path,
                "birthday" => $this->birthday,
            ],
        ];
    }
}
