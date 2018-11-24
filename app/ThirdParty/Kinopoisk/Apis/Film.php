<?php

namespace App\ThirdParty\Kinopoisk\Apis;

use App\ThirdParty\Kinopoisk\Mappers\FilmDetails;
use Siqwell\Kinopoisk\Apis\FilmApi;
use Siqwell\Kinopoisk\Models\Film as FilmModel;

class Film extends FilmApi
{
    /**
     * @param $id
     * @return FilmModel
     */
    public function details($id)
    {
        return $this->setMapper(FilmDetails::class)->get(['id' => $id], "/film/{id}/");
    }
}
