<?php

declare(strict_types=1);

namespace Brewmap\Services;

use Brewmap\Eloquent\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Contracts\User as FacebookUser;

class AuthenticationService
{
    /**
     * @throws HttpResponseException
     */
    public function login(Request $request): string
    {
        $user = User::where("email", $request->email)->first();

        if ($user === null || !Hash::check($request->password, $user->password)) {
            throw new HttpResponseException(response()->json(["message" => __("auth.credentialsMismatch")], 401));
        }
        return $user->createToken($user->email)->plainTextToken;
    }

    public function register(array $input): void
    {
        $input["password"] = Hash::make($input["password"]);
        $user = User::create($input);
        $user->save();
    }

    public function authorizeByFacebook(FacebookUser $facebookUser): string
    {
        $user = User::where("facebook_id", $facebookUser->getId())->first();
        if (!$user) {
            $user = new User;
            $user->name = $facebookUser->getName();
            $user->email = $facebookUser->getEmail();
            $user->facebookId = $facebookUser->getId();
            $user->save();
        }
        return $user->createToken($user->email)->plainTextToken;
    }
}
