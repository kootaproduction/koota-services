<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatbotKnowledge extends Model
{
    use HasFactory;

    protected $table = 'chatbot_knowledges';

    protected $fillable = [
        'category',
        'question',
        'keywords',
        'answer',
        'order',
        'is_active',
        'hit_count',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'hit_count' => 'integer',
        'order' => 'integer',
    ];

    public function logs()
    {
        return $this->hasMany(ChatbotLog::class, 'chatbot_knowledge_id');
    }
}

