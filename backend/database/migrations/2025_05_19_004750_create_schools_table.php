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
        Schema::create('schools', function (Blueprint $table) {
            $table -> id('ID_Escuela'); // ID autoincremental
            
            $table -> string('Nombre');
            
            $table -> string('CUE')->unique();
            
            $table -> string('Direccion');
            
            $table -> string('Localidad');
            
            $table -> string('Provincia');
            
            $table -> string('Telefonos')->nullable(); // Puedes usar JSON si hay múltiples
            
            $table -> string('Emails')->nullable(); 
            
            $table -> timestamp('Fecha_Creacion')->useCurrent();
            
            $table -> enum('Nivel', ['Inicial', 'Primario', 'Secundario','Terciario']); 
            
            $table -> enum('Tipo', ['Privado', 'Publico', 'subvencionada']);
            
            $table -> string('Usuario_ADM')->nullable(); // podría ser una FK si hay tabla usuarios
            
            $table -> boolean('Activo')->default(true);
            
            $table -> timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
