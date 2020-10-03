<?php

declare(strict_types=1);

namespace Brewmap\Services;

use Brewmap\Eloquent\SocialProfile;
use Brewmap\Eloquent\User;
use Brewmap\Exceptions\Auth\SocialProviderConfigurationException;
use Brewmap\Exceptions\Auth\UnauthorizedException;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
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
        $user = User::query()->where("email", $request->email)->first();
        if ($user === null || !$this->hash->check($request->password, $user->password)) {
            throw new UnauthorizedException(__("auth.credentials_mismatch"));
        }
        return $user->createToken($user->email)->plainTextToken;
    }

    public function register(array $input): void
    {
        $input["password"] = $this->hash->make($input["password"]);
        $user = User::create($input);
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
        try {
            $user = SocialProfile::query()->where($socialProviderName . "_id", $socialUser->getId())->firstOrFail()->user;
        } catch (ModelNotFoundException $exception) {
            $user = new User();
            $user->name = $socialUser->getName();
            $user->email = $socialUser->getEmail();
            $user->save();

            $socialProfile = new SocialProfile();
            $socialProfile->userId = $user->id;
            $socialProviderIdProperty = $socialProfile->getProperty($socialProviderName . "Id");
            $socialProfile->$socialProviderIdProperty = $socialUser->getId();
            $socialProfile->save();
        }

        return $user->createToken($user->email)->plainTextToken;
    }

    private function isSocialProviderConfigured(string $socialProviderName): bool
    {
        $services = config("services");
        $schema = app(Schema::class); 
        if (!array_key_exists($socialProviderName, $services) || $services[$socialProviderName] === null || !$schema::hasColumn("social_profiles", $socialProviderName . "_id")) {
            return false;
        }
        return true;
    }
}
