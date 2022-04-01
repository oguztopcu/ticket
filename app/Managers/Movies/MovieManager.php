<?php

namespace App\Managers\Movies;

use App\Repositories\Movies\MovieRepository;

class MovieManager
{
    private MovieRepository $repository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->repository = $movieRepository;
    }

    /**
     * Sinema salonlarına göre filmleri getirir.
     *
     * @param int $cinemaId
     * @param int $perPage
     * @return mixed
     */
    public function getByCinemaId(int $cinemaId, int $perPage = 20)
    {
        return $this->repository->getByCinemaId($cinemaId, $perPage);
    }
}
