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
        Schema::create('teacher_data', function (Blueprint $table) {
            // ID del teacher
            $table -> id('id_teacher_data');

            // FK de user_rol_school
            $table -> unsignedBigInteger('id_user_rol_school');
            $table -> foreign('id_user_rol_school') -> references('id_user_rol_school')
                -> on('user_rol_school') -> onDelete('cascade');

            // CUIL de Teacher
            $table -> string('cuil') -> unique();

            // Número de legajo 
            $table -> string('file_number') -> unique();

            // Título del profesor 
            $table -> string('degree_title') -> nullable();

            // fecha de ingreso
            $table -> date('hire_date');

            $table -> text('notes');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_data');
    }
};
