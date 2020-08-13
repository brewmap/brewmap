<?php

declare(strict_types=1);

use Brewmap\Console\Kernel as ConsoleKernel;
use Brewmap\Exceptions\Handler;
use Brewmap\Http\Kernel as HttpKernel;
use Illuminate\Contracts\Console\Kernel as ConsoleKernelContract;
use Illuminate\Contracts\Debug\ExceptionHandler as HandlerContract;
use Illuminate\Contracts\Http\Kernel as HttpKernelContract;
use Illuminate\Foundation\Application;

$basePath = $_ENV["APP_BASE_PATH"] ?? dirname(__DIR__);

$app = new Application($basePath);
$app->singleton(HttpKernelContract::class, HttpKernel::class);
$app->singleton(ConsoleKernelContract::class, ConsoleKernel::class);
$app->singleton(HandlerContract::class, Handler::class);

return $app;
