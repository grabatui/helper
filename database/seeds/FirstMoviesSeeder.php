<?php

use App\Entities\Movie;
use Illuminate\Database\Seeder;

class FirstMoviesSeeder extends Seeder
{
    public function run()
    {
        $items = [
            [
                'kp_id' => 84788,
                'name' => 'Воспитатели',
                'year' => 2004,
                'image' => 'https://st.kp.yandex.net/images/film_big/84788.jpg',
            ],
            [
                'kp_id' => 677566,
                'name' => 'Великая красота',
                'year' => 2013,
                'image' => 'https://st.kp.yandex.net/images/film_big/677566.jpg',
            ],
            [
                'kp_id' => 387388,
                'name' => 'Эксперимент 2: Волна',
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
