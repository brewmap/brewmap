<?php

declare(strict_types=1);

namespace Brewmap\Http\Controllers\API\User;

use Brewmap\Exceptions\User\OldPasswordMismatchException;
use Brewmap\Http\Controllers\Controller;
use Brewmap\Http\Requests\User\UpdatePasswordRequest;
use Brewmap\Services\UpdatePasswordService;
use Illuminate\Http\JsonResponse;

class PasswordChangeController extends Controller
{
    /**
     * @throws OldPasswordMismatchException
     */
    public function update(UpdatePasswordRequest $request, UpdatePasswordService $service): JsonResponse
    {
        $service->updatePassword($request->validated());

        return new JsonResponse([
            "message" => __("profile.password_updated"),
        ]);
    }
}
