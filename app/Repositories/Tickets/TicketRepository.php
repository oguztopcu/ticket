<?php

namespace App\Repositories\Tickets;

use App\Models\Ticket;

class TicketRepository
{
    private Ticket $model;

    public function __construct(Ticket $ticket)
    {
        $this->model = $ticket;
    }

    /**
     * Satın alınan biletleri getirir.
     *
     * @param int $cinemaId
     * @param int $movieId
     * @return mixed
     */
    public function getPurchasedTicketByMovie(int $cinemaId, int $movieId)
    {
        return $this->model
            ->where('cinema_id', '=', $cinemaId)
            ->where('movie_id', '=', $movieId)
            ->get();
    }

    /**
     * Filme ait koltuk numarasının boş/dolu durumunu kontrol eder.
     *
     * @param int $cinemaId
     * @param int $movieId
     * @param int $seatNumber
     * @return mixed
     */
    public function checkAvailableSeatNumber(int $cinemaId, int $movieId, int $seatNumber): bool
    {
        return $this->model
            ->where('cinema_id', '=', $cinemaId)
            ->where('movie_id', '=', $movieId)
            ->where('number', '=', $seatNumber)
            ->exists();
    }

    /**
     * Yeni bilet oluşturur.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data = []): Ticket
    {
        return $this->model->create($data);
    }
}
