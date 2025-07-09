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
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id_roles');
            $table->string('nombre', 50);
            $table->string('descripcion', 100)->nullable();
            $table->boolean('permisos')->default(false);
            $table->string('estado', 50)->nullable();
            $table->boolean('modificar')->default(false);
            $table->boolean('crear')->default(false);
            $table->boolean('restringir')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
