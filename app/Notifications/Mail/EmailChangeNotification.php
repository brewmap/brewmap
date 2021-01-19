<?php

declare(strict_types=1);

namespace Brewmap\Notifications\Mail;

use Brewmap\Notifications\MailNotification;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
class EmailChangeNotification extends MailNotification
{
    protected string $userId;
    protected string $verifyUrl;
    protected Object $time;

    public function __construct(string $userId)
    {
        $this->userId = $userId;
        $this->time = config("constants.notification.time_to_change_email");
    }

    /**
     * @param mixed $notifiable
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage())
            ->line("Accept confirmation of changing email address!")
            ->action("Click for accept", $this->verifyRoute($notifiable))
            ->line("Thank you for using our application!");
    }

    /**
     * @return string
     */
    protected function verifyRoute(AnonymousNotifiable $notifiable)
    {
        $this->verifyUrl = URL::temporarySignedRoute("api.email.change", $this->time, [
            "user" => $this->userId,
            "email" => $notifiable->routes["mail"],
        ]);

        return $this->verifyUrl;
    }
}
