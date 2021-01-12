<?php

declare(strict_types=1);

namespace Brewmap\Http\Controllers\API\Profile;

use Brewmap\Http\Controllers\Controller;
use Brewmap\Http\Requests\Profile\UpdateProfileAvatarRequest;
use Brewmap\Services\StoreFileService;
use Illuminate\Http\JsonResponse;

class UploadAvatarController extends Controller
{
    private $pathToAvatar;

    public function store(UpdateProfileAvatarRequest $request, StoreFileService $service): JsonResponse
    {
        $this->pathToAvatar = $service->storeFile("users");
        return response()->json([
            "path_to_file" => $this->pathToAvatar,
        ]);
    }
}
