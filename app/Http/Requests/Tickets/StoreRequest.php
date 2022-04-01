<?php

namespace App\Http\Requests\Tickets;

use App\Rules\CheckMovieTheaterSeatNumberRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'cinema_id' => ['required', 'exists:cinemas,id'],
            'movie_id' => ['required', 'exists:movies,id'],
            'seat_number' => ['required', 'integer', 'min:1', 'max:50', new CheckMovieTheaterSeatNumberRule($this->request)],
        ];
    }
}
