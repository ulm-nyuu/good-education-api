<?php

namespace Database\Factories;

use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramFactory extends Factory
{
    protected $model = Program::class;

    public function definition(): array
    {
        return [
            'program_name' => $this->faker->randomElement([
                'STEM Excellence',
                'Sports Academy',
                'Arts & Music',
                'Indigenous Support',
                'Digital Literacy'
            ]),
            'description' => $this->faker->sentence(10),
        ];
    }
}
