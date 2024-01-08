<?php

namespace App\Http\Requests;

use App\Rules\VerificaSenha;
use Illuminate\Foundation\Http\FormRequest;

class StoreSenhaUserRequest extends FormRequest
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
            'forma_pagamento' => ['required', 'integer', 'exists:formas_pagamentos,id'],
            'nome_vaqueiro' => ['required', 'string', 'max:255'],
            'apelido' => ['required', 'string', 'max:45'],
            'cpf' => ['required', 'cpf'],
            'cidade' => ['required', 'integer', 'exists:cities,id'],
            'categoria' => ['required', 'string', 'max:45', 'exists:categorias_senhas,id'],
            'cavalo_puxador' => ['required', 'string', 'max:45'],
            'esteireiro' => ['required', 'string', 'max:255'],
            'cavalo_esteireiro' => ['required', 'string', 'max:45'],
            'apelido_esteira' => ['required', 'string', 'max:45'],
            'representacao' => ['required', 'integer', 'exists:cities,id'],
            'n_senha' => ['required', 'integer', new VerificaSenha($this->input('categoria'), $this->input('corrida_id'))],
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'Este campo e obrigatório',
            '*.integer' => 'O valor deve ser um número inteiro',
            'cidade.exists' => 'Essa cidade não existe',
            'representacao.exists' => 'Essa representação não existe',
            'categoria_exists' => 'Essa categoria não existe',
            'forma_pagamento.exists' => 'Essa forma de pagamento não existe',
        ];
    }
}
