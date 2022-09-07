<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OAT;

#[OAT\Schema(
    schema: 'SearchWeatherRequest',
    required: ['lat', 'long', 'token'],
    properties: [
        new OAT\Property(
            property: 'lat',
            type: 'float',
        ),
        new OAT\Property(
            property: 'lon',
            type: 'float',
        ),
        new OAT\Property(
            property: 'token',
            type: 'string',
        ),
    ]
)]
class SearchWeatherRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'lat' => [ 'required'],
            'lon' => [ 'required' ],
            'token' => [ 'required', 'string'],
        ];
    }
}
