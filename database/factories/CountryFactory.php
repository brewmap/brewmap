<?php

declare(strict_types=1);

namespace Database\Factories;

use Brewmap\Eloquent\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    protected $model = Country::class;

    public function definition(): array
    {
        return [
            "name" => $this->faker->country,
            "symbol" => strtolower($this->faker->countryCode),
        ];
    }
}
