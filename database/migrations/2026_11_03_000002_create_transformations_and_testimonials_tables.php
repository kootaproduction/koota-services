<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Transformations Table (Before & After Showcase)
        Schema::create('transformations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->nullable()->constrained('services')->nullOnDelete();
            $table->string('title');
            $table->string('category')->default('Home Cleaning'); // Home Cleaning, Perbaikan Rumah, Pengangkutan Sampah
            $table->string('image_before');
            $table->string('image_after');
            $table->text('description')->nullable();
            $table->string('location')->nullable(); // Surabaya, Malang, Bali, Jakarta
            $table->string('duration')->nullable(); // misal: "3 Jam Pengerjaan", "1 Hari Kerja"
            $table->integer('order')->default(0);
            $table->boolean('is_featured')->default(true);
            $table->timestamps();
        });

        // 2. Testimonials Table (Client Reviews & Star Ratings)
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->nullable()->constrained('services')->nullOnDelete();
            $table->string('client_name');
            $table->string('client_title')->nullable(); // misal: "Pemilik Rumah di Citraland", "Manager Kafe", "Pengelola Klaster"
            $table->unsignedTinyInteger('rating')->default(5); // 1-5 Bintang
            $table->text('content');
            $table->string('avatar')->nullable();
            $table->string('location')->nullable(); // Surabaya, Malang, Bali, Jakarta
            $table->integer('order')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('transformations');
    }
};

