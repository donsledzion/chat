<?php

namespace Tests\Unit;

use App\Models\ChatMessage;
use App\Models\ChatMessageContent;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ChatMessageTest extends TestCase
{
    use RefreshDatabase;

    public function test_chat_message_belongs_to_project()
    {
        $project = Project::factory()->create();
        $user = User::factory()->create();

        $message = ChatMessage::create([
            'project_id' => $project->id,
            'user_id' => $user->id,
        ]);

        $this->assertInstanceOf(Project::class, $message->project);
    }

    public function test_chat_message_belongs_to_user()
    {
        $project = Project::factory()->create();
        $user = User::factory()->create();

        $message = ChatMessage::create([
            'project_id' => $project->id,
            'user_id' => $user->id,
        ]);

        $this->assertInstanceOf(User::class, $message->user);
    }

    public function test_chat_message_has_many_contents()
    {
        $project = Project::factory()->create();
        $user = User::factory()->create();

        $message = ChatMessage::create([
            'project_id' => $project->id,
            'user_id' => $user->id,
        ]);

        ChatMessageContent::factory()->create([
            'message_id' => $message->id,
        ]);

        $this->assertCount(1, $message->contents);
    }
}
