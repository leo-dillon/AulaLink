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
        Schema::create('student_guardian_student', function(Blueprint $table){
            $table -> id('id_student_guardian_student');

            // FK de estudent
            $table -> unsignedBigInteger('id_student_data');
            $table -> foreign('id_student_data') -> references('id_student_data') 
                -> on('student_data') -> onDelete('cascade');

            // FK de tutor
            $table -> unsignedBigInteger('id_student_guardian_data'); 
            $table -> foreign('id_student_guardian_data') -> references('id_student_guardian_data') 
                -> on('student_guardian_data') -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_guardian_student');
    }
};
