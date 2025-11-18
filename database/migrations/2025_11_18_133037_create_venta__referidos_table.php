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
        Schema::create('venta__referidos', function (Blueprint $table) {
            $table->id();
            $table->string('cliente');
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('referido_id')->nullable();
            $table->integer('monto');
            $table->integer('comision');
            $table->enum('estado_pago', ['pendiente', 'pagado'])->default('pendiente');
            $table->timestamps();

            $table->foreign('referido_id')->references('id')->on('referidos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta__referidos');
    }
};
