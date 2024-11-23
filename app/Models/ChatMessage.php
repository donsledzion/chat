<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'user_id'];

    public function contents()
    {
        return $this->hasMany(ChatMessageContent::class, 'message_id');
    }
}
