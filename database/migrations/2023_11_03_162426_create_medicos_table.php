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
        Schema::create('medicos', function (Blueprint $table) {
            $table->id();
            $table->string('cpf');
            $table->string('nome');
            $table->string('dt_nascimento');
            $table->string('endereco');
            $table->string('telefone');
            $table->string('email');
            $table->string('genero');
            $table->string('crm');
            $table->string('uf_crm');
            $table->string('especialidade');
            $table->integer('status_medico');
            $table->integer('status_financeiro');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicos');
    }
};
