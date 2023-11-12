<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entity\Pacientes;
use App\Http\Requests\PacientesRequest;

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
    public function store(PacientesRequest $request)
    {
        $validados = $request->validated();
        
        $paciente = new Pacientes;
        $paciente->cpf = $validados['cpf'];
        $paciente->nome = $validados['nome'];
        $paciente->dt_nascimento = $validados['dt_nascimento'];
        $paciente->endereco = $validados['endereco'];
        $paciente->telefone = $validados['telefone'];
        $paciente->email = $validados['email'];
        $paciente->responsavel_legal = $validados['responsavel_legal'];
        $paciente->alergia = $validados['alergia'];
        $paciente->tipos_alergia = $validados['tipos_alergia'];
        $paciente->medicamentos = $validados['medicamentos'];
        $paciente->tipos_medicamentos = $validados['tipos_medicamentos'];
        $paciente->cirurgias = $validados['cirurgias'];
        $paciente->historico_cirurgia = $validados['historico_cirurgia'];
        $paciente->tabagista = $validados['tabagista'];
        $paciente->alcool = $validados['alcool'];
        $paciente->atividade_fisica = $validados['atividade_fisica'];
        $paciente->tipo_atividade_fisica = $validados['tipo_atividade_fisica'];
        $paciente->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return Pacientes::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PacientesRequest $request, string $id)
    {
        $validados = $request->valitaded();
        $paciente = Pacientes::find($id);
        
        $paciente->cpf = $validados['cpf'];
        $paciente->nome = $validados['nome'];
        $paciente->dt_nascimento = $validados['dt_nascimento'];
        $paciente->endereco = $validados['endereco'];
        $paciente->telefone = $validados['telefone'];
        $paciente->email = $validados['email'];
        $paciente->responsavel_legal = $validados['responsavel_legal'];
        $paciente->alergia = $validados['alergia'];
        $paciente->tipos_alergia = $validados['tipos_alergia'];
        $paciente->medicamentos = $validados['medicamentos'];
        $paciente->tipos_medicamentos = $validados['tipos_medicamentos'];
        $paciente->cirurgias = $validados['cirurgias'];
        $paciente->historico_cirurgia = $validados['historico_cirurgia'];
        $paciente->tabagista = $validados['tabagista'];
        $paciente->alcool = $validados['alcool'];
        $paciente->atividade_fisica = $validados['atividade_fisica'];
        $paciente->tipo_atividade_fisica = $validados['tipo_atividade_fisica'];
        
        $paciente->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
