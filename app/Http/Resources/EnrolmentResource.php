<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EnrolmentResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'year' => $this->year,
            'total_students' => $this->total_students,
            'male_students' => $this->male_students,
            'female_students' => $this->female_students,
            'total_staff' => $this->total_staff,
        ];
    }
}
