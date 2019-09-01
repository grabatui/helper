<?php

namespace App\Entities;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $movie_id
 * @property int $genre_id
 * @property int $sort
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class MovieGenre extends Eloquent
{
    protected $guarded = [];

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }
}
