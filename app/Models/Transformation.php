<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'title',
        'category',
        'image_before',
        'image_after',
        'description',
        'location',
        'duration',
        'order',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'order' => 'integer',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

