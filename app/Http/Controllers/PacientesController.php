<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entity\Pacientes;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $paciente = new Pacientes;
        $paciente->cpf = $request->cpf;
        $paciente->nome = $request->nome;
        $paciente->dt_nascimento = $request->dt_nascimento;
        $paciente->endereco = $request->endereco;
        $paciente->telefone = $request->telefone;
        $paciente->email = $request->email;
        $paciente->responsavel_legal = $request->responsavel_legal;
        $paciente->alergia = $request->alergia;
        $paciente->tipos_alergia = $request->tipos_alergia;
        $paciente->medicamentos = $request->medicamentos;
        $paciente->tipos_medicamentos = $request->tipos_medicamentos;
        $paciente->cirurgias = $request->cirurgias;
        $paciente->historico_cirurgia = $request->historico_cirurgia;
        $paciente->tabagista = $request->tabagista;
        $paciente->alcool = $request->alcool;
        $paciente->atividade_fisica = $request->atividade_fisica;
        $paciente->tipo_atividade_fisica = $request->tipo_atividade_fisica;
        $paciente->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
