<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DadosClinicosRequest;
use App\Models\Regras\DadosClinicosRegras;

class DadosClinicosController extends Controller
{
    public function store(DadosClinicosRequest $request)
        {
            $validados = $request->validated();
            DadosClinicosRegras::cadastrarDadosClinicos($validados);
            return response()->json(['status' => 'Dados cadastrados com sucesso!'], 200);
    
        }
}
