<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->string('service_type'); // Cleaning Service, Waste Management, Handyman, Repair & Maint., Renovation, IPAL Systems
            $table->string('name');
            $table->string('whatsapp');
            $table->string('email');
            $table->string('location')->default('Surabaya');
            $table->string('property_type')->default('Rumah Tinggal');
            $table->text('notes')->nullable();
            $table->string('photo_path')->nullable();
            $table->string('status')->default('Pending'); // Pending, Diproses, Selesai
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
