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
        Schema::table('referidos', function (Blueprint $table) {

            $table->boolean('acepta_terminos')->default(false)->after('rut');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('referidos', function (Blueprint $table) {
            $table->dropColumn('acepta_terminos');
        });
    }
};
