<?php

declare(strict_types=1);

namespace Brewmap\Http\Controllers\API\User;

use Brewmap\Http\Controllers\Controller;
use Brewmap\Http\Requests\User\UpdatePasswordRequest;
use Brewmap\Services\UpdatePasswordService;
use Illuminate\Http\JsonResponse;

class PasswordChangeController extends Controller
{
    /**
     * Update the user password with cofirmation old password.
     *
     * @param \Illuminate\Http\Request $request
     * @throws OldPasswordMismatchException
     */
    public function update(UpdatePasswordRequest $request, UpdatePasswordService $service): JsonResponse
    {
        $service->updatePassword($request->validated());
        return response()->json([
            "message" => __("profile.password_updated"),
        ]);
    }
}
