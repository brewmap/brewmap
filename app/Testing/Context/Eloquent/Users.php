<?php

declare(strict_types=1);

namespace Brewmap\Testing\Context\Eloquent;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use Brewmap\Eloquent\Profile;
use Brewmap\Eloquent\User;
use Database\Factories\UserFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use KrzysztofRewak\Larahat\Helpers\RefreshingDatabase;
use PHPUnit\Framework\Assert;

class Users implements Context
{
    use RefreshingDatabase;

    protected User $user;

    /**
     * @When there is a user created
     */
    public function thereIsAUserCreated(): void
    {
        $this->user = UserFactory::new()->create();
    }

    /**
     * @When there is a user created:
     * @When there are users created:
     */
    public function thereAreUsersCreated(TableNode $table): void
    {
        foreach ($table->getHash() as $user) {
            UserFactory::new()->create($user);
        }
    }

    /**
     * @Then there should be a profile assigned:
     */
    public function thereShouldBeAProfileAssigned(TableNode $table): void
    {
        foreach ($table->getHash() as $profile) {
            $count = Profile::query()->where("user_id", $profile["user_id"])->count();
            Assert::assertEquals(1, $count);
        }
    }

    /**
     * @Then it should have UUID-formatted id
     */
    public function itShouldHaveUUIDFormattedId(): void
    {
        Assert::assertStringMatchesFormat(
            "%x%x%x%x%x%x%x%x-%x%x%x%x-%x%x%x%x-%x%x%x%x-%x%x%x%x%x%x%x%x%x%x%x%x",
            $this->user->id ?? ""
        );
    }

    /**
     * @Given user is logged in as :email
     */
    public function userIsLoggedInAs(string $email): void
    {
        /** @var Guard $guard */
        $guard = app(Guard::class);

        /** @var Authenticatable $user */
        $user = User::query()->where('email', $email)->first();

        $guard->setUser($user);
    }
}
