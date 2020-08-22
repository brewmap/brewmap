<?php

declare(strict_types=1);

use Brewmap\Eloquent\User;

return [
    "defaults" => [
        "guard" => "web",
        "passwords" => "users",
    ],
    "guards" => [
        "web" => [
            "driver" => "session",
            "provider" => "users",
        ],
        "api" => [
            "driver" => "token",
            "provider" => "users",
            "hash" => false,
        ],
    ],
    "providers" => [
        "users" => [
            "driver" => "eloquent",
            "model" => User::class,
        ],
    ],
    "passwords" => [
        "users" => [
            "provider" => "users",
            "table" => "password_resets",
            "expire" => 60,
            "throttle" => 60,
        ],
    ],
    "password_timeout" => 10800,
];
