<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCorridaRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'park_name' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date', 'after_or_equal:today'],
            'end_date' => ['required', 'date', 'after_or_equal:today'],
            'city' => ['required', 'integer', 'exists:cities,id'],
            'qntd_senha' => ['required', 'integer', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            '*.required' => 'Esse campo é obrigatório',
            '*.date' => 'Data inválida',
            'city.exists' => 'A cidade selecionada não existe',
            '*.after_or_equal' => 'A data deve ser apartir de hoje em diante',
            '*.integer' => 'O valor deve ser um número inteiro',
            'qntd_senha.min' => 'Quantidade de senhas deve ser maior que zero',
        ];
    }
}
