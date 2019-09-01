<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Base;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class User extends Base
{
    protected $guarded = [];

    public function movies(): HasMany
    {
        return $this->hasMany(UserMovie::class);
    }
}
