<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProgramResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'program_name' => $this->program_name,
            'description' => $this->description,
        ];
    }
}
