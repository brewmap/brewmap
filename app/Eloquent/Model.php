<?php

declare(strict_types=1);

namespace Brewmap\Eloquent;

use Brewmap\Eloquent\Interfaces\IdentifiableByUuid;
use Brewmap\Eloquent\Traits\CamelCaseAttributes;
use Illuminate\Database\Eloquent\Model as EloquentModel;

abstract class Model extends EloquentModel implements IdentifiableByUuid
{
    use CamelCaseAttributes;

    public $incrementing = false;
    protected $keyType = "string";
}
