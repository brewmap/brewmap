<?php

declare(strict_types=1);

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define("LARAVEL_START", microtime(true));

require __DIR__ . "/../vendor/autoload.php";

$app = require_once __DIR__ . "/../bootstrap/app.php";

$kernel = $app->make(Kernel::class);

$request = Request::capture();
$response = $kernel->handle($request);
$response->send();

$kernel->terminate($request, $response);
