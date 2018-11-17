<?php

namespace App\Http\Controllers\Api;

use App\Entities\Movie as MovieEntity;
use App\Http\Controllers\Controller;
use App\Http\Resources\Movie as MovieCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Siqwell\Kinopoisk\Client;
use Siqwell\Kinopoisk\Models\Film;

class Movie extends Controller
{
    public function queue()
    {
        return MovieCollection::make(MovieEntity::whereWatched(false)->get());
    }

    public function watched()
    {
        return MovieCollection::make(MovieEntity::whereWatched(true)->get());
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        $limit = $request->get('limit', 10);

        if (empty($query)) {
            return MovieCollection::make();
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

        // TODO: Превратить в коллекцию фильмов, чтобы всё вело себя одинаково
        return MovieCollection::make($result);
    }

    public function watch(MovieEntity $movie)
    {

    }

    public function opinion(MovieEntity $movie)
    {

    }

    public function add(Request $request)
    {
        // TODO: Поменять в ссылке на картинку sm_film на film_big
    }

    /**
     * @param Collection|Film[] $movies
     */
    private function bindSavedMovies(Collection $movies)
    {
        $exists = (new MovieEntity)
            ->whereIn('kp_id', $movies->pluck('id')->toArray())
            ->get()
            ->keyBy('kp_id');

        $movies->each(function (Film $film) use ($exists) {
            $kpId = $film->getAttribute('id');

            $film->setAttribute('exists', ($exists->has($kpId)) ? $exists->get($kpId) : null);
        });
    }
}
