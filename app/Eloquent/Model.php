<?php

declare(strict_types=1);

namespace Brewmap\Eloquent;

use Brewmap\Eloquent\Traits\CamelcasedAttributes;
use Illuminate\Database\Eloquent\Model as EloquentModel;

abstract class Model extends EloquentModel
{
    use CamelcasedAttributes;

    public $incrementing = false;
    protected $keyType = "string";
}
