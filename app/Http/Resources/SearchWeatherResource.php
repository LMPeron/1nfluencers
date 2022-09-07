<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;
use OpenApi\Attributes as OAT;

#[OAT\Schema(
    schema: 'SearchWeatherResource',
    properties: [
        new OAT\Property(property: 'main', type: 'string'),
        new OAT\Property(property: 'description', type: 'string'),
        new OAT\Property(property: 'lon', type: 'float'),
        new OAT\Property(property: 'lat', type: 'float'),
        new OAT\Property(property: 'temp', type: 'float'),
        new OAT\Property(property: 'temp_min', type: 'float'),
        new OAT\Property(property: 'temp_max', type: 'float'),
        new OAT\Property(property: 'feels_like', type: 'float'),
        new OAT\Property(property: 'pressure', type: 'float'),
        new OAT\Property(property: 'humididty', type: 'float'),
        new OAT\Property(property: 'sea_level', type: 'float'),
        new OAT\Property(property: 'grnd_level', type: 'float'),
        new OAT\Property(property: 'visibility', type: 'float'),
        new OAT\Property(property: 'wind_speed', type: 'float'),
    ]
)]
class SearchWeatherResource extends JsonResource
{
    public function toArray($request): array|Arrayable|JsonSerializable
    {
        return [
            'main' => $this->main,
            'description' => $this->description,
            'lon' => $this->lon,
            'lat' => $this->lat,
            'temp' => $this->temp,
            'temp_min' => $this->temp_min,
            'temp_max' => $this->temp_max,
            'feels_like' => $this->feels_like,
            'pressure' => $this->pressure,
            'humididty' => $this->humididty,
            'sea_level' => $this->sea_level,
            'grnd_level' => $this->grnd_level,
            'visibility' => $this->visibility,
            'wind_speed' => $this->wind_speed,
        ];
    }
}
