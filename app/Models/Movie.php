<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int id
 * @property string title
 * @property string poster
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property Carbon deleted_at
 */
class Movie extends Model
{
    use SoftDeletes, HasFactory;

    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];

    public function cinemas(): BelongsToMany
    {
        return $this->belongsToMany(Cinema::class, 'movie_cinemas');
    }
}
