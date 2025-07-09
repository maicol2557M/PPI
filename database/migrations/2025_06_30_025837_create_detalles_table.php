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
        Schema::create('detalles', function (Blueprint $table) {
            $table->bigIncrements('id_detalles');
            $table->unsignedBigInteger('id_responsables');
            $table->unsignedBigInteger('id_procesos');

            $table->foreign('id_responsables')->references('id_responsables')->on('responsables')->onDelete('cascade');
            $table->foreign('id_procesos')->references('id_procesos')->on('procesos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles');
    }
};
