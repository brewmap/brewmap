<?php

declare(strict_types=1);

namespace Brewmap\Testing\Context;

use Behat\Behat\Context\Context;
use Brewmap\Notifications\Mail\EmailChangeNotification;
use Illuminate\Contracts\Notifications\Dispatcher;
use Illuminate\Foundation\Application;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Support\Testing\Fakes\NotificationFake;

class MailSending implements Context
{
    protected NotificationFake $notificatonFake;

    /**
     * @Then NotificationFake is mocked for notification test
     */
    public function notificationFakeIsMocked(): void
    {
        $this->notificatonFake = new NotificationFake();
        app()->bind(Dispatcher::class, fn (Application $app): NotificationFake => $this->notificatonFake);
    }

    /**
     * @Then an email should be sent
     */
    public function anEmailShouldBeSent(): void
    {
        $this->notificatonFake
            ->assertSentTo(new AnonymousNotifiable(), EmailChangeNotification::class, fn (EmailChangeNotification $notification, array $channels, AnonymousNotifiable $notifiable): bool => $notifiable->routes["mail"] === "new_email@example.com");
    }
}
