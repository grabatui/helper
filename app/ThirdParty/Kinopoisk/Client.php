<?php

namespace App\ThirdParty\Kinopoisk;

use App\ThirdParty\Kinopoisk\Apis\Film;
use Siqwell\Kinopoisk\Client as Base;

class Client extends Base
{
    public function getFilmApi()
    {
        return new Film($this->client);
    }
}
