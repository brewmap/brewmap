<?php

declare(strict_types=1);

namespace Brewmap\Notifications\Mail;

use Brewmap\Eloquent\User;
use Brewmap\Notifications\MailNotification;
use Carbon\Carbon;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Notifications\Messages\MailMessage;

class EmailChangeNotification extends MailNotification
{
    protected User $user;
    protected Carbon $timeout;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->timeout = Carbon::now()->addMinutes(config("notifications.email_change_timeout"));
    }

    /**
     * @throws BindingResolutionException
     */
    public function toMail(AnonymousNotifiable $notifiable): MailMessage
    {
        return (new MailMessage())
            ->line("Accept confirmation of changing email address!")
            ->action("Click for accept", $this->verifyRoute($notifiable))
            ->line("Thank you for using our application!");
    }

    /**
     * @throws BindingResolutionException
     */
    protected function verifyRoute(AnonymousNotifiable $notifiable): string
    {
        return app()->make(UrlGenerator::class)
            ->temporarySignedRoute("api.email.change", $this->timeout, [
                "user" => $this->user,
                "email" => $notifiable->routes["mail"],
            ]);
    }
}
