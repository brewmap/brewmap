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

    public function via(AnonymousNotifiable $notifiable): array
    {
        return ["mail"];
    }
}
