<?php

declare(strict_types=1);

namespace Brewmap\Http\Middleware;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Localize
{
    protected array $locales = ["en", "pl"];
    protected Application $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->header("Accept-Language");
        if (!is_string($locale)) {
            $locale = "";
        }

        if (in_array($locale, $this->locales, true)) {
            $this->application->setLocale($locale);
            $request->setLocale($locale);
        }

        return $next($request);
    }
}
