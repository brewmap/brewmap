<?php

declare(strict_types=1);

namespace Brewmap\Eloquent\Interfaces;

/**
 * @property string|null $slug
 */
interface Sluggable
{
    public function getSlugBase(): string;
}
