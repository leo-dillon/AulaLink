<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration 
{
    public function up(): void {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id('ID_Pago');
            $table->unsignedBigInteger('usuario_id'); // Este es el ID_Usuario
            $table->decimal('monto', 8, 2);
            $table->enum('metodo_pago', ['Transferencia', 'Tarjeta']);
            $table->string('cbu')->nullable(); // Solo si es Transferencia
            $table->string('titular')->nullable(); // Solo si es Tarjeta
            $table->string('numero_tarjeta')->nullable(); // Solo si es Tarjeta
            $table->string('dni')->nullable(); // Solo si es Tarjeta
            $table->string('vencimiento')->nullable(); // Solo si es Tarjeta
            $table->timestamp('fecha_pago')->useCurrent();
            $table->timestamps();

            // 💡 Corregimos el nombre de la columna en users:
            $table->foreign('usuario_id')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('pagos');
    }
};




