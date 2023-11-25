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
        Schema::create('lecture_plan_lecture', function (Blueprint $table) {
            $table->unsignedBigInteger('lecture_plan_id');
            $table->unsignedBigInteger('lecture_id');

            $table->foreign('lecture_plan_id')->references('id')->on('lecture_plan');
            $table->foreign('lecture_id')->references('id')->on('lectures');

            $table->primary(['lecture_plan_id', 'lecture_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecture_plan_lecture');
    }
};
