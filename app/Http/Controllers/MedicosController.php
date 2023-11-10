<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entity\Medicos;

class MedicosController extends Controller
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
        $medico = new Medicos;
        $medico->cpf = $request->cpf;
        $medico->nome = $request->nome;
        $medico->dt_nascimento = $request->dt_nascimento;
        $medico->endereco = $request->endereco;
        $medico->telefone = $request->telefone;
        $medico->email = $request->email;
        $medico->genero = $request->genero;
        $medico->crm = $request->crm;
        $medico->uf_crm = $request->uf_crm;
        $medico->especialidade = $request->especialidade;
        $medico->status_medico = $request->status_medico;
        $medico->status_financeiro = $request->status_financeiro; 
        $medico->save();
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
