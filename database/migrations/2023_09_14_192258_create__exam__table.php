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
        Schema::create('exam', function (Blueprint $table) {
            $table->id();
            $table->string('course_name');
            $table->date('exam_date')->nullable();
            $table->time('start_time');
            $table->time('end_time');
            $table->text('present_students');
            $table->time('leave_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_exam_');
    }
};
