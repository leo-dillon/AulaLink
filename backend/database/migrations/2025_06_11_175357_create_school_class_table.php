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
        Schema::create('school_class', function (Blueprint $table) {
            // PK de la clase
            $table->id('id_school_class');

            // FK de la asignatura a dar en la clase
            $table -> unsignedBigInteger('id_subject');
            $table -> foreign('id_subject') -> references('id_subject')
                -> on('subject') -> onDelete('cascade');

            // FK del profesor asignado a dar la clase;
            $table -> unsignedBigInteger('id_user_teacher');
            $table -> foreign('id_user_teacher') -> references('ID_USerRolEscuela')
                -> on('usuario_rol_escuela') -> onDelete('cascade');

            // FK del profesor Suplente
            $table -> unsignedBigInteger('id_user_substitute_teacher') -> nullable();
            $table -> foreign('id_user_substitute_teacher') -> references('ID_USerRolEscuela')
                -> on('usuario_rol_escuela') -> onDelete('cascade');

            // FK de la escuela que tiene la clase
            $table -> unsignedBigInteger('id_school');
            $table -> foreign('id_school') -> references('ID_Escuela')
                -> on('schools') -> onDelete('cascade');

            // Grado de la matería EJ 4 / 5 / 6
            $table -> string('grade');

            // Divición de la matería EJ A, B, C
            $table -> string('section');

            // Año academico
            $table -> date('academic_year');

            // Turno de la materia
            $table -> enum('shift', ['Mañana', 'Tarde', 'Noche']);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('School_class');
    }
};
