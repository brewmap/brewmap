<?php

declare(strict_types=1);

namespace Brewmap\Eloquent;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $userId
 * @property User $user
 * @property string $providerName
 * @property string $providerId
 * @property Carbon $createdAt
 * @property Carbon $updatedAt
 */
class SocialProfile extends Model
{
    protected $primaryKey = "user_id";

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
