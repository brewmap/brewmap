<?php

declare(strict_types=1);

namespace Brewmap\Services;

use Brewmap\Eloquent\SocialProfile;
use Brewmap\Eloquent\User;
use Brewmap\Exceptions\Auth\SocialProviderConfigurationException;
use Brewmap\Exceptions\Auth\UnauthorizedException;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Http\Request;
use Laravel\Socialite\Contracts\User as SocialUser;

class AuthenticationService
{
    protected Hasher $hash;

    public function __construct(Hasher $hash)
    {
        $this->hash = $hash;
    }

    /**
     * @throws UnauthorizedException
     */
    public function login(Request $request): string
    {
        /** @var User|null $user */
        $user = User::query()->where("email", $request->input("email"))->first();

        if ($user === null || !$this->hash->check($request->input("password"), $user->password)) {
            throw new UnauthorizedException(__("auth.credentials_mismatch"));
        }

        return $user->createToken($user->email)->plainTextToken;
    }

    public function register(array $input): void
    {
        $input["password"] = $this->hash->make($input["password"]);
        $user = User::query()->create($input);
        $user->save();
    }

    /**
     * @throws SocialProviderConfigurationException
     */
    public function getTokenBySocialLogin(SocialUser $socialUser, string $socialProviderName): string
    {
        if (!$this->isSocialProviderConfigured($socialProviderName)) {
            throw new SocialProviderConfigurationException();
        }
        $user = $this->matchOrCreateSocialUser($socialUser, $socialProviderName);
        return $user->createToken($user->email)->plainTextToken;
    }

    private function matchOrCreateSocialUser(SocialUser $socialUser, string $socialProviderName): User
    {
        /** @var SocialProfile|null $socialProfile */
        $socialProfile = SocialProfile::query()->where("provider_id", $socialUser->getId())->first();

        if ($socialProfile !== null) {
            $user = $socialProfile->user;
        } else {
            $user = User::query()->where("email", $socialUser->getEmail())->first();

            if ($user === null) {
                $user = new User();
                $user->name = $socialUser->getName();
                $user->email = $socialUser->getEmail();
                $user->save();
            }

            $socialProfile = new SocialProfile();
            $socialProfile->userId = $user->id;
            $socialProfile->providerId = $socialUser->getId();
            $socialProfile->providerName = $socialProviderName;
            $socialProfile->save();
        }

        return $user;
    }

    private function isSocialProviderConfigured(string $socialProviderName): bool
    {
        $services = config("services");

        if (!array_key_exists($socialProviderName, $services) || $services[$socialProviderName] === null) {
            return false;
        }

        return true;
    }
}
