<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entity\DadosClinicos;
use App\Http\Requests\DadosClinicosRequest;
use App\Models\Regras\DadosClinicosRegras;
use App\Models\Facade\DadosClinicosDB;
use Illuminate\Support\Facades\Http;

class DadosClinicosController extends Controller
{
    public function store(DadosClinicosRequest $request)
        {
            $validados = $request->validated();
            DadosClinicosRegras::cadastrarDadosClinicos($validados);
            return response()->json(['status' => 'Dados cadastrados com sucesso!'], 200);
    
        }
    
    public function edit($id)
        {
            return response()->json(DadosClinicosDB::editarDadoClinico($id), 200);

        }
    
    public function update(DadosClinicosRequest $request, $id)
        {
            $validados = $request->validated();
            
            return response()->json(DadosClinicosRegras::atualizarDadoClinico($id, $validados),200);
        }
    
    public function destroy($id)
        {
            $dado = DadosClinicos::find($id);
            $dado->delete();
            return response()->json(['status' => 'Dados Removidos com Sucesso!'],200);
        }
    public function teste()
    {
            $Url = Http::get('http://3.238.228.29:5000/homepage');
            return $Url;
    }
}
