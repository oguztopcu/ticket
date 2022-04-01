<?php

namespace App\Managers\Tickets;

use App\Models\Ticket;
use App\Repositories\Tickets\TicketRepository;
use Illuminate\Http\Request;

class TicketManager
{
    private TicketRepository $repository;

    public function __construct(TicketRepository $ticketRepository)
    {
        $this->repository = $ticketRepository;
    }

    /**
     * Sinema salonundaki müsait koltuk durumuna bakar.
     *
     * @param int $cinemaId
     * @param int $movieId
     * @param int $seatNumber
     * @return bool
     */
    public function checkAvailableSeatNumber(int $cinemaId, int $movieId, int $seatNumber): bool
    {
        return ! $this->repository->checkAvailableSeatNumber($cinemaId, $movieId, $seatNumber);
    }

    /**
     * Satın alınan koltukları getirir.
     *
     * @param int $cinemaId
     * @param int $movieId
     * @return mixed
     */
    public function getPurchasedTicketByMovie(int $cinemaId, int $movieId)
    {
        return $this->repository->getPurchasedTicketByMovie($cinemaId, $movieId);
    }

    /**
     * Filme ait müsait koltukları getirir.
     *
     * @param int $cinemaId
     * @param int $movieId
     * @return array
     */
    public function getAvailableSeatsByMovie(int $cinemaId, int $movieId): array
    {
        return collect($this->getSeatNumbers())
            ->diff(
                $this->getPurchasedTicketByMovie($cinemaId, $movieId)->pluck('number')->toArray()
            )
            ->values()
            ->toArray();
    }

    /**
     * Bilet oluşturur.
     *
     * @param Request $request
     * @return Ticket
     */
    public function create(Request $request): Ticket
    {
        return $this->repository->create([
            'user_id' => $request->input('user_id'),
            'cinema_id' => $request->input('cinema_id'),
            'movie_id' => $request->input('movie_id'),
            'number' => $request->input('seat_number')
        ]);
    }

    /**
     * Sinema salonlarındaki toplam sandalye sayısını array olarak döndürür.
     *
     * @return array
     */
    public function getSeatNumbers(): array
    {
        $numbers = [];

        for ($n = 1; $n <= 50; $n++) {
            $numbers[] = $n;
        }

        return $numbers;
    }
}
