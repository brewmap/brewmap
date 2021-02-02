<?php

declare(strict_types=1);

namespace Brewmap\Services\User;

use Brewmap\Eloquent\User;
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
    public function index(string $oldPassword, string $newPassword, User $user): void
    {
        $this->checkOldPassword($oldPassword, $user);
        $this->updatePassword($newPassword, $user);
    }

    /**
     * @throws OldPasswordMismatchException
     */
    public function checkOldPassword(string $oldPassword, User $user): void
    {
        if (!$this->hash->check($oldPassword, $user->password)) {
            throw new OldPasswordMismatchException();
        }
    }

    public function updatePassword(string $newPassword, User $user): void
    {
        $user->update([
            "password" => $this->hash->make($newPassword),
        ]);
    }
}
