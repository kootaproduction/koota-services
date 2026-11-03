<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatbotLog extends Model
{
    use HasFactory;

    protected $table = 'chatbot_logs';

    protected $fillable = [
        'user_message',
        'bot_reply',
        'matched_source',
        'chatbot_knowledge_id',
        'is_resolved',
    ];

    protected $casts = [
        'is_resolved' => 'boolean',
    ];

    public function knowledge()
    {
        return $this->belongsTo(ChatbotKnowledge::class, 'chatbot_knowledge_id');
    }
}

