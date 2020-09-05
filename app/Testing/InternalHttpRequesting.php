<?php

declare(strict_types=1);

namespace Brewmap\Testing;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use Illuminate\Http\Request;
use KrzysztofRewak\Larahat\Helpers\SimpleRequesting;
use PHPUnit\Framework\Assert;

class InternalHttpRequesting implements Context
{
    use SimpleRequesting;

    protected Request $request;

    /**
     * @Given an user is requesting :url
     */
    public function anUserIsRequesting(string $endpoint, string $method = Request::METHOD_GET): void
    {
        $this->request = Request::create($endpoint, $method);
    }

    /**
     * @Given an user is requesting :url using :method
     */
    public function anUserIsRequestUsingMethod(string $endpoint, string $method): void
    {
        $this->anUserIsRequesting($endpoint, $method);
    }

    /**
     * @Given required :amount :class object/objects is/are already existing
     */
    public function requiredObjectsAreAlreadyExisting(int $amount, string $class): void
    {
        factory(config('app.namespace') . '\\' . config('app.model_namespace') . '\\' . $class, $amount)
            ->create()
            ->each(function ($object): void {
                $object->save();
            });
    }

    /**
     * @Given request body contains :key equal :value
     */
    public function requestBodyContains(string $key, string $value): void
    {
        $this->request[$key] = $value;
    }

    /**
     * @Given custom request headers are defined:
     */
    public function customRequestHeadersAreDefined(TableNode $table): void
    {
        foreach ($table as $header) {
            $this->request->headers->set($header["header"], $header["value"]);
        }
    }

    /**
     * @When a request is sent
     */
    public function aRequestIsSent(): void
    {
        $this->request($this->request);
    }

    /**
     * @Then a response status code should be :status
     */
    public function aResponseStatusCodeShouldBe(int $status): void
    {
        Assert::assertEquals($status, $this->response->getStatusCode());
    }

    /**
     * @Given response body should contain:
     */
    public function responseBodyShouldContain(TableNode $table): void
    {
        $response = $this->getResponseContent();
        
        foreach ($table as $row) {
            Assert::assertEquals($response[$row["key"]], $row["value"]);
        }
    }
}
