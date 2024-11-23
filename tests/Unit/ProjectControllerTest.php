<?php

namespace Tests\Unit;

use App\Http\Controllers\ProjectController;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class ProjectControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_creates_project()
    {
        $controller = new ProjectController();

        $request = Request::create('/api/projects', 'POST', [
            'name' => 'Test Project',
            'description' => 'This is a test project description',
        ]);

        $response = $controller->store($request);

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertDatabaseHas('projects', ['name' => 'Test Project']);
    }

    public function test_index_returns_all_projects()
    {
        $controller = new ProjectController();

        Project::factory()->count(3)->create();

        $request = Request::create('/api/projects', 'GET');

        $response = $controller->index($request);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertCount(3, $response->getData());
    }
}
