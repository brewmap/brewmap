<?php

declare(strict_types=1);

namespace Brewmap\Services;

use Brewmap\Eloquent\User;
use Brewmap\Exceptions\User\NewEmailChangingException;
use Brewmap\Notifications\Mail\EmailChangeNotification;
use Illuminate\Notifications\AnonymousNotifiable;

class UpdateEmailService
{
    protected AnonymousNotifiable $notify;

    public function __construct(AnonymousNotifiable $notify)
    {
        $this->notify = $notify;
    }

    public function sendNotifyForNewEmail(string $email, string $id): void
    {
        $this->notify
            ->route("mail", $email)
            ->notify(new EmailChangeNotification($id));
    }

    /**
     * @throws NewEmailChangingException
     */
    public function updateEmail(string $user_id, string $email): void
    {
        $this->checkEmailBeforeUpdate($email);
        User::query()
            ->where("id", $user_id)
            ->update([
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
