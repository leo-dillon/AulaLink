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
            $table -> id('id_school'); // ID autoincremental
            
            $table -> string('name');
            
            $table -> string('CUE')->unique();
            
            $table -> string('address');
            
            $table -> string('city');
            
            $table -> string('province');
            
            $table -> json('phones')->nullable();
            
            $table -> json('email')->nullable(); 
                        
            $table -> enum('level', ['Inicial', 'Primario', 'Secundario','Terciario']); 
            
            $table -> enum('type', ['Privado', 'Publico', 'subvencionada']);
            
            // Agregamos el campo director en
            // backend\database\migrations\2025_06_12_032218_add_headmaster_foreign_key_to_schools_table.php
            // Realizamos una migración parcial debido a la relación circular de User_rol_school y school

            $table -> boolean('active')->default(true);
            
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
