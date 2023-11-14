<?php

namespace Tests\Feature;

use Tests\TestCase;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PacientesTest extends TestCase
{
    const url = 'http://localhost:8989/api';
     
    public function formularioPadrao($formulario)
    {
        $faker = Faker::create();

        return [
            'cpf' => $formulario['cpf'] ?? $faker->numerify('###########'),
            'nome' => $formulario['nome'] ?? fake()->name,
            'dt_nascimento' => $formulario['dt_nascimento'] ?? fake()->date,
            'endereco' => $formulario['endereco'] ?? fake()->address,
            'telefone' => $formulario['telefone'] ?? fake()->phoneNumber,
            'email' => $formulario['email'] ?? fake()->email,
            'responsavel_legal' => $formulario['responsavel_legal'] ?? fake()->name,
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
    
    public function buscarPacienteValido()
    {
        return DB::table('pacientes')->whereNotNull('id')->value('id');
    }

    /** @test */
     public function cadastrarPaciente(): void
    {
        $formulario=[];
        $response = $this->post(self::url.'/pacientes/cadastrar', $this->formularioPadrao($formulario));

        $response->assertStatus(200);
    }

    /** @test */
    public function editarPaciente(): void
    {
        $response = $this->get(self::url.'/pacientes/editar/'.$this->buscarPacienteValido());
        $response->assertStatus(200);
    }

    /** @test */
    public function atualizarPaciente(): void
    {
        $formulario=
        [
            'cpf' => '12345678910',
            'nome' => 'Teste',
            'dt_nascimento' => '2021-09-09',
            'endereco' => 'Rua Teste',
            'telefone' => '12345678910',
            'email' => 'teste@gmail.com',
            'responsavel_legal' => 'Teste Pai',
            'alergia' => true,
            'tipos_alergia' => 'alergia a farofa',
            'medicamentos' => true,
            'tipos_medicamentos' => 'medicamento para hipertensão',
            'cirurgias' => true,
            'historico_cirurgia' => 'cirurgia para retirada de cálculo renal',
            'tabagista' => true,
            'alcool' => true,
            'atividade_fisica' => true,
            'tipo_atividade_fisica' => 'pilates',
        ];
        $id = $this->buscarPacienteValido();
        $response = $this->put(self::url.'/pacientes/atualizar/'.$id, $this->formularioPadrao($formulario));
        $paciente = $this->get(self::url.'/pacientes/editar/'.$id);

        if($paciente->getContent() == $formulario)
        {
            $response->assertStatus(200);
        }
        else
        {
            $response->assertStatus(500);
        }
    }
    
    /** @test */
    public function cargaMaximaCadastroPaciente(): void
    {
        DB::beginTransaction();
    
        try {
            for ($i = 0; $i < 100; $i++) {
                $formulario = [];
                $response = $this->post(self::url.'/pacientes/cadastrar', $this->formularioPadrao($formulario));
            }
    
            // A verificação do status deve ocorrer dentro do bloco try-catch
            $response->assertStatus(429);
    
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            $this->fail($e->getMessage());
        }
    }
    
    /** @test */
    public function deletarPaciente()
    {
        $response = $this->delete(self::url.'/pacientes/deletar/'.$this->buscarPacienteValido());

        $response->assertStatus(200);
    }
}
