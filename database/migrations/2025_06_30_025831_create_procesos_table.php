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
        Schema::create('procesos', function (Blueprint $table) {
            $table->bigIncrements('id_procesos');
            $table->string('control_activos', 100)->nullable();
            $table->date('fecha_adquisicion')->nullable();
            $table->bigInteger('depreciacion')->nullable();
            $table->date('fecha_ultimo_mantenimiento')->nullable();
            $table->date('fecha_proximo_mantenimiento')->nullable();
            $table->string('proveedor_mantenimiento', 100)->nullable();
            $table->bigInteger('valor_mantenimiento')->nullable();
            $table->unsignedBigInteger('id_tipos');
            $table->bigInteger('id_cedula');

            $table->foreign('id_tipos')->references('id_tipos')->on('tipos')->onDelete('cascade');
            $table->foreign('id_cedula')->references('id_cedula')->on('usuarios')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procesos');
    }
};
