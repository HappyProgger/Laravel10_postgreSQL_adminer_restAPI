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
        Schema::create('students_lectures', function (Blueprint $table) {
            $table->id();
//            $table->unsignedBigInteger('student_id');
//            $table->unsignedBigInteger('lecture_id');
            $table->foreignId('student_id')->references('id')->on('students');
            $table->foreignId('lecture_id')->references('id')->on('lectures');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students_lectures');
    }
};
