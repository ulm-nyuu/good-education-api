<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'address' => $this->address,
            'suburb' => $this->suburb,
            'postcode' => $this->postcode,
            'state' => $this->state?->state_code,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'region' => $this->region,
        ];
    }
}
