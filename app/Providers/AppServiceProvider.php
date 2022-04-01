<?php

namespace App\Providers;

use App\Models\Cinema;
use App\Models\City;
use App\Models\Movie;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Route::model('userId', User::class);
        Route::model('cityId', City::class);
        Route::model('movieId', Movie::class);
        Route::model('cinemaId', Cinema::class);
        Route::model('ticketId', Ticket::class);
    }
}
