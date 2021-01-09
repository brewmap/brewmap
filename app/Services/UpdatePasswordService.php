<?php

declare(strict_types=1);

namespace Brewmap\Services;

use Brewmap\Exceptions\User\OldPasswordMismatchException;
use Illuminate\Contracts\Hashing\Hasher;

class UpdatePasswordService
{
    protected Hasher $hash;

    public function __construct(Hasher $hash)
    {
        $this->hash = $hash;
    }

    /**
     * @throws OldPasswordMismatchException
     */
    public function updatePassword(array $input): void
    {
        if (!$this->hash->check($input["old_password"], auth()->user()->password)) {
            throw new OldPasswordMismatchException();
            exit;
        }
        auth()->user()->update([
            "password" => $this->hash->make($input["password"]),
        ]);
    }
}
