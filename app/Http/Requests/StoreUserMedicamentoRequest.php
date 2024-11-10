<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserMedicamentoRequest extends FormRequest
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
            'id_usuario' => 'required|string',
            'id_medicamento' => 'required|string',
            'tipo_dosagem' => 'required|string',
            'qtd_dosagem' => 'required|string',
            'horario' => 'required|string',
            'data_inicial' => 'required|string',
            'data_final' => 'required|string',
        ];
    }
}
