<?php

namespace App\ThirdParty\Kinopoisk\Apis;

use App\ThirdParty\Kinopoisk\Mappers\FilmDetails;
use Siqwell\Kinopoisk\Apis\FilmApi;

class Film extends FilmApi
{
    /**
     * @param $id
     * @return string
     */
    public function details($id)
    {
        return $this->setMapper(FilmDetails::class)->get(['id' => $id], "/film/{id}/");
    }
}
