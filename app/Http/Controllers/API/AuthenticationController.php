<?php

declare(strict_types=1);

namespace Brewmap\Http\Controllers\API;

use Brewmap\Http\Controllers\Controller;
use Brewmap\Http\Requests\LoginUserRequest;
use Brewmap\Services\AuthenticationService;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class AuthenticationController extends Controller
{
    /**
     * @throws HttpResponseException
     */
    public function login(LoginUserRequest $request, AuthenticationService $authenticationService): JsonResponse
    {
        $token = $authenticationService->login($request);
        return response()->json(["token" => $token]);
    }
}
