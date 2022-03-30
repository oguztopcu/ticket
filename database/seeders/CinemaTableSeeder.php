<?php

namespace Database\Seeders;

use App\Models\Cinema;
use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CinemaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cinemas = [
            [
                'city_id' => City::query()->where('title', '=', 'Ankara')->first(['id'])->id,
                'title' => 'Ankara Sinemaları'
            ],
            [
                'city_id' => City::query()->where('title', '=', 'Antalya')->first(['id'])->id,
                'title' => 'Antalya Sinemaları'
            ],
            [
                'city_id' => City::query()->where('title', '=', 'İstanbul')->first(['id'])->id,
                'title' => 'İstanbul Sinemaları'
            ],
            [
                'city_id' => City::query()->where('title', '=', 'İzmir')->first(['id'])->id,
                'title' => 'İzmir Sinemaları'
            ]
        ];

        foreach ($cinemas as $cinema) {
            Cinema::query()->create($cinema);
        }
    }
}
