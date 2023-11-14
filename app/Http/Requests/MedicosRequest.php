<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return 
        [
            'cpf' => 'required|string',
            'nome' => 'required|string',
            'dt_nascimento' => 'required|date',
            'endereco' => 'required|string',
            'telefone' => 'required|string',
            'email' => 'required|email',
            'genero' => 'required|string',
            'crm' => 'required|string',
            'uf_crm' => 'required|string',
            'especialidade' => 'required|string',
            'status_medico' =>  'required|string',
            'status_financeiro' => 'required|string',
        ];
    }
}
