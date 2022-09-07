<?php

namespace App\Services;

use App\Models\Weather;
use App\Repositories\WeatherRepository;
use App\Http\Middleware\OpenWeather;

class WeatherService
{
    public function __construct(private WeatherRepository $weatherRepository, private OpenWeather $openWeather)
    {
        //
    }

    public function find(object $data): Weather
    {
        $w = $this->openWeather->findWeather($data);
        $d = json_decode($w);
        return $this->weatherRepository->create([
            'lat' => $d->coord->lat,
            'lon' => $d->coord->lon,
            'main' => $d->weather[0]->main,
            'description' => $d->weather[0]->description,
            'temp' => $d->main->temp,
            'temp_min' => $d->main->temp_min,
            'temp_max' => $d->main->temp_max,
            'feels_like' => $d->main->feels_like,
            'pressure' => $d->main->pressure,
            'humididty' => $d->main->humidity,
            'sea_level' => $d->main->sea_level,
            'grnd_level' => $d->main->grnd_level,
            'visibility' => $d->visibility,
            'wind_speed' => $d->wind->speed
        ]);
    }

    public function findMultiple(array $address_list): ?Weather
    {

        // transformar em lista
        $this->openWeather->findWeather($address_list);

        return $this->weatherRepository->get(['email' => $email]);
    }
}
