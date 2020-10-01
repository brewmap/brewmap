<?php

declare(strict_types=1);

namespace Brewmap\Testing\Context;

use Behat\Behat\Context\Context;
use Illuminate\Database\Seeder;

class DatabaseFeatures implements Context
{
    /**
     * @Given :class seeder was ran
     */
    public function seederWasRan($class): void
    {
        /** @var Seeder $seeder */
        $seeder = new $class();
        $seeder->__invoke();
    }
}
