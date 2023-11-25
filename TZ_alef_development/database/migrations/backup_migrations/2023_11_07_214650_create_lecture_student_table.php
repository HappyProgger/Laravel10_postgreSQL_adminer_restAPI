<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('lecture_student', function (Blueprint $table) {
            $table->unsignedBigInteger('lecture_id');
            $table->unsignedBigInteger('student_id');

            $table->foreign('lecture_id')->references('id')->on('lectures')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

            $table->primary(['lecture_id', 'student_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('lecture_student');
    }
};
