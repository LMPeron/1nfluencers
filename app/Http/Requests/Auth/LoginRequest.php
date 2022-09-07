<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OAT;

#[OAT\Schema(
    schema: 'LoginRequest',
    required: ['email', 'password'],
    properties: [
        new OAT\Property(
            property: 'email',
            type: 'string',
            format: 'email',
        ),
        new OAT\Property(
            property: 'password',
            type: 'string',
        ),
    ]
)]
class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ];
    }
}
