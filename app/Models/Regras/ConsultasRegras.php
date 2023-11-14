<?php

namespace App\Models\Regras;

use App\Models\Entity\Consultas;


class ConsultasRegras {
    public static function cadastrarConsulta($validados) {
        
        $consulta = new Consultas;
        $consulta->paciente_id = $validados['paciente_id'];
        $consulta->medico_id = $validados['medico_id'];
        $consulta->data = $validados['data'];
        $consulta->hora = $validados['hora'];

        $consulta->save();
        
    }
    
    public static function atualizarConsulta($id, $validados){
        
        $consulta = Consultas::find($id);
        
        $consulta->paciente_id = $validados['paciente_id'];
        $consulta->medico_id = $validados['medico_id'];
        $consulta->data = $validados['data'];
        $consulta->hora = $validados['hora'];
        
        $consulta->save();
    }
}
