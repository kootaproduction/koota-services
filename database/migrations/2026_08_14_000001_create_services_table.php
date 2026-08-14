<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->default('facility_care'); // facility_care or sustainability
            $table->string('badge_label')->default('Facility Care Services');
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->string('hero_cta_text')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('icon')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
