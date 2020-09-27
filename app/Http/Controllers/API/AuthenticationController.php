<?php

declare(strict_types=1);

namespace Brewmap\Http\Controllers\API;

use Brewmap\Exceptions\Auth\SocialProviderConfigurationException;
use Brewmap\Exceptions\Auth\UnauthorizedException;
use Brewmap\Http\Controllers\Controller;
use Brewmap\Http\Requests\User\LoginUserRequest;
use Brewmap\Http\Requests\User\RegisterUserRequest;
use Brewmap\Services\AuthenticationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

class AuthenticationController extends Controller
{
    /**
     * @throws UnauthorizedException
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
     * @throws SocialProviderConfigurationException
     */
    public function handleFacebookCallback(AuthenticationService $authenticationService): JsonResponse
    {
        $facebookUser = Socialite::driver("facebook")->user();
        $token = $authenticationService->getTokenBySocialLogin($facebookUser, "github");
        return response()->json(["token" => $token]);
    }
}
