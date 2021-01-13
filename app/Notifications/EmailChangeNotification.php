<?php

declare(strict_types=1);

namespace Brewmap\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
class EmailChangeNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * The user Email
     */
    protected string $userId;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $userId)
    {
        $this->userId = $userId;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ["mail"];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->line("Accept confirmation of changing email address!")
            ->action("Click for accept", $this->verifyRoute($notifiable))
            ->line("Thank you for using our application!");
    }

    /**
     * Returns the Reset URl to send in the Email
     *
     * @return string
     */
    protected function verifyRoute(AnonymousNotifiable $notifiable)
    {
        return URL::temporarySignedRoute("api.email.change", now()->addMinutes(90), [
            "user" => $this->userId,
            "email" => $notifiable->routes["mail"],
        ]);
    }
}
