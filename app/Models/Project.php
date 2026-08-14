<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'category_name',
        'title',
        'description',
        'image',
        'video_url',
        'is_video',
        'is_featured',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
