<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use App\Models\ChatMessageContent;
use Illuminate\Http\Request;

class ChatMessageController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        $maxLength = 65535;

        $message = ChatMessage::create([
            'project_id' => $validated['project_id'],
            'user_id' => $validated['user_id'],
        ]);

        $parts = str_split($validated['message'], $maxLength);

        foreach ($parts as $index => $part) {
            ChatMessageContent::create([
                'message_id' => $message->id,
                'content' => $part,
                'part_number' => $index,
            ]);
        }

        return response()->json(['message' => 'Message stored successfully'], 201);
    }

    public function index(Request $request, $projectId)
    {
        $messages = ChatMessage::with('contents')
            ->where('project_id', $projectId)
            ->get()
            ->map(function ($message) {
                $message->full_message = $message->contents->sortBy('part_number')->pluck('content')->implode('');
                return $message;
            });

        return response()->json($messages, 200);
    }
}
