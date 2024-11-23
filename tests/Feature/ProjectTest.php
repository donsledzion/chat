<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_project()
    {
        $response = $this->postJson('/api/projects', [
            'name' => 'Test Project',
            'description' => 'This is a test project',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('projects', ['name' => 'Test Project']);
    }

    public function test_fetch_projects()
    {
        Project::factory()->count(5)->create();

        $response = $this->getJson('/api/projects');

        $response->assertStatus(200);
        $this->assertCount(5, $response->json());
    }
}
