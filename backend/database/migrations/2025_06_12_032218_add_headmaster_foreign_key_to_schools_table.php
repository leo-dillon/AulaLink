<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('schools', function (Blueprint $table) {
            // Agrega la FK a user_rol_school
            $table->unsignedBigInteger('id_headMaster')->nullable()->after('type');
            $table->foreign('id_headMaster')
                ->references('id_user_rol_school')
                ->on('user_rol_school')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('schools', function (Blueprint $table) {
            $table->dropForeign(['id_headMaster']);
            $table->dropColumn('id_headMaster');
        });
    }
};

