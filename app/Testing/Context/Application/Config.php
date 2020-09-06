<?php

declare(strict_types=1);

namespace Brewmap\Testing\Context\Application;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use Brewmap\Testing\ServiceContainer\LaravelBooter;

class Config implements Context
{
    /**
     * @Transform table:config,value
     */
    public function castConfigBoolValues(TableNode $configTable)
    {
        $config = [];

        foreach ($configTable as $row) {
            $key = $row['config'];
            $value = $row['value'];

            if (in_array($value, ["true", "false"], true)) {
                $value = $value === "true";
            }
            $config[$key] = $value;
        }

        return $config;
    }

    /**
     * @Given application is booted with config:
     */
    public function applicationIsBootedWithConfig(array $config): void
    {
        $laravelBooter = new LaravelBooter();
        $laravelBooter->setConfigOverrides($config);

        if (array_key_exists("app.env", $config)) {
            $laravelBooter->setEnvironmentType($config["app.env"]);
        }

        $laravelBooter->boot();
    }

    /**
     * @AfterScenario
     */
    public function bootDefaultLaravel(): void
    {
        (new LaravelBooter())->boot();
    }
}
