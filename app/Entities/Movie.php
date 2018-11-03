<?php

namespace App\Entities;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\Entities\Movie
 *
 * @mixin Eloquent
 * @property int $id
 * @property int $kp_id
 * @property int $sort
 * @property int $watched
 * @property string $name
 * @property string|null $image
 * @property int|null $year
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static Builder|Movie whereCreatedAt($value)
 * @method static Builder|Movie whereId($value)
 * @method static Builder|Movie whereImage($value)
 * @method static Builder|Movie whereKpId($value)
 * @method static Builder|Movie whereName($value)
 * @method static Builder|Movie whereSort($value)
 * @method static Builder|Movie whereUpdatedAt($value)
 * @method static Builder|Movie whereWatched($value)
 * @method static Builder|Movie whereYear($value)
 */
class Movie extends Eloquent
{

}
