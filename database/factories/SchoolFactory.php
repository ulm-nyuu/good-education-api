<?php

namespace Database\Factories;

use App\Models\School;
use App\Models\SchoolSector;
use App\Models\SchoolType;
use App\Models\GoverningBody;
use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolFactory extends Factory
{
    protected $model = School::class;

    public function definition(): array
    {
        return [
            'official_name' => $this->faker->company . ' School',
            'common_name' => $this->faker->lastName . ' College',
            'sector_id' => SchoolSector::inRandomOrder()->first()->id ?? SchoolSector::factory(),
            'type_id' => SchoolType::inRandomOrder()->first()->id ?? SchoolType::factory(),
            'governing_body_id' => GoverningBody::inRandomOrder()->first()->id ?? null,
            'established_year' => $this->faker->year,
            'website' => $this->faker->url,
            'contact_email' => $this->faker->safeEmail,
            'contact_phone' => $this->faker->phoneNumber,
        ];
    }
}
