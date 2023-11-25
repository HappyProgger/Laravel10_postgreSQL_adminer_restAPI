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
        Schema::create('classes_lectures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classes_id')->references('id')->on('classes');
            $table->foreignId('lecture_id')->references('id')->on('lectures');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes_lectures');
    }
};
