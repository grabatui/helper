<?php

namespace App\Http\Controllers\Api;

use App\Entities\Movie as MovieEntity;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Siqwell\Kinopoisk\Client;
use Siqwell\Kinopoisk\Models\Film;

class Movie extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('q');
        $limit = $request->get('limit', 10);

        if (empty($query)) {
            return new JsonResponse([]);
        }

        /** @var Client $parser */
        $parser = app('kinopoisk.parser');
        $result = $parser->getSearchApi()->searchFilm($query);

        if ($result instanceof Collection) {
            $result = $result->slice(0, $limit);
        }

        if ($result->count() > 0) {
            $this->bindSavedMovies($result);
        }

        return new JsonResponse(($result->isNotEmpty()) ? $result->toArray() : []);
    }

    /**
     * @param Collection|Film[] $movies
     */
    private function bindSavedMovies(Collection $movies)
    {
        $exists = (new MovieEntity)
            ->whereIn('kp_id', $movies->pluck('id')->toArray())
            ->get(['id', 'kp_id'])
            ->pluck('id', 'kp_id');

        $movies->each(function (Film $film) use ($exists) {
            $kpId = $film->getAttribute('id');

            $film->setAttribute('exists', ($exists->has($kpId)) ? $exists->get($kpId) : null);
        });
    }
}
