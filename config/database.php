<?php

declare(strict_types=1);

use Illuminate\Support\Str;

$prefix = Str::slug(env("APP_NAME", "laravel"), "_") . "_database_";

return [
    "default" => env("DB_CONNECTION", "mysql"),
    "connections" => [
        "sqlite" => [
            "driver" => "sqlite",
            "url" => env("DATABASE_URL"),
            "database" => env("DB_DATABASE", database_path("database.sqlite")),
            "prefix" => "",
            "foreign_key_constraints" => env("DB_FOREIGN_KEYS", true),
        ],
    ],
    "migrations" => "migrations",
    "redis" => [
        "client" => env("REDIS_CLIENT", "phpredis"),
        "options" => [
            "cluster" => env("REDIS_CLUSTER", "redis"),
            "prefix" => env("REDIS_PREFIX", $prefix),
        ],
        "default" => [
            "url" => env("REDIS_URL"),
            "host" => env("REDIS_HOST", "127.0.0.1"),
            "password" => env("REDIS_PASSWORD", null),
            "port" => env("REDIS_PORT", "6379"),
            "database" => env("REDIS_DB", "0"),
        ],
        "cache" => [
            "url" => env("REDIS_URL"),
            "host" => env("REDIS_HOST", "127.0.0.1"),
            "password" => env("REDIS_PASSWORD", null),
            "port" => env("REDIS_PORT", "6379"),
            "database" => env("REDIS_CACHE_DB", "1"),
        ],
    ],
];
