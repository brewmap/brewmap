<?php

declare(strict_types=1);

return [
    "default" => env("BROADCAST_DRIVER", "null"),
    "connections" => [
        "redis" => [
            "driver" => "redis",
            "connection" => "default",
        ],
        "null" => [
            "driver" => "null",
        ],
    ],
];
