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
        Schema::create('users', function (Blueprint $table) {
            $table->id('ID_Usuario');
            $table->string('name', 50);
            $table->string('lastName', 50);
            $table->enum('gender', ['Masculino', 'Femenino', 'Otro']);
            $table->date('birthdate');
            $table->string('dni', 20)->unique();
            $table->string('email', 100)->unique();
            $table->string('address');
            $table->string('phone', 20)->nullable();
            $table->string('password');
            $table->boolean('asset')->default(true);
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('userRole_id')->nullable();
            $table->timestamp('creationDate')->useCurrent();
            $table->timestamp('lastConnection')->nullable();
            $table->timestamps();
        });

        // Schema::create('password_reset_tokens', function (Blueprint $table) {
        //     $table->string('email')->primary();
        //     $table->string('token');
        //     $table->timestamp('created_at')->nullable();
        // });

        // Schema::create('sessions', function (Blueprint $table) {
        //     $table->string('id')->primary();
        //     $table->foreignId('user_id')->nullable()->index();
        //     $table->string('ip_address', 45)->nullable();
        //     $table->text('user_agent')->nullable();
        //     $table->longText('payload');
        //     $table->integer('last_activity')->index();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        // Schema::dropIfExists('password_reset_tokens');
        // Schema::dropIfExists('sessions');
    }
};
