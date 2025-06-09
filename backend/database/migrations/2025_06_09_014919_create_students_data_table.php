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
        Schema::create('student_data', function(Blueprint $table){
            // ID de los datos del estudiante
            $table -> id('id_student_data');

            // ID de user_rol_school al que pertenece
            $table -> unsignedBigInteger('id_user_rol_school');
            $table -> foreign('id_user_rol_school') -> references('ID_UserRolEscuela') 
                -> on('usuario_rol_escuela') -> onDelete('cascade');
            
            // Legajo del alumno
            $table -> string('enrollment_number');
            
            // Año que esta cursando
            $table -> string('current_year');

            // Horario en el que cursa
            $table -> enum('shift', ['mañana', 'tarde', 'noche']);
            
            // Condición academica del estudiante
            $table -> enum('academic_status', ['regular', 'libre', 'egresado', 'expulsado', 'condicional']);
            
            // Fecha de ingreso del estudiante
            $table -> date('enrollment_date');

            // Tipo de alumno
            $table -> enum('student_type', ['nuevo', 'reincorporado', 'transladado', 'egresado']);
            
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_data');
    }
};
