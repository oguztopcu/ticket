<?php

namespace App\Http\Controllers\Cinemas;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cinema\CinemaResource;
use App\Http\Resources\Movies\MovieResource;
use App\Managers\Cinemas\CinemaManager;
use App\Managers\Movies\MovieManager;
use App\Models\Cinema;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CinemaController extends Controller
{
    private CinemaManager $cinemaManager;

    private MovieManager $movieManager;

    public function __construct(CinemaManager $cinemaManager, MovieManager $movieManager)
    {
        $this->cinemaManager = $cinemaManager;
        $this->movieManager = $movieManager;
    }

    /**
     * Tüm sinema salonlarını listeler.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return CinemaResource::collection(
            $this->cinemaManager->paginate()
        );
    }

    /**
     * Sinema salonlarındaki gösterilen filmleri listeler.
     *
     * @param Cinema $cinema
     * @return AnonymousResourceCollection
     */
    public function movies(Cinema $cinema): AnonymousResourceCollection
    {
        return MovieResource::collection(
            $this->movieManager->getByCinemaId($cinema->id)
        );
    }
}
