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
        Schema::create('usuario_rol_escuela', function (Blueprint $table) {
            $table->id('ID_UserRolEscuela');
            $table->unsignedBigInteger('Usuario_ID');
            $table->unsignedBigInteger('Escuela_ID');
            $table->unsignedBigInteger('id_role');
            $table->timestamps();
            
            // clave foranea
            $table->foreign('Usuario_ID')->references('ID_Usuario')->on('users')->onDelete('cascade');
            $table->foreign('Escuela_ID')->references('ID_Escuela')->on('schools')->onDelete('cascade');
            $table->foreign('id_role')->references('id_role')->on('role')->onDelete('cascade');
            $table->unique(['Usuario_ID', 'Escuela_ID', 'id_role']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_rol_escuela');
    }
};
