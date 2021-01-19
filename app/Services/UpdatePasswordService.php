<?php

declare(strict_types=1);

namespace Brewmap\Services;

use Brewmap\Exceptions\User\OldPasswordMismatchException;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Hashing\Hasher;

class UpdatePasswordService
{
    protected Hasher $hash;
    protected Guard $guard;

    public function __construct(Hasher $hash, Guard $guard)
    {
        $this->hash = $hash;
        $this->guard = $guard;
    }

    /**
     * @throws OldPasswordMismatchException
     */
    public function updatePassword(array $input): void
    {
        if (!$this->hash->check($input["old_password"], $this->guard->user()->password)) {
            throw new OldPasswordMismatchException();
        }
        $this->guard->user()->update([
            "password" => $this->hash->make($input["password"]),
        ]);
    }
}
