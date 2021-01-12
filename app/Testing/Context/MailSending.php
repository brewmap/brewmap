<?php

declare(strict_types=1);

namespace Brewmap\Testing\Context;

use Behat\Behat\Context\Context;
use Brewmap\Eloquent\User;
use GuzzleHttp\Client;
use PHPUnit\Framework\Assert;

class MailSending extends User implements Context
{
    /**
     * The MailTrap configuration.
     *
     * @var integer
     */
    protected $mailTrapInboxId;

    /**
     * The MailTrap API Key.
     *
     * @var string
     */
    protected $mailTrapApiKey;

    /**
     * The Guzzle client.
     *
     * @var Client
     */
    protected $client;

    /**
     * @Then an email should be sent
     */
    public function anEmailShouldBeSent(): void
    {
        $lastEmail = $this->fetchInbox()[0];

        Assert::assertEquals("Email Change Notification", $lastEmail->subject);
    }

    /**
     * Empty the MailTrap inbox.
     *
     * @AfterScenario @mail
     */
    public function emptyInbox(): void
    {
        $this->requestClient()->patch($this->getMailTrapCleanUrl());
    }

    /**
     * Get the configuration for MailTrap.
     *
     * @param integer|null $inboxId
     * @throws Exception
     */
    protected function applyMailTrapConfiguration($inboxId = null): void
    {
        if (($config = config("services.mailtrap")) === null) {
            throw new Exception(
                'Set "secret" and "default_inbox" keys for "mailtrap" in "config/services.php."'
            );
        }

        $this->mailTrapInboxId = $inboxId ?: $config["default_inbox"];
        $this->mailTrapApiKey = $config["secret"];
    }

    /**
     * Fetch a MailTrap inbox.
     *
     * @param integer|null $inboxId
     * @return mixed
     * @throws RuntimeException
     */
    protected function fetchInbox($inboxId = null)
    {
        if (!$this->alreadyConfigured()) {
            $this->applyMailTrapConfiguration($inboxId);
        }

        $res = $this->requestClient();
        //echo $res->getBody()->getContents();
        return json_decode($res->getBody()->getContents());
    }

    /**
     * Get the MailTrap messages endpoint.
     *
     * @return string
     */
    protected function getMailTrapMessagesUrl()
    {
        return "/api/v1/inboxes/{$this->mailTrapInboxId}/messages";
    }

    /**
     * Get the MailTrap "empty inbox" endpoint.
     *
     * @return string
     */
    protected function getMailTrapCleanUrl()
    {
        return "/api/v1/inboxes/{$this->mailTrapInboxId}/clean";
    }

    /**
     * Determine if MailTrap config has been retrieved yet.
     *
     * @return boolean
     */
    protected function alreadyConfigured()
    {
        return $this->mailTrapApiKey;
    }

    /**
     * Request a new Guzzle client.
     *
     * @return Client
     */
    protected function requestClient()
    {
        if (!$this->client) {
            $client = new Client();
            $this->client = $client->request("GET", "https://mailtrap.io/api/v1/inboxes/" . $this->mailTrapInboxId . "/messages", [
                "headers" => [
                    "Api-Token" => $this->mailTrapApiKey,
                ],
            ]);
        }

        return $this->client;
    }

    /**
     * @param $body
     * @return array|mixed
     * @throws RuntimeException
     */
    protected function parseJson($body)
    {
        return json_decode((string)$body, true);
    }
}
