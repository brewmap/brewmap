<?php

declare(strict_types=1);

namespace Brewmap\Eloquent\Observers;

use Brewmap\Eloquent\Country as EloquentCountry;
use Brewmap\Eloquent\Traits\CreatingWithSlug;
use Brewmap\Eloquent\Traits\CreatingWithUuid;

class Country
{
    use CreatingWithSlug {
        CreatingWithSlug::creating as slugCreating;
    }
    use CreatingWithUuid {
        CreatingWithUuid::creating as uuidCreating;
    }

    public function creating(EloquentCountry $model): void
    {
        $this->slugCreating($model);
        $this->uuidCreating($model);
    }
}
