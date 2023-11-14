<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacientesRequest extends FormRequest
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
        return [
            "cpf" => "required",
            "nome" => "required|string",
            "dt_nascimento" => "required|date",
            "endereco" => "required|string",
            "telefone" => "required|string",
            "email" => "required|email",
            "responsavel_legal" => "nullable|string",
            "alergia" => "nullable|boolean",
            "tipos_alergia" => "required_if:alergia,true|nullable|string",
            "medicamentos" => "required|boolean",
            "tipos_medicamentos" => "required_if:medicamentos,true|nullable|string",
            "cirurgias" => "required|boolean",
            "historico_cirurgia" => "required_if:cirurgias,true|nullable|string",
            "tabagista" => "required|boolean",
            "alcool" => "required|boolean",
            "atividade_fisica" => "required|boolean",
            "tipo_atividade_fisica" => "required_if:atividade_fisica,true|nullable|string",
        ];
    }
}
