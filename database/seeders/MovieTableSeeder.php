<?php

namespace Database\Seeders;

use App\Models\Cinema;
use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies = [
            [
                'title' => 'Çiçero',
                'poster' => 'https://tr.web.img4.acsta.net/pictures/19/01/03/11/54/4613697.jpg',
                'cinemas' => Cinema::query()->whereIn('title', ['Antalya Sinemaları', 'İstanbul Sinemaları'])->get()->pluck('id')->toArray()
            ],
            [
                'title' => 'Bergen',
                'poster' => 'https://tr.web.img4.acsta.net/pictures/22/02/18/14/06/0405738.jpg',
                'cinemas' => Cinema::query()->whereIn('title', ['Antalya Sinemaları', 'İzmir Sinemaları'])->get()->pluck('id')->toArray()
            ],
            [
                'title' => 'Karakomik Filmler 2',
                'poster' => 'https://tr.web.img4.acsta.net/pictures/19/11/21/11/20/5550474.jpg',
                'cinemas' => Cinema::query()->whereIn('title', ['Ankara Sinemaları', 'İstanbul Sinemaları'])->get()->pluck('id')->toArray()
            ],
            [
                'title' => 'Kaybedenler Kulübü',
                'poster' => 'https://i2.wp.com/arsizsanat.com/wp-content/uploads/2017/08/kaybedenler-kulubu-yolda-ikinci-film1.jpg?resize=542%2C781',
                'cinemas' => Cinema::query()->whereIn('title', ['Ankara Sinemaları', 'İzmir Sinemaları'])->get()->pluck('id')->toArray()
            ],
            [
                'title' => 'Fakat Müzeyyen Bu Derin Bir Tutku',
                'poster' => 'https://tr.web.img4.acsta.net/pictures/14/11/07/11/05/077882.jpg',
                'cinemas' => Cinema::query()->whereIn('title', ['Ankara Sinemaları', 'Antalya Sinemaları', 'İstanbul Sinemaları', 'İzmir Sinemaları'])->get()->pluck('id')->toArray()
            ],
            [
                'title' => 'Organize İşler',
                'poster' => 'https://upload.wikimedia.org/wikipedia/tr/e/e5/Organize_isler.jpg',
                'cinemas' => Cinema::query()->whereIn('title', ['Ankara Sinemaları', 'Antalya Sinemaları', 'İstanbul Sinemaları', 'İzmir Sinemaları'])->get()->pluck('id')->toArray()
            ],
            [
                'title' => 'Gora',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BMjE0MTY2MDI3NV5BMl5BanBnXkFtZTcwNTc1MzEzMQ@@._V1_FMjpg_UX1000_.jpg',
                'cinemas' => Cinema::query()->whereIn('title', ['Ankara Sinemaları', 'Antalya Sinemaları', 'İstanbul Sinemaları', 'İzmir Sinemaları'])->get()->pluck('id')->toArray()
            ],
            [
                'title' => 'Arog',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BZjgxY2JkNjEtZmQ2NC00YWM4LWE5ZjEtYzg5MjY2Yjc5Y2ZmXkEyXkFqcGdeQXVyMjExNjgyMTc@._V1_.jpg',
                'cinemas' => Cinema::query()->whereIn('title', ['Ankara Sinemaları', 'Antalya Sinemaları', 'İstanbul Sinemaları', 'İzmir Sinemaları'])->get()->pluck('id')->toArray()
            ]
        ];

        foreach ($movies as $movie) {
            $cinemaIds = $movie['cinemas'] ?? [];
            unset($movie['cinemas']);

            $movie = Movie::query()->create($movie);

            if (count($cinemaIds)) {
                $movie->cinemas()->attach($cinemaIds);
            }
        }
    }
}
