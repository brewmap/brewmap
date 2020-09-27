<?php

declare(strict_types=1);

return [
    "stateful" => explode(",", env("SANCTUM_STATEFUL_DOMAINS", "localhost,127.0.0.1,127.0.0.1:8000,::1")),
    "expiration" => null,
];
