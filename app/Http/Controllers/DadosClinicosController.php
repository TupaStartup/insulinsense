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

        public function calculo(DadosClinicosRequest $request)
    {
            $dados = $request->validated();
            match ($request->route()->getName()){
                't1d' => $url = Http::post('http://calculo:5001/T1D', json_encode($dados)),
                't1d-nonfasting' => $url = Http::post('http://calculo:5001/T1D-nonfasting', json_encode($dados)),
                't1d-exAdiponectina' => $url = Http::post('http://calculo:5001/T1D-exAdiponectina', json_encode($dados)),
                'nonDiabetic' => $url = Http::post('http://calculo:5001/nonDiabetic', json_encode($dados)),
                'nonDiabetic-nonfasting' => $url = Http::post('http://calculo:5001/nonDiabetic-nonfasting', json_encode($dados)),
                'nonDiabetic-exAdiponectina' => $url = Http::post('http://calculo:5001/nonDiabetic-exAdiponectina', json_encode($dados))
            };

            return $url;
    }
}
