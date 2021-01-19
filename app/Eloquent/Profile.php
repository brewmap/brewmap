<?php

declare(strict_types=1);

namespace Brewmap\Eloquent;

use Carbon\Carbon;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
     * @psalm-suppress MissingThrowsDocblock
     */
    public function setBirthdayAttribute(string $value): void
    {
        $this->attributes["birthday"] = Carbon::parse($value);
    }

    /**
     * @psalm-suppress MissingThrowsDocblock
     */
    public function getAvatarPathAttribute(string $value): string
    {
        return app()->make(Filesystem::class)->url($value);
    }
}
