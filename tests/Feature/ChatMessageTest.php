<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\ChatMessage;
use App\Models\ChatMessageContent;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ChatMessageTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_short_message()
    {
        $user = User::factory()->create();
        $project = Project::factory()->create();

        $response = $this->postJson('/api/messages', [
            'project_id' => $project->id,
            'user_id' => $user->id,
            'message' => 'Short message',
        ]);

        $response->assertStatus(201); // Zmiana na 201
        $this->assertDatabaseHas('chat_messages', ['project_id' => $project->id]);
        $this->assertDatabaseHas('chat_message_contents', ['content' => 'Short message']);
    }

    public function test_store_long_message()
    {
        $user = User::factory()->create(['id' => 1]);
        $project = Project::factory()->create();
        $longMessage = str_repeat('A', 200000);

        $response = $this->postJson('/api/messages', [
            'project_id' => $project->id,
            'user_id' => $user->id,
            'message' => $longMessage,
        ]);

        $response->assertStatus(201); // Zmiana na 201
        $this->assertDatabaseHas('chat_messages', ['project_id' => $project->id]);
        $this->assertDatabaseCount('chat_message_contents', ceil(strlen($longMessage) / 65535));
    }

    public function test_fetch_messages_with_long_message_merged()
    {
        $user = User::factory()->create(['id' => 1]);
        $project = Project::factory()->create();
        $message = ChatMessage::factory()->create(['project_id' => $project->id, 'user_id' => $user->id]);

        $content = str_repeat('A', 200000);
        $parts = str_split($content, 65535);

        foreach ($parts as $index => $part) {
            ChatMessageContent::factory()->create([
                'message_id' => $message->id,
                'content' => $part,
                'part_number' => $index,
            ]);
        }

        $response = $this->getJson("/api/projects/{$project->id}/messages");

        $response->assertStatus(200);
        $this->assertEquals($content, $response->json()[0]['full_message']);
    }
}
