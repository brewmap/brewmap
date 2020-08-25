<?php

declare(strict_types=1);

namespace Brewmap\Testing\Eloquent;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use Brewmap\Eloquent\User;
use KrzysztofRewak\Larahat\Helpers\RefreshingDatabase;

class Users implements Context
{
    use RefreshingDatabase;

    /**
     * @When there is an user created:
     * @When there are users created:
     */
    public function thereIsAnUserCreated(TableNode $table): void
    {
        foreach ($table->getHash() as $user) {
            factory(User::class)->create($user);
        }
    }

    /**
     * @Then there should be a profile assigned:
     */
    public function thereShouldBeAProfileAssigned(): void
    {
    }
}
