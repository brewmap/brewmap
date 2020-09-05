<?php

declare(strict_types=1);

namespace Brewmap\Eloquent;

use Carbon\Carbon;
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
