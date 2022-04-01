<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int id
 * @property int user_id
 * @property int cinema_id
 * @property int movie_id
 * @property int number
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property Carbon deleted_at
 */
class Ticket extends Model
{
    use SoftDeletes, HasFactory;

    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];
}
