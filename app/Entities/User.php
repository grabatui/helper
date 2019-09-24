<?php

namespace App\Entities;

use Carbon\Carbon;
use Hash;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Base;
use Illuminate\Notifications\Notifiable;

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
    use Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
    ];

    public function movies(): HasMany
    {
        return $this->hasMany(UserMovie::class);
    }

    public static function create(array $fields)
    {
        $user = new static();

        $user->email = array_get($fields, 'email');
        $user->name = array_get($fields, 'name', '');
        $user->password = array_get($fields, 'password');

        $user->save();

        return $user;
    }

    public function setPasswordAttribute(string $value)
    {
        $this->attributes['password'] = ($value) ? Hash::make($value) : null;

        return $this;
    }
}
