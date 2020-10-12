<?php

declare(strict_types=1);

namespace Database\Seeders;

use Brewmap\Eloquent\Country;
use Brewmap\Eloquent\Observers\Country as CountryObserver;
use Database\Factories\CountryFactory;
use Illuminate\Database\Seeder;

class RealWorldCountriesSeeder extends Seeder
{
    public function run(): void
    {
        Country::query()->delete();

        $observer = new CountryObserver();
        $countries = collect();

        $data = json_decode(file_get_contents(resource_path("data/countries.json")), true);
        foreach ($data as $country) {
            $model = CountryFactory::new()->make($country);
            $observer->creating($model);
            $countries[] = $model;
        }

        Country::query()->insert($countries->toArray());
    }
}
