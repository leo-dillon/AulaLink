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
        Schema::create('student_guardian_data', function(Blueprint $table){
            // ID de los datos del tutor
            $table -> id('id_student_guardian_data');

            // ID de user_rol_school al que pertenece
            $table -> unsignedBigInteger('id_user_rol_school');
            $table -> foreign('id_user_rol_school') -> references('ID_UserRolEscuela') 
            -> on('usuario_rol_escuela') -> onDelete('cascade');

            // Vinculo del guardian con el estudiante
            $table -> enum('relationship_type', ['papá', 'mamá', 'tutor', 'abuelo', 'abuela', 'otro']);

            // Es el tutor legal
            $table -> boolean('is_legal_guardian');

            // Vive con el estudiante
            $table -> boolean('lives_with_student');

            // Es responsable economico del estudiante
            $table -> boolean('is_financial_responsable');

            // Es contacto de emergencía 
            $table -> boolean('is_emergency_contact');

            // Observaciones sobre el alumno
            $table -> string('notes');

            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_guardian_data');
    }
};
