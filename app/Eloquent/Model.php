<?php

declare(strict_types=1);

namespace Brewmap\Eloquent;

use Brewmap\Eloquent\Traits\CamelCaseAttributes;
use Illuminate\Database\Eloquent\Model as EloquentModel;

abstract class Model extends EloquentModel
{
    use CamelCaseAttributes;

    public $incrementing = false;
    protected $keyType = "string";
}
