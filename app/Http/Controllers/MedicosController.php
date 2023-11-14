<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entity\Medicos;
use App\Http\Requests\MedicosRequest;
use App\Models\Regras\MedicosRegras;

class MedicosController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(MedicosRequest $request)
    {
        $validados = $request->validated();
        MedicosRegras::cadastrarMedico($validados);
        return response()->json(['status' => 'Médico cadastrado com sucesso!'], 200);

    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        return Medicos::find($id);
    }

    public function update(MedicosRequest $request, string $id)
    {
        $validados = $request->validated();
        MedicosRegras::atualizarMedico($id, $validados);
        return response()->json(['status' => 'Médico atualizado com sucesso!'], 200);
    }

    public function destroy(string $id)
    {
        $paciente = Medicos::find($id);
        $paciente->delete();    
    }
}
