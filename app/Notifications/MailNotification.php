<?php

declare(strict_types=1);

namespace Brewmap\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Notifications\Notification;

class MailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @return array
     */
    public function via(AnonymousNotifiable $notifiable)
    {
        return ["mail"];
    }
}
