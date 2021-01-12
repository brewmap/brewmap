<?php

declare(strict_types=1);

namespace Brewmap\Eloquent;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

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
     * @throws 
     */
    public function setBirthdayAttribute($value): void
    {
        $this->attributes["birthday"] = Carbon::parse($value);
    }

    public function getAvatarPathAttribute($value): string
    {
        return Storage::url($value);
    }
}
