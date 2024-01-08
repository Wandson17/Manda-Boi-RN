<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSenhaRequest extends FormRequest
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
            'corrida_id' => ['required', 'integer', 'exists:corridas,id'],
            'categoria' => ['required', 'string', 'max:45', 'exists:categorias_senhas,id', new \App\Rules\VerificaCategoriaSeExiste($this->input('corrida_id'))],
            'de' => ['required', 'integer', 'min:1', 'lt:ate', new \App\Rules\VerificaSenhaCorrida($this->input('corrida_id'))],
            'ate' => ['required', 'integer', 'min:1', 'gt:de', new \App\Rules\VerificaSenhaCorrida($this->input('corrida_id'))],
            'valor' => ['required', 'numeric', 'min:1'],
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'Este campo e obrigatório',
            '*.integer' => 'O valor deve ser um número inteiro',
            '*.min' => 'O valor deve ser maior que zero',
            'corrida.exists' => 'A corrida não existe',
            'de.lt' => 'Senha inicial deve ser menor que a senha final',
            'ate.gt' => 'Senha final deve ser maior que a senha inicial',
            'valor.numeric' => 'O valor deve ser um número',
            'valor.min' => 'O valor deve ser maior que zero',
        ];
    }

}
