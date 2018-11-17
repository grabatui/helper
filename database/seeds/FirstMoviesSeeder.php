<?php

use App\Entities\Movie;
use Illuminate\Database\Seeder;

class FirstMoviesSeeder extends Seeder
{
    public function run()
    {
        DB::table((new Movie)->getTable())->truncate();

        $items = [
            [
                'kp_id' => 685807,
                'name' => 'Акт убийства',
                'original_name' => 'The Act of Killing',
                'year' => 2012,
                'image' => 'https://st.kp.yandex.net/images/film_big/685807.jpg',
            ],
            [
                'kp_id' => 430593,
                'name' => 'Одинокий мужчина',
                'original_name' => 'A Single Man',
                'year' => 2009,
                'image' => 'https://st.kp.yandex.net/images/film_big/430593.jpg',
            ],
            [
                'kp_id' => 84788,
                'name' => 'Воспитатели',
                'original_name' => 'Die fetten Jahre sind vorbei',
                'year' => 2004,
                'image' => 'https://st.kp.yandex.net/images/film_big/84788.jpg',
            ],
            [
                'kp_id' => 677566,
                'name' => 'Великая красота',
                'original_name' => 'La grande bellezza',
                'year' => 2013,
                'image' => 'https://st.kp.yandex.net/images/film_big/677566.jpg',
            ],
            [
                'kp_id' => 387388,
                'name' => 'Эксперимент 2: Волна',
                'original_name' => 'Die Welle',
                'year' => 2008,
                'image' => 'https://st.kp.yandex.net/images/film_big/387388.jpg',
            ],
        ];

        $sort = 10;
        foreach ($items as $item) {
            Movie::create(array_merge(
                $item,
                [
                    'watched' => false,
                    'sort' => $sort,
                ]
            ));

            $sort += 10;
        }
    }
}
