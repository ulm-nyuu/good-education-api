<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\School;
use App\Models\Location;
use App\Models\Enrolment;
use App\Models\Program;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Reference tables
        $this->call([
            SchoolSectorSeeder::class,
            SchoolTypeSeeder::class,
            StateSeeder::class,
        ]);

        // Programs
        Program::factory()->count(5)->create();

        // Generate Schools with relationships
        School::factory()
            ->count(100)
            ->create()
            ->each(function ($school) {
                // Attach location
                Location::factory()->create(['school_id' => $school->id]);

                // Add enrolments over multiple years
                Enrolment::factory()->count(3)->create(['school_id' => $school->id]);

                // Random programs
                $programIds = Program::inRandomOrder()->take(rand(1, 3))->pluck('id');
                $school->programs()->attach($programIds);
            });
    }
}
