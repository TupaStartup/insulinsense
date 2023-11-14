<?php

namespace App\Http\Controllers;


use App\Models\Entity\Consultas;
use App\Http\Requests\ConsultasRequest;
use App\Models\Regras\ConsultasRegras;


class ConsultasController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(ConsultasRequest $request)
    {
        $validados = $request->validated();
        ConsultasRegras::cadastrarConsulta($validados);
        return response()->json(['status' => 'Médico cadastrado com sucesso!'], 200);

    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        return Consultas::find($id);
    }

    public function update(ConsultasRequest $request, string $id)
    {
        $validados = $request->validated();
        ConsultasRegras::atualizarConsulta($id, $validados);
        return response()->json(['status' => 'Médico atualizado com sucesso!'], 200);
    }

    public function destroy(string $id)
    {
        $paciente = Consultas::find($id);
        $paciente->delete();    
    }
}
