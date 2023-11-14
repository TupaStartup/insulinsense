<?php

namespace App\Models\Regras;

use App\Models\Entity\Pacientes;

class PacientesRegras {
    public static function cadastrarPaciente($validados) {
        
        $paciente = new Pacientes;
        
        $paciente->cpf = $validados['cpf'];
        $paciente->nome = $validados['nome'];
        $paciente->dt_nascimento = $validados['dt_nascimento'];
        $paciente->endereco = $validados['endereco'];
        $paciente->telefone = $validados['telefone'];
        $paciente->email = $validados['email'];
        $paciente->responsavel_legal = $validados['responsavel_legal'];
        $paciente->alergia = $validados['alergia'];
        $paciente->tipos_alergia = $validados['tipos_alergia'];
        $paciente->medicamentos = $validados['medicamentos'];
        $paciente->tipos_medicamentos = $validados['tipos_medicamentos'];
        $paciente->cirurgias = $validados['cirurgias'];
        $paciente->historico_cirurgia = $validados['historico_cirurgia'];
        $paciente->tabagista = $validados['tabagista'];
        $paciente->alcool = $validados['alcool'];
        $paciente->atividade_fisica = $validados['atividade_fisica'];
        $paciente->tipo_atividade_fisica = $validados['tipo_atividade_fisica'];
        
        $paciente->save();
    }
    public static function atualizarPaciente($id, $validados){
        
        $paciente = Pacientes::find($id);
        
        $paciente->cpf = $validados['cpf'];
        $paciente->nome = $validados['nome'];
        $paciente->dt_nascimento = $validados['dt_nascimento'];
        $paciente->endereco = $validados['endereco'];
        $paciente->telefone = $validados['telefone'];
        $paciente->email = $validados['email'];
        $paciente->responsavel_legal = $validados['responsavel_legal'];
        $paciente->alergia = $validados['alergia'];
        $paciente->tipos_alergia = $validados['tipos_alergia'];
        $paciente->medicamentos = $validados['medicamentos'];
        $paciente->tipos_medicamentos = $validados['tipos_medicamentos'];
        $paciente->cirurgias = $validados['cirurgias'];
        $paciente->historico_cirurgia = $validados['historico_cirurgia'];
        $paciente->tabagista = $validados['tabagista'];
        $paciente->alcool = $validados['alcool'];
        $paciente->atividade_fisica = $validados['atividade_fisica'];
        $paciente->tipo_atividade_fisica = $validados['tipo_atividade_fisica'];
        
        $paciente->save();
    }
}
