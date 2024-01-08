<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIngressoUsuarioRequest extends FormRequest
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
            'forma_pagamento' => ['required', 'integer', 'exists:formas_pagamentos,id'],
            'festa_id' => ['required', 'integer', 'exists:festas,id'],
            'ingresso' => ['required', 'integer', 'exists:ingressos,id'],
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'Este campo e obrigatório',
            '*.integer' => 'O valor deve ser um número inteiro',
            'forma_pagamento.exists' => 'Essa forma de pagamento não existe',
            'festa.exists' => 'Essa festa não existe',
            'ingresso.exists' => 'Esse ingresso não existe',
        ];
    }
}
