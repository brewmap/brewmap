<?php

declare(strict_types=1);

namespace Brewmap\Services;

use Brewmap\Eloquent\User;
use Brewmap\Exceptions\User\NewEmailChangingException;
use Brewmap\Notifications\Mail\EmailChangeNotification;
use Illuminate\Support\Facades\Notification;

class UpdateEmailService
{
    public function sendNotifyForNewEmail(string $email, string $id): void
    {
        Notification::route("mail", $email)
            ->notify(new EmailChangeNotification($id));
    }

    /**
     * @psalm-suppress MissingThrowsDocblock
     */
    public function updateEmail(User $user, String $email): void
    {
        $this->checkEmailBeforeUpdate($email);
        $user->update([
            "email" => $email,
        ]);
    }

    /**
     * @throws NewEmailChangingException
     */
    public function checkEmailBeforeUpdate(String $email): void
    {
        if (User::query()->where("email", $email)->first() !== null) {
            throw new NewEmailChangingException();
        }
    }
}
