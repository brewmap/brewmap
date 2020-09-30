<?php

declare(strict_types=1);

namespace Database\Seeders;

use Brewmap\Eloquent\Country;
use Illuminate\Database\Seeder;

class RealWorldCountriesSeeder extends Seeder
{
    public function run(): void
    {
        Country::query()->delete();

        $countries = json_decode(file_get_contents(resource_path("data/countries.json")), true);
        foreach ($countries as $country) {
            Country::query()->create($country);
        }
    }
}
