<?php

namespace App\Models\Regras;

use App\Models\Entity\Medicos;

class MedicosRegras {
    public static function cadastrarMedico($validados) {
        
        $medico = new Medicos;
        
        $medico->cpf = $validados['cpf'];
        $medico->nome = $validados['nome'];
        $medico->dt_nascimento = $validados['dt_nascimento'];
        $medico->endereco = $validados['endereco'];
        $medico->telefone = $validados['telefone'];
        $medico->email = $validados['email'];
        $medico->genero = $validados['genero'];
        $medico->crm = $validados['crm'];
        $medico->uf_crm = $validados['uf_crm'];
        $medico->especialidade = $validados['especialidade'];
        $medico->status_medico = $validados['status_medico'];
        $medico->status_financeiro = $validados['status_financeiro'];
        
        $medico->save();
    }
    
    public static function atualizarMedico($id, $validados){
        
        $medico = Medicos::find($id);
        
        $medico->cpf = $validados['cpf'];
        $medico->nome = $validados['nome'];
        $medico->dt_nascimento = $validados['dt_nascimento'];
        $medico->endereco = $validados['endereco'];
        $medico->telefone = $validados['telefone'];
        $medico->email = $validados['email'];
        $medico->genero = $validados['genero'];
        $medico->crm = $validados['crm'];
        $medico->uf_crm = $validados['uf_crm'];
        $medico->especialidade = $validados['especialidade'];
        $medico->status_medico = $validados['status_medico'];
        $medico->status_financeiro = $validados['status_financeiro;'];
        
        $medico->save();
    }
}
