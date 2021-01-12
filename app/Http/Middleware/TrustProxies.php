<?php

declare(strict_types=1);

namespace Brewmap\Http\Middleware;

use Fideloper\Proxy\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * @var array
     */
    protected $proxies = "*";

    protected $headers = Request::HEADER_X_FORWARDED_FOR;
}
