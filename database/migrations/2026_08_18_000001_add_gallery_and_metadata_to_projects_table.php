<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title');
            $table->json('gallery_images')->nullable()->after('image');
            $table->string('client')->nullable()->after('description');
            $table->string('location')->nullable()->after('client');
            $table->string('completion_date')->nullable()->after('location');
            $table->string('video_type')->nullable()->after('is_video'); // youtube, shorts, reels, local
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['slug', 'gallery_images', 'client', 'location', 'completion_date', 'video_type']);
        });
    }
};
