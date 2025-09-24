<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SchoolResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'official_name' => $this->official_name,
            'common_name' => $this->common_name,
            'sector' => $this->sector?->sector_name,
            'type' => $this->type?->type_name,
            'governing_body' => $this->governingBody?->body_name,
            'established_year' => $this->established_year,
            'website' => $this->website,
            'contact_email' => $this->contact_email,
            'contact_phone' => $this->contact_phone,
            'locations' => LocationResource::collection($this->whenLoaded('locations')),
            'enrolments' => EnrolmentResource::collection($this->whenLoaded('enrolments')),
            'programs' => ProgramResource::collection($this->whenLoaded('programs')),
        ];
    }
}
