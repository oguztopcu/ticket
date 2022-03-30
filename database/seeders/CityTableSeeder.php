<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            [
                'title' => 'Ankara'
            ],
            [
                'title' => 'Antalya'
            ],
            [
                'title' => 'İstanbul'
            ],
            [
                'title' => 'İzmir'
            ]
        ];

        foreach ($cities as $city) {
            City::query()->create($city);
        }
    }
}
