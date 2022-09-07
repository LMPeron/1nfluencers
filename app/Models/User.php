<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'email_verified'];
    protected $hidden = ['password'];
    protected $casts = [
        'email_verified' => 'boolean',
    ];
    protected $connection = 'mongodb';
    protected $collection = 'user';
}
