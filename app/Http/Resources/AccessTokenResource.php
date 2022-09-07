<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;
use OpenApi\Attributes as OAT;

#[OAT\Schema(
    schema: 'AccessTokenResource',
    properties: [
        new OAT\Property(
            property: 'access_token',
            type: 'string',
        ),
        new OAT\Property(
            property: 'type',
            type: 'string',
        ),
    ]
)]
class AccessTokenResource extends JsonResource
{
    public function toArray($request): array|Arrayable|JsonSerializable
    {
        return [
            'access_token' => $this->plainTextToken,
            'type' => 'bearer',
        ];
    }
}
