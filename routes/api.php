<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Cinemas\CinemaController;
use App\Http\Controllers\City\CityController;
use App\Http\Controllers\Tickets\TicketController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('/register', [RegisterController::class, 'register']);
    });

    Route::middleware('auth')->group(function () {
        Route::prefix('cities')->group(function () {
            Route::get('/', [CityController::class, 'index']);

            Route::get('/{cityId}/cinemas', [CityController::class, 'cinemas']);
        });

        Route::prefix('cinemas')->group(function () {
            Route::get('/', [CinemaController::class, 'index']);

            Route::get('/{cinemaId}/movies', [CinemaController::class, 'movies']);

            Route::prefix('/{cinemaId}')->group(function () {
                Route::get('/movies/{movieId}/available-tickets', [TicketController::class, 'availableTickets']);
            });
        });

        Route::prefix('tickets')->group(function () {
            Route::post('/', [TicketController::class, 'buyTicket']);
        });
    });
});
