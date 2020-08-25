<?php

declare(strict_types=1);

namespace Brewmap\Eloquent\Traits;

use Illuminate\Support\Str;

trait CamelcasedAttributes
{
    public function getAttribute($key)
    {
        if (array_key_exists($key, $this->relations) || method_exists($this, $key)) {
            return parent::getAttribute($key);
        }

        return parent::getAttribute(Str::snake($key));
    }

    public function setAttribute($key, $value)
    {
        return parent::setAttribute(Str::snake($key), $value);
    }
}
