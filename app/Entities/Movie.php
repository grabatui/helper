<?php

namespace App\Entities;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin Eloquent
 * @property int $id
 * @property int $external_id
 * @property string $name
 * @property string|null $original_name
 * @property string|null $image
 * @property int|null $year
 * @property string|null $preview
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Movie extends Eloquent
{
    protected $guarded = [];

    public function users(): HasMany
    {
        return $this->hasMany(UserMovie::class);
    }

    public function genres(): HasMany
    {
        return $this->hasMany(Genre::class);
    }
}
