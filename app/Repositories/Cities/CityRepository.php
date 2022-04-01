<?php

namespace App\Repositories\Cities;

use App\Models\City;

class CityRepository
{
    private City $model;

    public function __construct(City $city)
    {
        $this->model = $city;
    }

    /**
     * Tüm şehirleri getirir.
     *
     * @param int $perPage
     * @return mixed
     */
    public function paginate(int $perPage = 20): mixed
    {
        return $this->model->paginate($perPage);
    }

    /**
     * Yeni şehir oluşturur.
     *
     * @param array $data
     * @return City
     */
    public function create(array $data = []): City
    {
        return $this->model->create([
            'title' => $data['name']
        ]);
    }
}
