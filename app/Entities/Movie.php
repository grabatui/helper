<?php

namespace App\Entities;

use Carbon\Carbon;
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
 * @property string $original_name
 * @property string|null $image
 * @property int|null $year
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $watched_at
 * @property-read mixed $kp_link
 * @property-read mixed $rt_link
 * @method static Builder|Movie whereId($value)
 * @method static Builder|Movie whereImage($value)
 * @method static Builder|Movie whereKpId($value)
 * @method static Builder|Movie whereName($value)
 * @method static Builder|Movie whereOriginalName($value)
 * @method static Builder|Movie whereSort($value)
 * @method static Builder|Movie whereCreatedAt($value)
 * @method static Builder|Movie whereUpdatedAt($value)
 * @method static Builder|Movie whereWatchedAt($value)
 * @method static Builder|Movie whereWatched($value)
 * @method static Builder|Movie whereYear($value)
 * @method static Movie newModelQuery()
 * @method static Movie newQuery()
 * @method static Movie query()
 */
class Movie extends Eloquent
{
    const DATETIME_FORMAT = 'd.m.Y H:i:s';

    protected $dates = [
        'created_at',
        'updated_at',
        'watched_at',
    ];

    protected $appends = [
        'kp_link',
        'rt_link',
    ];

    public function getKpLinkAttribute()
    {
        return ($this->kp_id) ? route('external.kp.detail', $this->kp_id) : '';
    }

    public function getRtLinkAttribute()
    {
        return route('external.rt.search', sprintf('%s+%s', $this->name, $this->year));
    }

    public function toArray()
    {
        return array_merge(
            parent::toArray(),
            [
                'created_at' => $this->created_at->format(self::DATETIME_FORMAT),
                'updated_at' => ($this->updated_at instanceof Carbon) ?
                    $this->updated_at->format(self::DATETIME_FORMAT) :
                    '',
                'watched_at' => ($this->watched_at instanceof Carbon) ?
                    $this->watched_at->format(self::DATETIME_FORMAT) :
                    '',
            ]
        );
    }
}
