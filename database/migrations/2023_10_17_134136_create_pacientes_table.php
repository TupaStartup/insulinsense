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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('cpf');
            $table->string('nome');
            $table->string('dt_nascimento');
            $table->string('endereco');
            $table->string('telefone');
            $table->string('email');
            $table->string('responsavel_legal')->nullable();
            $table->boolean('alergia');
            $table->string('tipos_alergia')->nullable();
            $table->boolean('medicamentos');
            $table->string('tipos_medicamentos')->nullable();
            $table->boolean('cirurgias');
            $table->string('historico_cirurgia')->nullable();
            $table->boolean('tabagista');
            $table->boolean('alcool');
            $table->boolean('atividade_fisica');
            $table->string('tipo_atividade_fisica')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
