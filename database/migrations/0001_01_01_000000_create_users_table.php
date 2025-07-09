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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigInteger('id_cedula')->primary();
            $table->string('nombre', 100)->nullable();
            $table->string('direccion_domicilio', 100)->nullable();
            $table->string('numero_telefonico', 20)->nullable();
            $table->string('correo_electronico', 100)->nullable();
            $table->string('tipo_de_proceso', 100)->nullable();
            $table->string('detalle_de_proceso', 255)->nullable();
            $table->string('juez', 100)->nullable();
            $table->string('secretario', 100)->nullable();
            $table->bigInteger('num_proceso')->nullable();
            $table->date('fecha_inicio_proceso')->nullable();
            $table->date('fecha_vencimiento_proceso')->nullable();
            $table->string('estado_proceso', 100)->nullable();
            $table->string('ultima_actividad_proceso', 100)->nullable();
            $table->string('proxima_actividad', 100)->nullable();
            $table->date('fecha_maximo_actividad')->nullable();
            $table->string('audiencias', 100)->nullable();
            $table->date('fecha_audiencia')->nullable();
            $table->string('link_audiencia', 255)->nullable();
            $table->string('datos_audiencia', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
