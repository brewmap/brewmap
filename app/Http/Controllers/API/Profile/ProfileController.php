<?php

declare(strict_types=1);

namespace Brewmap\Http\Controllers\API\Profile;

use Brewmap\Http\Controllers\Controller;
use Brewmap\Http\Requests\Profile\UpdateProfileRequest;
use Brewmap\Http\Resources\Profile as ProfileResource;
use Brewmap\Services\UpdateProfileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit(Request $request): JsonResponse
    {
        return new JsonResponse(new ProfileResource($request->user()->profile));
    }


    public function update(UpdateProfileRequest $request, UpdateProfileService $service): JsonResponse
    {
        $service->updateProfileData($request->validated());

        return new JsonResponse([
            "message" => __("profile.profile_updated"),
        ]);
    }
}
