<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            // Información básica
            $table->string('ip_address', 45)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('user_agent', 512)->nullable();
            $table->enum('cookie_level', ['necessary', 'all'])->default('necessary');
            // Avanzado (nivel all)
            $table->string('referer', 512)->nullable();
            $table->string('utm_source', 100)->nullable();
            $table->string('utm_medium', 100)->nullable();
            $table->string('utm_campaign', 100)->nullable();
            $table->json('extra_data')->nullable(); // Extra data
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
