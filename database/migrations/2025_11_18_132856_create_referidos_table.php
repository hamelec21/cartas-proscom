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
        Schema::create('referidos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('alias')->unique();
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();
            $table->string('banco')->nullable();
            $table->string('tipo_cuenta')->nullable();
            $table->string('numero_cuenta')->nullable();
            $table->string('rut')->nullable();
            $table->string('link_generado')->nullable();
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referidos');
    }
};
