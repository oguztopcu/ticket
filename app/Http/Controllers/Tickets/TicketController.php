<?php

namespace App\Http\Controllers\Tickets;

use App\Models\User;
use App\Models\Movie;
use App\Models\Cinema;
use App\Http\Controllers\Controller;
use App\Managers\Cinemas\CinemaManager;
use App\Managers\Tickets\TicketManager;
use App\Http\Requests\Tickets\StoreRequest;
use App\Exceptions\InvalidMovieTheaterException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class TicketController extends Controller
{
    private TicketManager $ticketManager;

    private CinemaManager $cinemaManager;

    public function __construct(TicketManager $ticketManager, CinemaManager $cinemaManager)
    {
        $this->ticketManager = $ticketManager;
        $this->cinemaManager = $cinemaManager;
    }

    /**
     * Filme ait müsait koltukları getirir.
     *
     * @param Cinema $cinema
     * @param Movie $movie
     * @return JsonResponse
     */
    public function availableTickets(Cinema $cinema, Movie $movie): JsonResponse
    {
        $availableSeats = $this->ticketManager->getAvailableSeatsByMovie($cinema->id, $movie->id);

        return response()->json([
            'data' => [
                'available_seats' => $availableSeats
            ]
        ]);
    }

    /**
     * Bilet satın alır.
     *
     * @param StoreRequest $request
     * @return mixed
     */
    public function buyTicket(StoreRequest $request): JsonResponse
    {
        return DB::transaction(function () use ($request) {
            try {
                if (! $this->cinemaManager->hasMovie($request->input('cinema_id'), $request->input('movie_id'))) {
                    throw new InvalidMovieTheaterException();
                }

                /** @var User $user */
                $user = auth()->user();

                $request->merge([
                    'user_id' => $user->id,
                ]);

                $this->ticketManager->create($request);

                return response()->json([
                    'message' => 'Biletiniz başarıyla oluşturulmuştur, iyi seyirler.'
                ], Response::HTTP_CREATED);
            } catch (\Exception $e) {
                Log::error($e->getMessage(), $e->getTrace());
                DB::rollBack();

                return response()->json([
                    'message' => $e->getMessage()
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        });
    }
}
