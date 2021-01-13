<?php

declare(strict_types=1);

namespace Brewmap\Services;

use Brewmap\Eloquent\User;
use Brewmap\Exceptions\User\NewEmailChangingException;
use Brewmap\Notifications\EmailChangeNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class UpdateEmailService
{
    /**
     * Changes the user Email Address for a new one
     */
    public function sendNotifyForNewEmail(string $email): void
    {
        Notification::route("mail", $email)
            ->notify(new EmailChangeNotification(auth()->user()->id));
    }

    /**
     * Update Email Address
     *
     * @throws NewEmailChangingException
     */
    public function updateEmail(User $user, String $email): void
    {
        $this->checkEmailBeforeUpdate($email);
        $user->update([
            "email" => $email,
        ]);
    }

    /**
     * Verify Email Address
     *
     * @throws NewEmailChangingException
     */
    public function checkEmailBeforeUpdate(String $email): void
    {
        if (User::where("email", $email)->first() !== null) {
            throw new NewEmailChangingException();
        }
    }
}
