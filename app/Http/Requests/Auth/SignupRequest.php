<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OAT;

#[OAT\Schema(
    schema: 'SignupRequest',
    required: ['name', 'email', 'password', 'password_confirmation'],
    properties: [
        new OAT\Property(
            property: 'name',
            type: 'string',
        ),
        new OAT\Property(
            property: 'email',
            type: 'string',
            format: 'email',
        ),
        new OAT\Property(
            property: 'password',
            type: 'string',
        ),
        new OAT\Property(
            property: 'password_confirmation',
            type: 'string',
        ),
    ]
)]
class SignupRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    /**
     * VALIDATION
     * The user must have an unique email address and the password must have at least 8 characters; 
    */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'email',
                'unique:App\Models\User,email',
            ],
            'password' => [
                'required',
                'min:8',
                'string',
                'confirmed',
            ],
        ];
    }
}
