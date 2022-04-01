<?php

namespace App\Rules;

use App\Managers\Tickets\TicketManager;
use Illuminate\Contracts\Validation\Rule;
use Symfony\Component\HttpFoundation\InputBag;

class CheckMovieTheaterSeatNumberRule implements Rule
{
    public int $seatNumber = 0;

    protected InputBag $inputBag;

    private TicketManager $ticketManager;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(InputBag $inputBag)
    {
        $this->inputBag = $inputBag;
        $this->ticketManager = app(TicketManager::class);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $this->seatNumber = $value;

        return $this->ticketManager->checkAvailableSeatNumber(
            $this->inputBag->get('cinema_id'),
            $this->inputBag->get('movie_id'),
            $value
        );
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return $this->seatNumber . ' numaralı koltuk zaten dolu.';
    }
}
