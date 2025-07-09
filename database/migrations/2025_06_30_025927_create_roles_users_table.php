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
        Schema::create('usuario_rol', function (Blueprint $table) {
            $table->bigInteger('id_cedula');
            $table->unsignedBigInteger('id_roles');

            $table->primary(['id_cedula', 'id_roles']);
            $table->foreign('id_cedula')->references('id_cedula')->on('usuarios')->onDelete('cascade');
            $table->foreign('id_roles')->references('id_roles')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_rol');
    }
};
