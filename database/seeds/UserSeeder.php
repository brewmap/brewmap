<?php

declare(strict_types=1);

use Brewmap\Eloquent\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        factory(User::class, 20)->create()->each(function ($user): void {
            $user->save();
        });
    }
}
