<?php

namespace App\Exceptions;

use Exception;

class InvalidMovieTheaterException extends Exception
{
    protected $message = 'Seçilen sinema salonunda böyle bir film yok.';
}
