<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'category_name',
        'title',
        'slug',
        'description',
        'image',
        'gallery_images',
        'client',
        'location',
        'completion_date',
        'video_url',
        'video_type',
        'is_video',
        'is_featured',
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'is_video' => 'boolean',
        'is_featured' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title) . '-' . Str::random(5);
            }
        });
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
