<?php

declare(strict_types=1);

return [
    "default" => env("QUEUE_CONNECTION", "sync"),
    "connections" => [
        "sync" => [
            "driver" => "sync",
        ],
        "database" => [
            "driver" => "database",
            "table" => "jobs",
            "queue" => "default",
            "retry_after" => 90,
        ],
        "redis" => [
            "driver" => "redis",
            "connection" => "default",
            "queue" => env("REDIS_QUEUE", "default"),
            "retry_after" => 90,
            "block_for" => null,
        ],
    ],
    "failed" => [
        "driver" => env("QUEUE_FAILED_DRIVER", "database"),
        "database" => env("DB_CONNECTION", "mysql"),
        "table" => "failed_jobs",
    ],
];
