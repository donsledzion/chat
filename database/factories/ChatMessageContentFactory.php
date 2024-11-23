<?php

namespace Database\Factories;

use App\Models\ChatMessageContent;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChatMessageContentFactory extends Factory
{
    protected $model = ChatMessageContent::class;

    public function definition()
    {
        return [
            'message_id' => 1,
            'content' => $this->faker->text(65535),
            'part_number' => 0,
        ];
    }
}
