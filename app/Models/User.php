<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use SoftDeletes, HasApiTokens, HasFactory, Notifiable;

    protected $guarded = ['id'];

    protected $hidden = ['password'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
