<?php

namespace Tests\Unit;

use App\Http\Controllers\ChatMessageController;
use App\Models\ChatMessage;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class ChatMessageControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_message_saves_to_database()
    {
        $controller = new ChatMessageController();

        $project = Project::factory()->create();
        $user = User::factory()->create();
        $request = Request::create('/api/messages', 'POST', [
            'project_id' => $project->id,
            'user_id' => $user->id,
            'message' => 'This is a test message',
        ]);

        $response = $controller->store($request);

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertDatabaseHas('chat_messages', ['project_id' => $project->id, 'user_id' => $user->id]);
        $this->assertDatabaseHas('chat_message_contents', ['content' => 'This is a test message']);
    }

    public function test_index_returns_messages()
    {
        $controller = new ChatMessageController();

        $project = Project::factory()->create();
        $user = User::factory()->create();

        $message = ChatMessage::factory()->create(['project_id' => $project->id, 'user_id' => $user->id]);

        $request = Request::create("/api/projects/{$project->id}/messages", 'GET');

        $response = $controller->index($request, $project->id);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertCount(1, $response->getData());
    }
}
