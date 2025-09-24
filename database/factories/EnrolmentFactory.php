<?php

namespace Database\Factories;

use App\Models\Enrolment;
use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnrolmentFactory extends Factory
{
    protected $model = Enrolment::class;

    public function definition(): array
    {
        $total = $this->faker->numberBetween(50, 2000);
        $male = intval($total * $this->faker->randomFloat(2, 0.45, 0.55));
        $female = $total - $male;

        return [
            'school_id' => School::factory(),
            'year' => $this->faker->year,
            'total_students' => $total,
            'male_students' => $male,
            'female_students' => $female,
            'total_staff' => $this->faker->numberBetween(5, 150),
        ];
    }
}
