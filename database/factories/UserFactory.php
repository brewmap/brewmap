<?php

declare(strict_types=1);

use Brewmap\Eloquent\User;
use Faker\Generator as Faker;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

/** @var Factory $factory */

$factory->define(
    User::class,
    function (Faker $faker): array {
        return [
            "name" => $faker->name,
            "email" => $faker->unique()->safeEmail,
            "email_verified_at" => now(),
            "password" => app(Hasher::class)->make("password"),
            "remember_token" => Str::random(10),
        ];
    }
);
