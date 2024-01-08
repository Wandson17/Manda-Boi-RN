<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFestaRequest extends FormRequest
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
            'festa_id' => ['required', 'exists:festas,id'],
            'nome' => ['required', 'string', 'max:255'],
            'atracoes' => ['required', 'string', 'max:255'],
            'localizacao' => ['required', 'string', 'max:255'],
            'data_inicio' => ['required', 'date', 'after_or_equal:today'],
            'time' => ['required', 'date_format:H:i'],
        ];
    }

    public function messages()
    {
        return [
            'festa_id.exists' => 'Festa inválida',
            '*.string' => 'Esse campo deve possuir texto',
            '*.required' => 'Esse campo é obrigatório',
            '*.date' => 'Data inválida',
            '*.after_or_equal' => 'Data deve ser maior ou igual a data atual',
            '*.time' => 'O horário deve estar no formato HH:MM',
        ];
    }
}
