<?php

declare(strict_types=1);

namespace Brewmap\Notifications\Mail;

use Brewmap\Notifications\MailNotification;
use Carbon\Carbon;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Notifications\Messages\MailMessage;

class EmailChangeNotification extends MailNotification
{
    protected string $userId;
    protected Carbon $time;

    public function __construct(string $userId)
    {
        $this->userId = $userId;
        $this->time = Carbon::now()->addMinutes(config("notifications.email_change_timeout"));
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
            ->temporarySignedRoute("api.email.change", $this->time, [
                "user_id" => $this->userId,
                "email" => $notifiable->routes["mail"],
            ]);
    }
}
