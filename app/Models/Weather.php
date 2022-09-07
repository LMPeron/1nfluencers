<?php

namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Weather extends Eloquent
{
    protected $fillable = [
        'main',
        'description',
        'lon',
        'lat',
        'temp',
        'temp_min',
        'temp_max',
        'feels_like',
        'pressure',
        'humididty',
        'sea_level',
        'grnd_level',
        'visibility',
        'wind_speed',
    ];

    protected $connection = 'mongodb';
    protected $collection = 'weather';
}

