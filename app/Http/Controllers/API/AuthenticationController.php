<?php

declare(strict_types=1);

namespace Brewmap\Http\Controllers\API;

use Brewmap\Http\Controllers\Controller;
use Brewmap\Http\Requests\User\RegisterUserRequest;
use Brewmap\Http\Requests\User\LoginUserRequest;
use Brewmap\Services\AuthenticationService;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

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

    public function register(RegisterUserRequest $request, AuthenticationService $authenticationService): JsonResponse
    {
        $authenticationService->register($request->validated());
        return response()->json(["message" => __("auth.registerSuccess")]);
    }

    public function redirectToFacebook(): RedirectResponse
    {
        return Socialite::driver("facebook")->redirect();
    }

    /**
     * @throws HttpResponseException
     */
    public function handleFacebookCallback(AuthenticationService $authenticationService): JsonResponse
    {
        $facebookUser = Socialite::driver("facebook")->user();
        $token = $authenticationService->getTokenBySocialLogin($facebookUser, "facebook");
        return response()->json(["token" => $token]);
    }
}
