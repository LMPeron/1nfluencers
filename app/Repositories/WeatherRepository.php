<?php

namespace App\Repositories;

use App\Models\Weather;

class WeatherRepository extends BaseRepository
{
    public function __construct(Weather $weather)
    {
        $this->model = $weather;
    }
}
