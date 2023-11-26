<?php

namespace App\Models\Regras;

use App\Models\Entity\Consultas;
use App\Models\Entity\DadosClinicos;


class DadosClinicosRegras {
    
    public static function cadastrarDadosClinicos($validados) {
        
        $dado = new DadosClinicos;
        $dado->consulta_id = $validados['consulta_id'];
        $dado->medida_cintura = $validados['medida_cintura'];
        $dado->peso = $validados['peso'];
        $dado->hba1c = $validados['hba1c'];
        $dado->glicose_jejum = $validados['glicose_jejum'];
        $dado->pressao_arterial = $validados['pressao_arterial'];
        $dado->triglicerideos = $validados['triglicerideos'];
        $dado->adiponectina = $validados['adiponectina'];
        $dado->unidade_diaria_insulina = $validados['unidade_diaria_insulina'];
        $dado->dose_insulina = $validados['dose_insulina'];

        $dado->save();
        
    }
    
    public static function atualizarConsulta($id, $validados){
        
        $dado = DadosClinicos::find($id);
        
        $dado->consulta_id = $validados['consulta_id'];
        $dado->medida_cintura = $validados['medida_cintura'];
        $dado->peso = $validados['peso'];
        $dado->hba1c = $validados['hba1c'];
        $dado->glicose_jejum = $validados['glicose_jejum'];
        $dado->pressao_arterial = $validados['pressao_arterial'];
        $dado->triglicerideos = $validados['triglicerideos'];
        $dado->adiponectina = $validados['adiponectina'];
        $dado->unidade_diaria_insulina = $validados['unidade_diaria_insulina'];
        $dado->dose_insulina = $validados['dose_insulina'];
        
        $dado->save();
    }
}
