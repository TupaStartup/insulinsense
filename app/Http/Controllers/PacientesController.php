<?php

namespace App\Http\Controllers;

use App\Models\Entity\Pacientes;
use App\Http\Requests\PacientesRequest;
use App\Models\Regras\PacientesRegras;

class PacientesController extends Controller
{
    public function index()
    {
        //
    }

    public function store(PacientesRequest $request)
    {
        $validados = $request->validated();
        PacientesRegras::cadastrarPaciente($validados);
        return response()->json(['status' => 'Paciente cadastrado com sucesso!'], 200);
    }

    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        return Pacientes::find($id);
    }

    public function update(PacientesRequest $request, string $id)
    {
        $validados = $request->validated();
        PacientesRegras::atualizarPaciente($id, $validados);
        return response()->json(['status' => 'Paciente atualizado com sucesso!'], 200);

    }

    public function destroy(string $id)
    {
        $paciente = Pacientes::find($id);
        $paciente->delete();
    }
}
