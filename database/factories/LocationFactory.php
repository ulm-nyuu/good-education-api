<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\School;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    protected $model = Location::class;

    public function definition(): array
    {
        return [
            'school_id' => School::factory(),
            'address' => $this->faker->streetAddress,
            'suburb' => $this->faker->city,
            'postcode' => $this->faker->postcode,
            'state_id' => State::inRandomOrder()->first()->id ?? State::factory(),
            'latitude' => $this->faker->latitude(-44, -10),
            'longitude' => $this->faker->longitude(112, 154),
            'region' => $this->faker->randomElement(['Metro', 'Regional', 'Remote']),
        ];
    }
}
