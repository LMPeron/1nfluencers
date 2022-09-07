<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;
use OpenApi\Attributes as OAT;

#[OAT\Schema(
    schema: 'LoggedInUserResource',
    properties: [
        new OAT\Property(property: 'user', type: 'object', ref: '#/components/schemas/UserResource'),
        new OAT\Property(property: 'token', type: 'object', ref: '#/components/schemas/AccessTokenResource'),
    ]
)]
class LoggedInUserResource extends JsonResource
{
    public function __construct(private User $user)
    {
        parent::__construct($user);
    }

    public function toArray($request): array|Arrayable|JsonSerializable
    {
        $token = $this->user->createToken('auth-token');

        return [
            'user' => new UserResource($this->user),
            'token' => new AccessTokenResource($token),
        ];
    }
}
