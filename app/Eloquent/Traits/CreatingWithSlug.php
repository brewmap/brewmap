<?php

declare(strict_types=1);

namespace Brewmap\Eloquent\Traits;

use Brewmap\Eloquent\Interfaces\Sluggable;
use Illuminate\Support\Str;

trait CreatingWithSlug
{
    public function creating(Sluggable $model): void
    {
        if ($model->slug === null) {
            $model->slug = Str::slug($model->getSlugBase());
        }
    }
}
