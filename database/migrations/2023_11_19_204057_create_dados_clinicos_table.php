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
            $table->decimal('medida_cintura')->nullable();
            $table->decimal('dose_insulina')->nullable();
            $table->decimal('adiponectina')->nullable();
            $table->decimal('triglicerideos')->nullable();
            $table->decimal('pressao_arterial')->nullable();
            $table->decimal('glicose_jejum')->nullable();
            $table->decimal('hba1c')->nullable();
            $table->decimal('peso')->nullable();
            $table->decimal('unidade_diaria_insulina')->nullable();
            $table->decimal('sensibilidade_insulinica')->nullable();
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
