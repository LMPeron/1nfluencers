<?php

namespace App\Http\Middleware;

use GuzzleHttp\Client;
use App\Models\Weather;

class OpenWeather
{
    public function findWeather(object $data)
    {
        $client = new Client();
        $res = $client->request(
            'GET',

            // 'https://api.openweathermap.org/data/2.5/weather?lat=44.34&lon=10.99&appid=61802b993b60b0888ffc8425b0be5924'
            env('OPEN_WEATHER_URL') .
                '?lat=' .
                $data->lat .
                '&lon=' .
                $data->lon .
                '&appid=' .
                $data->token
        );
        return $res->getBody();
    }
}
