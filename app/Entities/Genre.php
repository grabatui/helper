<?php

namespace App\Entities;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $external_id
 * @property string $name
 * @property string $icon
 * @property string $background_color
 * @property string $color
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Genre extends Eloquent
{
    protected $guarded = [];

    public function movies(): HasMany
    {
        return $this->hasMany(Movie::class);
    }
}
