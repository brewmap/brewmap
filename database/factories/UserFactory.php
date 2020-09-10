<?php

declare(strict_types=1);

namespace Database\Factories;

use Brewmap\Eloquent\User;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        /** @var Hasher $hash */
        $hash = app(Hasher::class);

        return [
            "name" => $this->faker->name,
            "email" => $this->faker->unique()->safeEmail,
            "email_verified_at" => now(),
            "password" => $hash->make("password"),
            "remember_token" => Str::random(10),
        ];
    }
}
