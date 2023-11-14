<?php

namespace Tests\Feature;

use Tests\TestCase;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MedicosTest extends TestCase
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
            'genero' => $formulario['genero'] ?? fake()->randomElement(['M', 'F', 'O']),
            'crm' => $formulario['crm'] ?? fake()->numerify('######'),
            'uf_crm' => $formulario['uf_crm'] ?? fake()->randomElement(['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT','PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR','SC', 'SP', 'SE', 'TO']),
            'especialidade' => $formulario['especialidade'] ?? fake()->randomElement(['Endocrinologista', 'Cardiologista', 'Nutricionista']),
            'status_medico' => $formulario['status_medico'] ?? fake()->numerify('#'),
            'status_financeiro' => $formulario['status_financeiro'] ?? fake()->numerify('#'),
        ];
    }

    /** @test */
     public function cadastrarMedico(): void
    {
        $formulario=[];
        $response = $this->post(self::url.'/medicos/cadastrar', $this->formularioPadrao($formulario));

        $response->assertStatus(200);
    }
    
    public function buscarMedicoValido()
    {
        return DB::table('medicos')->whereNotNull('id')->value('id');
    }

    /** @test */
    public function editarMedico(): void
    {
        $response = $this->get(self::url.'/medicos/editar/'.$this->buscarMedicoValido());
        $response->assertStatus(200);
    }

    /** @test */
    public function atualizarMedico(): void
    {
        $formulario=
        [
            'cpf' => '12312332112',
            'nome' => 'Chucrute da Silva',
            'dt_nascimento' => 22/10/1989,
            'endereco' => 'Trav. Humaitá, 123, Belém-PA',
            'telefone' => '8989-8989',
            'email' => 'drchucrutes@gmail.com',
            'genero' => 'M',
            'crm' => '668978',
            'uf_crm' => 'PA',
            'especialidade' => 'Endocrinologista',
            'status_medico' => 2,
            'status_financeiro' => 2,
        ];
        $id = $this->buscarMedicoValido();
        $response = $this->put(self::url.'/medicos/atualizar/'.$id, $this->formularioPadrao($formulario));
        $medico = $this->get(self::url.'/medicos/editar/'.$id);
        
        // dump($id);
        // dump($formulario);
        // dump($medico->getContent());

        if($medico->getContent() == $formulario)
        {
            $response->assertStatus(200);
        }
        else
        {
            $response->assertStatus(500);
        }
    }
    
    /** @test */
    public function cargaMaximaCadastroMedico(): void
    {
        DB::beginTransaction();
    
        try {
            for ($i = 0; $i < 100; $i++) {
                $formulario = [];
                $response = $this->post(self::url.'/medicos/cadastrar', $this->formularioPadrao($formulario));
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
    public function deletarMedico()
    {
        $response = $this->delete(self::url.'/medicos/deletar/'.$this->buscarMedicoValido());

        $response->assertStatus(200);
    }
}
