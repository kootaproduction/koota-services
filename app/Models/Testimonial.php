<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'client_name',
        'client_title',
        'rating',
        'content',
        'avatar',
        'location',
        'order',
        'is_published',
    ];

    protected $casts = [
        'rating' => 'integer',
        'order' => 'integer',
        'is_published' => 'boolean',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

