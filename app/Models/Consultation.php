<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_type',
        'name',
        'whatsapp',
        'email',
        'location',
        'property_type',
        'notes',
        'photo_path',
        'status',
    ];
}
