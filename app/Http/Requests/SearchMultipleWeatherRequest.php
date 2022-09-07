<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OAT;

#[OAT\Schema(
    schema: 'SearchMultipleWeatherRequest',
    required: ['address_list', 'token'],
    properties: [
        new OAT\Property(
            property: 'address_list',
            type: 'array',
        ),
        new OAT\Property(
            property: 'lon',
            type: 'string',
        ),
    ]
)]
class SearchMultipleWeatherRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'address_list' => [ 'required' ],
            'token' => [ 'required', 'string'],
        ];
    }
}
