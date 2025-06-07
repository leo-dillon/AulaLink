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
        Schema::create('datos_roles', function (Blueprint $table) {
        $table->id('ID_DatosRol');
        $table->unsignedBigInteger('id_role');
        $table->json('Datos')->nullable(); // Datos específicos del rol (legajo, turno, etc.)
        $table->timestamps();

        $table->foreign('id_role')->references('id_role')->on('role')->onDelete('cascade');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_roles');
    }
};
