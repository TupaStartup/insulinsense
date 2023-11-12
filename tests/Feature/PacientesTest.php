<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PacientesTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    const endereco = 'http://localhost:8000/api';
     
    public function formularioPadrao($formulario)
    {
        return [
            'cpf' => $formulario['cpf'] ?? '12345678901',
            'nome' => $formulario['nome'] ?? 'Nome do Paciente',
            'dt_nascimento' => $formulario['dt_nascimento'] ?? '2000-01-01',
            'endereco' => $formulario['endereco'] ?? 'Rua do Paciente',
            'telefone' => $formulario['telefone'] ?? '12345678901',
            'email' => $formulario['email'] ?? fake()->email,
            'responsavel_legal' => $formulario['responsavel_legal'] ?? 'Pai responsável',
            'alergia' => $formulario['alergia'] ?? false,
            'tipos_alergia' => $formulario['tipos_alergia'] ?? null,
            'medicamentos' => $formulario['medicamentos'] ?? false,
            'tipos_medicamentos' => $formulario['tipos_medicamentos'] ?? null,
            'cirurgias' => $formulario['cirurgias'] ?? false,
            'historico_cirurgia' => $formulario['historico_cirurgia'] ?? null,
            'tabagista' => $formulario['tabagista'] ?? false,
            'alcool' => $formulario['alcool'] ?? false,
            'atividade_fisica' => $formulario['atividade_fisica'] ?? false,
            'tipo_atividade_fisica' => $formulario['tipo_atividade_fisica'] ?? null,
        ];
    }
    
    /** @test */

     public function salvarNoBanco(): void
    {
        $formulario=[];
        $response = $this->post(self::endereco.'/pacientes/cadastrar', $this->formularioPadrao($formulario));

        $response->assertStatus(200);
    }

    /** @test */

    public function editar(): void
    {
        $formulario=[];
        $response = $this->get(self::endereco.'/pacientes/editar/1', $this->formularioPadrao($formulario));

        dump($response->getContent());
        $response->assertStatus(200);
    }
}
