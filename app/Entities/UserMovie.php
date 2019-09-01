<?php

namespace App\Entities;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property int $movie_id
 * @property int $sort
 * @property bool $watched
 * @property Carbon|null $watched_at
 * @property int|null $rating
 * @property string|null $review
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class UserMovie extends Eloquent
{
    protected $dates = [
        'created_at',
        'updated_at',
        'watched_at',
    ];

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }
}
