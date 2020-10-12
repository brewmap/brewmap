<?php

declare(strict_types=1);

namespace Brewmap\Testing\Context\Eloquent;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use Brewmap\Eloquent\Country;
use Database\Factories\CountryFactory;
use KrzysztofRewak\Larahat\Helpers\RefreshingDatabase;
use PHPUnit\Framework\Assert;

class Countries implements Context
{
    use RefreshingDatabase;

    /** @var Country[] */
    protected array $countries;

    /**
     * @When there is a country created:
     * @When there are countries created:
     */
    public function thereIsACountryCreated(TableNode $table): void
    {
        foreach ($table->getHash() as $country) {
            $this->countries[] = CountryFactory::new()->create($country);
        }
    }

    /**
     * @Then they should have UUID-formatted id
     */
    public function theyShouldHaveUUIDFormattedId(): void
    {
        foreach ($this->countries as $country) {
            Assert::assertStringMatchesFormat(
                "%x%x%x%x%x%x%x%x-%x%x%x%x-%x%x%x%x-%x%x%x%x-%x%x%x%x%x%x%x%x%x%x%x%x",
                $country->id ?? ""
            );
        }
    }

    /**
     * @Given they should have slugs:
     */
    public function itShouldHaveSlug(TableNode $table): void
    {
        foreach ($table->getHash() as $i => $country) {
            Assert::assertEquals($country["slug"], $this->countries[$i]->slug);
        }
    }

    /**
     * @Then there should be :count countries in database
     */
    public function thereShouldBeCountriesInDatabase(int $count): void
    {
        Assert::assertEquals($count, Country::query()->count());
    }
}
