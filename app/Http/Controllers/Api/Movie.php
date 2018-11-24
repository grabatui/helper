<?php

namespace App\Http\Controllers\Api;

use App\Entities\Movie as MovieEntity;
use App\Http\Controllers\Controller;
use App\Http\Resources\Movie as MovieResource;
use App\Http\Resources\MovieCollection;
use App\ThirdParty\Kinopoisk\Client;
use App\ThirdParty\Kinopoisk\Models\Creator;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Siqwell\Kinopoisk\Models\Country;
use Siqwell\Kinopoisk\Models\Film;
use Siqwell\Kinopoisk\Models\Genre;

class Movie extends Controller
{
    const BY_PAGE = 10;

    public function queue(Request $request)
    {
        return $this->getExistsCollection($request, function (Builder $builder) {
            /** @var MovieEntity $builder */
            $builder->whereWatched(false);
        });
    }

    public function watched(Request $request)
    {
        return $this->getExistsCollection($request, function (Builder $builder) {
            /** @var MovieEntity $builder */
            $builder->whereWatched(true);
        });
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $limit = $request->get('limit', 10);

        if (empty($query)) {
            return MovieCollection::make(collect());
        }

        /** @var Client $parser */
        $parser = app('kinopoisk.parser');
        $result = $parser->getSearchApi()->searchFilm($query);

        if ($result instanceof Collection) {
            $result = $result->slice(0, $limit);

            if ($result->count() > 0) {
                $result = $this->convertSearchToMovieCollection($result);
            }
        }

        return MovieCollection::make(($result) ? $result : collect());
    }

    public function reload(MovieEntity $movie)
    {
        return MovieResource::make($movie);
    }

    public function detail($id)
    {
        /** @var Client $parser */
        $parser = app('kinopoisk.parser');

        $film = $parser->getFilmApi()->details($id);

        if (!$film) {
            return new JsonResponse([]);
        }

        // Жанры
        if (!empty($film->getAttribute('genres'))) {
            $film->setAttribute('genres', collect($film->getAttribute('genres'))->transform(function (Genre $genre) {
                return $genre->toArray();
            })->toArray());
        }

        // Страны
        if (!empty($film->getAttribute('countries'))) {
            $film->setAttribute('countries', collect($film->getAttribute('countries'))->transform(function (Country $genre) {
                return $genre->toArray();
            })->toArray());
        }

        // Создатели
        if (!empty($film->getAttribute('creators'))) {
            $creators = collect();
            foreach ($film->getAttribute('creators') as $type => $typeCreators) {
                $creators->offsetSet($type, [
                    'type' => array_get(Creator::ALIASES, $type),
                    'names' => collect($typeCreators)->transform(function (Creator $creator) {
                        return $creator->getAttribute('name');
                    })->toArray(),
                ]);
            }

            $film->setAttribute('creators', $creators->toArray());
        }

        $film->setAttribute(
            'premiere',
            ($film->getAttribute('premiere')) ?
                Carbon::createFromFormat('Y-m-d', $film->getAttribute('premiere'))->format('d.m.Y') :
                null
        );

        return new JsonResponse($film);
    }

    public function watch(MovieEntity $movie, Request $request)
    {
        $movie->watched = true;
        $movie->watched_at = Carbon::now();

        if ($request->has('rating')) {
            $movie->rating = $request->post('rating');
        }

        if ($request->has('opinion')) {
            $movie->opinion = $request->post('opinion');
        }

        return new JsonResponse(($movie->save()) ? 'success' : 'error');
    }

    public function add(Request $request)
    {
        $data = array_only($request->toArray(), ['name', 'original_name', 'image', 'kp_id', 'year']);

        $movie = new MovieEntity($data);

        $movie->watched = false;
        $movie->sort = MovieEntity::orderByDesc('sort')->first(['sort'])->sort + MovieEntity::SORT_STEP;

        return new JsonResponse(($movie->save()) ? $movie->id : null);
    }

    /**
     * @param Collection|Film[] $movies
     * @return Collection
     */
    private function convertSearchToMovieCollection(Collection $movies)
    {
        $ids = $movies->reduce(function ($cherry, Film $film) {
            $cherry[] = $film->getAttribute('id');

            return $cherry;
        });

        $exists = (new MovieEntity)->whereIn('kp_id', $ids)->get()->keyBy('kp_id');

        return $movies->transform(function (Film $film) use ($exists) {
            $kpId = $film->getAttribute('id');

            if ($exists->has($kpId)) {
                return $exists->get($kpId);
            }

            return MovieEntity::createFromKP($film);
        });
    }

    private function getExistsCollection(Request $request, callable $filter)
    {
        $query = $request->get('query');

        $movies = MovieEntity::orderByDesc('watched_at');

        call_user_func($filter, $movies);

        if (Str::length($query) > 0) {
            $movies->where('name', 'like', '%' . $query . '%');
        }

        return MovieCollection::make($movies->paginate(self::BY_PAGE));
    }
}
