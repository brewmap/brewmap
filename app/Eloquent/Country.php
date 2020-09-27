<?php

declare(strict_types=1);

namespace Brewmap\Eloquent;

use Brewmap\Eloquent\Interfaces\Sluggable;
use Carbon\Carbon;

/**
 * @property string|null $id
 * @property string $slug
 * @property string $name
 * @property string $code
 * @property Carbon $createdAt
 * @property Carbon $updatedAt
 */
class Country extends Model implements Sluggable
{
    protected $fillable = ["slug", "name", "code"];

    public function getSlugBase(): string
    {
        return $this->name;
    }
}
