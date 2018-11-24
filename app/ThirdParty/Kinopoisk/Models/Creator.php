<?php

namespace App\ThirdParty\Kinopoisk\Models;

use Siqwell\Kinopoisk\Models\Model;

class Creator extends Model
{
    const ALIASES = [
        'director' => 'режиссер',
        'screenwriter' => 'сценарий',
        'producer' => 'продюсер',
        'operator' => 'оператор',
        'composer' => 'композитор',
        'artist' => 'художник',
        'editor' => 'монтаж',
    ];
}
