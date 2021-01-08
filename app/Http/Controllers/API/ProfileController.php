<?php

declare(strict_types=1);

namespace Brewmap\Http\Controllers\API;

use Brewmap\Http\Controllers\Controller;
use Brewmap\Http\Requests\Profile\UpdateProfileRequest;
use Brewmap\Http\Resources\Profile as ProfileResource;
use Brewmap\Services\ProfileUpdateService;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    /**
     * Edit the specified resource in storage.
     */

    public function edit(): JsonResponse
    {
        return response()->json([
            new ProfileResource(auth()->user()->profile),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Brewmap\Services\ProfileUpdateService $service
     */
    public function update(UpdateProfileRequest $request, ProfileUpdateService $service): JsonResponse
    {
        $service->updateProfileData($request->validated());
        return response()->json([
            "message" => __("profile.profile_updated"),
        ]);
    }
}
