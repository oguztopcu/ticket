<?php

namespace App\Http\Controllers\City;

use App\Models\City;
use App\Http\Controllers\Controller;
use App\Managers\Cities\CityManager;
use App\Managers\Cinemas\CinemaManager;
use App\Http\Resources\Cities\CityResource;
use App\Http\Resources\Cinema\CinemaResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CityController extends Controller
{
    private CityManager $cityManager;

    private CinemaManager $cinemaManager;

    public function __construct(CityManager $cityManager, CinemaManager $cinemaManager)
    {
        $this->cityManager = $cityManager;
        $this->cinemaManager = $cinemaManager;
    }

    /**
     * Tüm şehirleri getirir.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return CityResource::collection(
            $this->cityManager->paginate()
        );
    }

    /**
     * Şehirde bulunan sinema salonlarını getirir.
     *
     * @param City $city
     * @return AnonymousResourceCollection
     */
    public function cinemas(City $city): AnonymousResourceCollection
    {
        return CinemaResource::collection(
            $this->cinemaManager->getByCityId($city->id)
        );
    }
}
