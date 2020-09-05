<?php

declare(strict_types=1);

namespace Brewmap\Services;

use Brewmap\Eloquent\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticationService
{
    public function Login(Request $request): string
    {
        $user = User::where('email', $request->email)->first();

        if ($user === null ||!Hash::check($request->password, $user->password)) {
            throw new HttpResponseException(response()->json(["message" => __('auth.credentialsMismatch')], 401));
        }
        return $user->createToken($user->email)->plainTextToken;
    }
}
