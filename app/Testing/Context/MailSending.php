<?php

declare(strict_types=1);

namespace Brewmap\Testing\Context;

use Behat\Behat\Context\Context;
use Brewmap\Notifications\EmailChangeNotification;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Support\Facades\Notification;

class MailSending implements Context
{
    protected $signedUrl;


    public function __construct()
    {
        Notification::fake();
    }

    /**
     * @Then an email should be sent
     */
    public function anEmailShouldBeSent(): void
    {
        Notification::assertSentTo(new AnonymousNotifiable(), EmailChangeNotification::class, function ($notification, $channels, $notifiable) {
            return $notifiable->routes["mail"] === "user@newemail.com";
        });
    }
}
