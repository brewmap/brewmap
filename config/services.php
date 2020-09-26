<?php

declare(strict_types=1);

return [
    "facebook" => [
        "client_id" => env("FACEBOOK_ID"),
        "client_secret" => env("FACEBOOK_SECRET"),
        "redirect" => env("APP_URL")."/facebook/callback/",
      ],
];
