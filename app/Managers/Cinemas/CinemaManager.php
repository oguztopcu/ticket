<?php

namespace App\Managers\Cinemas;

use App\Repositories\Cinemas\CinemaRepository;

class CinemaManager
{
    private CinemaRepository $repository;

    public function __construct(CinemaRepository $cinemaRepository)
    {
        $this->repository = $cinemaRepository;
    }

    /**
     * Sinema salonun seçilen filme sahipliğini kontrol eder.
     *
     * @param int $cinemaId
     * @param int $movieId
     * @return bool
     */
    public function hasMovie(int $cinemaId, int $movieId): bool
    {
        return $this->repository->hasMovie($cinemaId, $movieId);
    }

    /**
     * Şehirde bulunan sinema salonlarını getirir.
     *
     * @param int $cityId
     * @param int $perPage
     * @return mixed
     */
    public function getByCityId(int $cityId, int $perPage = 20)
    {
        return $this->repository->getByCityId($cityId, $perPage);
    }

    /**
     * Tüm sinema salonlarını getirir.
     *
     * @param int $perPage
     * @return mixed
     */
    public function paginate(int $perPage = 20)
    {
        return $this->repository->paginate($perPage);
    }
}
