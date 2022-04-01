<?php

namespace App\Repositories\Movies;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Builder;

class MovieRepository
{
    private Movie $model;

    public function __construct(Movie $movie)
    {
        $this->model = $movie;
    }

    /**
     * Sinema salonuna göre tüm filmleri getirir.
     *
     * @param int $cinemaId
     * @param int $perPage
     * @return mixed
     */
    public function getByCinemaId(int $cinemaId, int $perPage = 20): mixed
    {
        return $this->model
            ->whereHas('cinemas', function (Builder $cinemaQuery) use ($cinemaId) {
                $cinemaQuery->where('id', '=', $cinemaId);
            })
            ->paginate($perPage);
    }
}
