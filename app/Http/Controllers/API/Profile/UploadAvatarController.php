<?php

declare(strict_types=1);

namespace Brewmap\Http\Controllers\API\Profile;

use Brewmap\Contracts\StoreFile;
use Brewmap\Http\Controllers\Controller;
use Brewmap\Http\Requests\Profile\UpdateProfileAvatarRequest;
use Illuminate\Http\JsonResponse;

class UploadAvatarController extends Controller
{
    public function store(UpdateProfileAvatarRequest $request, StoreFile $service): JsonResponse
    {
        $pathToAvatar = $service->storeFile("users", $request->file("file"));

        return new JsonResponse([
            "path_to_file" => $pathToAvatar,
        ]);
    }
}
