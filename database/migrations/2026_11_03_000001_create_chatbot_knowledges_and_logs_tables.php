<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chatbot_knowledges', function (Blueprint $table) {
            $table->id();
            $table->string('category')->default('Umum'); // Home Cleaning, Perbaikan Rumah, Pengangkutan Sampah, Biaya & Pembayaran, Wilayah & Jadwal, Umum & Garansi
            $table->string('question');
            $table->text('keywords')->nullable(); // Comma-separated or space-separated keywords
            $table->text('answer');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('hit_count')->default(0);
            $table->timestamps();
        });

        Schema::create('chatbot_logs', function (Blueprint $table) {
            $table->id();
            $table->text('user_message');
            $table->text('bot_reply')->nullable();
            $table->string('matched_source')->nullable(); // knowledge_base, services_db, faqs_db, fallback
            $table->foreignId('chatbot_knowledge_id')->nullable()->constrained('chatbot_knowledges')->nullOnDelete();
            $table->boolean('is_resolved')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chatbot_logs');
        Schema::dropIfExists('chatbot_knowledges');
    }
};

