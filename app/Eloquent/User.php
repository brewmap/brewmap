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
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property string|null $id
 * @property string $name
 * @property string $email
 * @property string|null $emailVerifiedAt
 * @property string|null $password
 * @property boolean $isAdmin
 * @property string $rememberToken
 * @property Profile $profile
 * @property Collection|SocialProfile[] $socialProfiles
 * @property Carbon $createdAt
 * @property Carbon $updatedAt
 */
class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable;
    use Authorizable;
    use CanResetPassword;
    use HasApiTokens;
    use MustVerifyEmail;
    use Notifiable;

    protected $casts = ["email_verified_at" => "datetime", "is_admin" => "boolean"];
    protected $hidden = ["password", "remember_token", "is_admin"];
    protected $fillable = ["email", "password", "name"];

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function socialProfiles(): HasMany
    {
        return $this->hasMany(SocialProfile::class);
    }
}
