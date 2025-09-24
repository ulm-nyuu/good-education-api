<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\School;
use App\Models\SchoolSector;
use App\Models\SchoolType;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SchoolApiTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed', ['--class' => 'SchoolSectorSeeder']);
        $this->artisan('db:seed', ['--class' => 'SchoolTypeSeeder']);
        $this->artisan('db:seed', ['--class' => 'StateSeeder']);
    }

    /** @test */
    public function it_can_list_schools()
    {
        $school = School::factory()->create();

        $response = $this->getJson('/api/schools');

        $response->assertStatus(200)
            ->assertJsonFragment(['official_name' => $school->official_name]);
    }

    /** @test */
    public function it_can_show_a_school()
    {
        $school = School::factory()->create();

        $response = $this->getJson("/api/schools/{$school->id}");

        $response->assertStatus(200)
            ->assertJsonFragment(['id' => $school->id]);
    }

    /** @test */
    public function it_can_create_a_school()
    {
        $sector = SchoolSector::first();
        $type = SchoolType::first();

        $payload = [
            'official_name' => 'Test High School',
            'sector_id' => $sector->id,
            'type_id' => $type->id,
            'established_year' => 2000,
        ];

        $response = $this->postJson('/api/schools', $payload);

        $response->assertStatus(201)
            ->assertJsonFragment(['official_name' => 'Test High School']);

        $this->assertDatabaseHas('schools', ['official_name' => 'Test High School']);
    }

    /** @test */
    public function it_can_update_a_school()
    {
        $school = School::factory()->create();

        $response = $this->putJson("/api/schools/{$school->id}", [
            'official_name' => 'Updated School'
        ]);

        $response->assertStatus(200)
            ->assertJsonFragment(['official_name' => 'Updated School']);
    }

    /** @test */
    public function it_can_delete_a_school()
    {
        $school = School::factory()->create();

        $response = $this->deleteJson("/api/schools/{$school->id}");

        $response->assertStatus(200);

        $this->assertDatabaseMissing('schools', ['id' => $school->id]);
    }
}
