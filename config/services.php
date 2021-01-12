<?php

declare(strict_types=1);

return [
    "facebook" => [
        "client_id" => env("FACEBOOK_ID"),
        "client_secret" => env("FACEBOOK_SECRET"),
        "redirect" => env("APP_URL") . "/facebook/callback/",
    ],
    "mailtrap" => [
        "default_inbox" => "728700",
        "secret" => "7f9245dea8f4621599454e42b5824ae5",
    ],
];
