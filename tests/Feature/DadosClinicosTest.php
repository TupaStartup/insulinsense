<?php

namespace Tests\Feature;

use Tests\TestCase;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DadosClinicosTest extends TestCase
{
    const url = 'http://localhost:8989/api';
     
    public function formularioPadrao($formulario)
    {
        $faker = Faker::create();

        return [
            'consulta_id' => $formulario['consulta_id'] ?? $faker->numberBetween(1,6000),
            'medida_cintura' => $formulario['medida_cintura'] ?? $faker->numberBetween(50, 150),
            'peso' => $formulario['peso'] ?? $faker->numberBetween(40, 150),
            'hba1c' => $formulario['hba1c'] ?? $faker->numberBetween(0, 100),
            'glicose_jejum' => $formulario['glicose_jejum'] ?? $faker->numberBetween(4, 12),
            'pressao_arterial' => $formulario['pressao_arterial'] ?? $faker->numberBetween(50, 200),
            'triglicerideos' => $formulario['triglicerideos'] ?? $faker->numberBetween(30, 750),
            'adiponectina' => $formulario['adiponectina'] ?? $faker->numberBetween(5, 8,5),
            // 'unidade_diaria_insulina' => $formulario['unidade_diaria_insulina'] ?? $faker->numberBetween(1, 100),
            'dose_insulina' => $formulario['dose_insulina'] ?? $formulario['unidade_diaria_insulina'] / $formulario['peso']
        ];
    }

    /** @test */
     public function cadastrarDadosClinicos()
    {
        $formulario=[];
        $response = $this->post(self::url.'/dados-clinicos/cadastrar', $this->formularioPadrao($formulario));

        $response->assertStatus(200);
    }
    
    public function buscarDadosClinicos()
    {
        return DB::table('dados_clinicos')->whereNotNull('id')->value('id');
    }

    /** @test */
    public function editarDadosClinicos(): void
    {
        $response = $this->get(self::url.'/dados-clinicos/editar/'.$this->buscarDadosClinicos());
        $response->assertStatus(200);
    }

    // /** @test */
    // public function atualizarDadosClinicos(): void
    // {
    //     $formulario=
    //     [
    //         'cpf' => '12312332112',
    //         'nome' => 'Chucrute da Silva',
    //         'dt_nascimento' => 22/10/1989,
    //         'endereco' => 'Trav. Humaitá, 123, Belém-PA',
    //         'telefone' => '8989-8989',
    //         'email' => 'drchucrutes@gmail.com',
    //         'genero' => 'M',
    //         'crm' => '668978',
    //         'uf_crm' => 'PA',
    //         'especialidade' => 'Endocrinologista',
    //         'status_medico' => 2,
    //         'status_financeiro' => 2,
    //     ];
    //     $id = $this->buscarMedicoValido();
    //     $response = $this->put(self::url.'/dados-clinicos/atualizar/'.$id, $this->formularioPadrao($formulario));
    //     $medico = $this->get(self::url.'/dados-clinicos/editar/'.$id);
        
    //     // dump($id);
    //     // dump($formulario);
    //     // dump($medico->getContent());

    //     if($medico->getContent() == $formulario)
    //     {
    //         $response->assertStatus(200);
    //     }
    //     else
    //     {
    //         $response->assertStatus(500);
    //     }
    // }
    
    /** @test */
    public function cargaMaximaCadastroDadosClinicos(): void
    {
        DB::beginTransaction();
    
        try {
            for ($i = 0; $i < 100; $i++) {
                $formulario = [];
                $response = $this->post(self::url.'/dados-clinicos/cadastrar', $this->formularioPadrao($formulario));
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
    public function deletarDadosClinicos()
    {
        $response = $this->delete(self::url.'/dados-clinicos/deletar/'.$this->buscarDadosClinicos());

        $response->assertStatus(200);
    }
}
