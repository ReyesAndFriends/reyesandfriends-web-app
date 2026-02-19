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
        Schema::create('contact_form_replies', function (Blueprint $table) {
            $table->id();
            $table->text('message');
            $table->string('responder_name');
            $table->string('responder_email');
            $table->unsignedBigInteger('contact_form_id');
            $table->foreign('contact_form_id')->references('id')->on('contact_forms')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_form_replies');
    }
};
