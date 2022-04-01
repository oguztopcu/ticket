<?php

namespace App\Managers\Cities;

use App\Models\City;
use App\Repositories\Cities\CityRepository;
use Illuminate\Http\Request;

class CityManager
{
    private CityRepository $repository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->repository = $cityRepository;
    }

    /**
     * Tüm şehirleri getirir.
     *
     * @param int $perPage
     * @return mixed
     */
    public function paginate(int $perPage = 20)
    {
        return $this->repository->paginate($perPage);
    }

    /**
     * Şehir oluşturur.
     *
     * @param Request $request
     * @return City
     */
    public function create(Request $request): City
    {
        return $this->repository->create($request->only(['name']));
    }
}
