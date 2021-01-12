<?php

declare(strict_types=1);

namespace Brewmap\Http\Controllers\API\User;

use Brewmap\Exceptions\User\OldPasswordMismatchException;
use Brewmap\Http\Requests\User\UpdatePasswordRequest;
use Brewmap\Services\UpdatePasswordService;
use Brewmap\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class PasswordChangeController extends Controller
{
    /**
     * Update the user password with cofirmation old password.
     *
     * @param UpdatePasswordRequest $request
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
