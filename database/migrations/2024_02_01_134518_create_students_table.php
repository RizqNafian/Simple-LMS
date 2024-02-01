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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
                $table->string('student_name');
                $table->unsignedBigInteger('class_room_id');
                $table->unsignedBigInteger('course_id');
                $table->foreign('class_room_id')->references('id')->on('class_rooms')->onDelete('cascade');
                $table->foreign('course_id')->references('id')->on('class_rooms')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
