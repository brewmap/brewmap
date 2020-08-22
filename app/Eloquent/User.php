<?php

declare(strict_types=1);

namespace Brewmap\Eloquent;

use Illuminate\Foundation\Auth\User as LaravelUser;
use Illuminate\Notifications\Notifiable;

class User extends LaravelUser
{
    use Notifiable;

    protected $fillable = ["name", "email", "password"];
    protected $hidden = ["password", "remember_token"];
    protected $casts = ["email_verified_at" => "datetime"];
}
