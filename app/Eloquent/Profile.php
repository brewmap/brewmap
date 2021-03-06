<?php

declare(strict_types=1);

namespace Brewmap\Eloquent;

use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use RuntimeException;

/**
 * @property string $userId
 * @property string $publicName
 * @property string $avatarPath
 * @property string $birthday
 * @property User $user
 * @property Carbon $createdAt
 * @property Carbon $updatedAt
 */
class Profile extends Model
{
    protected $primaryKey = "user_id";
    protected $fillable = ["public_name", "avatar_path", "birthday"];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @throws InvalidFormatException
     */
    public function setBirthdayAttribute(string $value): void
    {
        $this->attributes["birthday"] = Carbon::parse($value);
    }

    /**
     * @throws RuntimeException
     * @throws BindingResolutionException
     */
    public function getAvatarPathAttribute(string $value): string
    {
        return app()->make(Filesystem::class)->url($value);
    }
}
