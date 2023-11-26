<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DadosClinicosRequest extends FormRequest
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
            'consulta_id' => 'required|integer',
            'medida_cintura' => 'required|numeric',
            'peso' => 'required|numeric',
            'hba1c' => 'nullable|numeric',
            'glicose_jejum' => 'nullable|numeric',
            'pressao_arterial' => 'nullable|numeric',
            'triglicerideos' => 'nullable|numeric',
            'adiponectina' => 'nullable|numeric',
            'unidade_diaria_insulina' => 'nullable|numeric',
            'dose_insulina' => 'nullable|numeric',  // Unidade Diária de Insulina (U/dia) / Peso (kg)
        ];
    }
}
