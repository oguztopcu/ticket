<?php

namespace App\Repositories\Cinemas;

use App\Models\Cinema;
use Illuminate\Database\Eloquent\Builder;

class CinemaRepository
{
    private Cinema $model;

    public function __construct(Cinema $cinema)
    {
        $this->model = $cinema;
    }

    /**
     * Sinemanın filme sahipliğini kontrol eder.
     *
     * @param int $cinemaId
     * @param int $movieId
     * @return bool
     */
    public function hasMovie(int $cinemaId, int $movieId): bool
    {
        return $this->model
            ->where('id', '=', $cinemaId)
            ->whereHas('movies', function (Builder $movieQuery) use ($movieId) {
                $movieQuery->where('id', '=', $movieId);
            })
            ->exists();
    }

    /**
     * Şehire göre sinema salonlarını getirir.
     *
     * @param int $cityId
     * @param int $perPage
     * @return mixed
     */
    public function getByCityId(int $cityId, int $perPage = 20)
    {
        return $this->model->where('city_id', '=', $cityId)->paginate($perPage);
    }

    /**
     * Tüm sinema salonlarını getirir.
     *
     * @param int $perPage
     * @return mixed
     */
    public function paginate(int $perPage = 20)
    {
        return $this->model->paginate($perPage);
    }
}
