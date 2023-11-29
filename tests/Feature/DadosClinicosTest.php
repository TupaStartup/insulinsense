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
            'unidade_diaria_insulina' => $formulario['unidade_diaria_insulina'] ?? $faker->numberBetween(1, 100),
            'peso' => $formulario['peso'] ?? $faker->numberBetween(40, 180),
            'dose_insulina' => $formulario['dose_insulina'] ?? $formulario['unidade_diaria_insulina'] / $formulario['peso'],
            'sensibilidade_insulinica' => $formulario['sensibilidade_insulinica'] ?? 0
        ];
    }

    /** @test */
     public function cadastrarDadosClinicos()
    {
        $formulario=['unidade_diaria_insulina' => 7,
                     'peso' => 80];
        $response = $this->post(self::url.'/dados-clinicos/cadastrar', $this->formularioPadrao($formulario));

        $response->assertStatus(200);
    }
    
    public function buscarDadosClinicos()
    {
        return DB::table('dados_clinicos')->whereNotNull('id')->value('id');
    }

    /** @test */
    public function editarDadosClinicos()
    {
        $response = $this->get(self::url.'/dados-clinicos/editar/'.$this->buscarDadosClinicos());
        dump(json_decode($response->getContent(), true));
        $response->assertStatus(200);
    }

     /** @test */
     public function atualizarDadosClinicos(): void
     {
         $formulario=
         [
            'medida_cintura' => 0,
            'peso' => 0,
            'hba1c' => 11,
            'glicose_jejum' =>11,
            'pressao_arterial' => 11,
            'triglicerideos' => 11,
            'adiponectina' => 11,
            'unidade_diaria_insulina' => 11,
            'dose_insulina' => 11,
            'sensibilidade_insulinica' => 11
         ];
         
         $id = 1;
         $dado_editar = $this->get(self::url.'/dados-clinicos/editar/'.$id);
         $response = $this->put(self::url.'/dados-clinicos/atualizar/'.$id, $this->formularioPadrao($formulario));
        
         
         dump(json_decode($dado_editar->getContent(), true));
         dump($formulario);
         $response->assertStatus(200);
    }
    
    /** @test */
    public function cadastroVariosDadosClinicos(): void
    {
        DB::beginTransaction();
    
        try {
            for ($i = 0; $i < 40; $i++) {
               $formulario=
               [
                    'unidade_diaria_insulina' => 7,
                    'peso' => 80
                ];
                $response = $this->post(self::url.'/dados-clinicos/cadastrar', $this->formularioPadrao($formulario));
            }
    
            // A verificação do status deve ocorrer dentro do bloco try-catch
            $response->assertStatus(200);
    
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            $this->fail($e->getMessage());
        }
    }
    
    /** @test */
    public function deletarDadosClinicos()
    {
        $id = 1;
        $response = $this->delete(self::url.'/dados-clinicos/deletar/'.$id);

        $response->assertStatus(200);
    }
}
