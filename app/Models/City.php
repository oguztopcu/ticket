<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int id
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property Carbon deleted_at
 * @property-read Cinema[] cinemas
 */
class City extends Model
{
    use SoftDeletes, HasFactory;

    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];

    public function cinemas(): HasMany
    {
        return $this->hasMany(Cinema::class);
    }
}
