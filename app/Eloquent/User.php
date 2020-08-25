<?php

declare(strict_types=1);

namespace Brewmap\Eloquent;

use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;

/**
 * @property string|null $id
 * @property string $name
 * @property string $email
 * @property string|null $emailVerifiedAt
 * @property string $password
 * @property string $rememberToken
 * @property Profile $profile
 * @property Carbon $createdAt
 * @property Carbon $updatedAt
 */
class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail, Notifiable;

    protected $casts = ["email_verified_at" => "datetime"];
    protected $hidden = ["password", "remember_token"];
    protected $fillable = ["email", "password"];

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }
}
