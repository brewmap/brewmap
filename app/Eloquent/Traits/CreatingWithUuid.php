<?php

declare(strict_types=1);

namespace Brewmap\Eloquent\Traits;

use Brewmap\Eloquent\Interfaces\IdentifiableByUuid;
use Illuminate\Support\Str;

trait CreatingWithUuid
{
    public function creating(IdentifiableByUuid $model): void
    {
        if ($model->id === null) {
            $model->id = Str::uuid()->toString();
        }
    }
}
