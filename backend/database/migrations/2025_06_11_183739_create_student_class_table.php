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
        Schema::create('student_class', function (Blueprint $table) {
            // PK de la tabla relación entre estudiantes y clases
            $table->id('id_student_class');

            // FK de la tabla estudiantes
            $table -> unsignedBigInteger('id_student_data');
            $table -> foreign('id_student_data') -> references('id_student_data')
                -> on('student_data') -> onDelete('cascade');
            
            // FK de la tabla clases
            $table -> unsignedBigInteger('id_school_class');
            $table -> foreign('id_school_class') -> references('id_school_class')
                -> on('school_class') -> onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_class');
    }
};
