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
        Schema::create('dados_clinicos', function (Blueprint $table) {
            $table->id();
            $table->integer('consulta_id');
            $table->decimal('medida_cintura');
            $table->decimal('dose_insulina');
            $table->decimal('adiponectina');
            $table->decimal('triglicerideos');
            $table->decimal('pressao_arterial');
            $table->decimal('sensibilidade_insulinica');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dados_clinicos');
    }
};
