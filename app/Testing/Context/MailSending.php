<?php

declare(strict_types=1);

namespace Brewmap\Testing\Context;

use Behat\Behat\Context\Context;
use Brewmap\Notifications\Mail\EmailChangeNotification;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Support\Facades\Notification;

class MailSending implements Context
{
    public function __construct()
    {
        Notification::fake();
    }

    /**
     * @Then an email should be sent
     */
    public function anEmailShouldBeSent(): void
    {
        Notification::assertSentTo(new AnonymousNotifiable(), EmailChangeNotification::class, function (EmailChangeNotification $notification, array $channels, AnonymousNotifiable $notifiable) {
            return $notifiable->routes["mail"] === "new_email@example.com";
        });
    }
}
