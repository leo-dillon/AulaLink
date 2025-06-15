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
            
            $table -> json('emails')->nullable(); 
                        
            $table -> enum('level', ['Inicial', 'Primario', 'Secundario','Terciario']); 
            
            $table -> enum('type', ['Privado', 'Publico', 'subvencionada']);

            $table -> unsignedBigInteger('id_user');
            $table -> foreign('id_user') -> references('id_user')
                -> on('users') -> onDelete('cascade');
            
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
