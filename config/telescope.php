<?php

declare(strict_types=1);

use Laravel\Telescope\Http\Middleware\Authorize;
use Laravel\Telescope\Watchers;

return [
    "domain" => env("TELESCOPE_DOMAIN", null),
    "path" => env("TELESCOPE_PATH", "telescope"),
    "driver" => env("TELESCOPE_DRIVER", "database"),
    "storage" => [
        "database" => [
            "connection" => env("DB_CONNECTION", "mysql"),
            "chunk" => 1000,
        ],
    ],
    "enabled" => env("TELESCOPE_ENABLED", true),
    "middleware" => [
        "web",
        Authorize::class,
    ],
    "ignore_paths" => [],
    "ignore_commands" => [],
    "watchers" => [
        Watchers\CacheWatcher::class => env("TELESCOPE_CACHE_WATCHER", true),
        Watchers\CommandWatcher::class => [
            "enabled" => env("TELESCOPE_COMMAND_WATCHER", true),
            "ignore" => [],
        ],
        Watchers\DumpWatcher::class => env("TELESCOPE_DUMP_WATCHER", true),
        Watchers\EventWatcher::class => [
            "enabled" => env("TELESCOPE_EVENT_WATCHER", true),
            "ignore" => [],
        ],
        Watchers\ExceptionWatcher::class => env("TELESCOPE_EXCEPTION_WATCHER", true),
        Watchers\JobWatcher::class => env("TELESCOPE_JOB_WATCHER", true),
        Watchers\LogWatcher::class => env("TELESCOPE_LOG_WATCHER", true),
        Watchers\MailWatcher::class => env("TELESCOPE_MAIL_WATCHER", true),
        Watchers\ModelWatcher::class => [
            "enabled" => env("TELESCOPE_MODEL_WATCHER", true),
            "events" => ["eloquent.*"],
        ],
        Watchers\NotificationWatcher::class => env("TELESCOPE_NOTIFICATION_WATCHER", true),
        Watchers\QueryWatcher::class => [
            "enabled" => env("TELESCOPE_QUERY_WATCHER", true),
            "ignore_packages" => true,
            "slow" => 100,
        ],
        Watchers\RedisWatcher::class => env("TELESCOPE_REDIS_WATCHER", true),
        Watchers\RequestWatcher::class => [
            "enabled" => env("TELESCOPE_REQUEST_WATCHER", true),
            "size_limit" => env("TELESCOPE_RESPONSE_SIZE_LIMIT", 64),
        ],
        Watchers\GateWatcher::class => [
            "enabled" => env("TELESCOPE_GATE_WATCHER", true),
            "ignore_abilities" => [],
            "ignore_packages" => true,
        ],
        Watchers\ScheduleWatcher::class => env("TELESCOPE_SCHEDULE_WATCHER", true),
        Watchers\ViewWatcher::class => env("TELESCOPE_VIEW_WATCHER", true),
    ],
];
