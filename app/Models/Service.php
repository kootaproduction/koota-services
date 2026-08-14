<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'badge_label',
        'subtitle',
        'description',
        'hero_cta_text',
        'hero_image',
        'icon',
        'order',
    ];

    public function solutions()
    {
        return $this->hasMany(ServiceSolution::class)->orderBy('order');
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
