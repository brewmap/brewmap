<?php

declare(strict_types=1);

namespace Brewmap\Services\User;

use Brewmap\Eloquent\User;
use Brewmap\Exceptions\User\NewEmailChangingException;
use Brewmap\Notifications\Mail\EmailChangeNotification;
use Illuminate\Notifications\AnonymousNotifiable;

class UpdateEmailService
{
    protected AnonymousNotifiable $anonymousNotifiable;

    public function __construct(AnonymousNotifiable $anonymousNotifiable)
    {
        $this->anonymousNotifiable = $anonymousNotifiable;
    }

    public function notifyAboutNewEmail(User $user, string $email): void
    {
        $this->anonymousNotifiable
            ->route("mail", $email)
            ->notify(new EmailChangeNotification($user));
    }

    /**
     * @throws NewEmailChangingException
     */
    public function updateEmail(User $user, string $email): void
    {
        $this->checkEmailBeforeUpdate($email);
        $user->update([
            "email" => $email,
        ]);
    }

    /**
     * @throws NewEmailChangingException
     */
    public function checkEmailBeforeUpdate(string $email): void
    {
        if (User::query()->where("email", $email)->exists()) {
            throw new NewEmailChangingException();
        }
    }
}
