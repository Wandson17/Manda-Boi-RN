<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255'],
            'cpf' => ['required', 'cpf'],
            'celular' => ['required', 'celular_com_ddd'],
        ];
    }

    public function messages()
    {
        return [
            'cpf.cpf' => "CPF inválido",
            'email.email' => 'Email inválido',
            '*.required' => 'Esse campo é obrigatório',
            'name.max' => 'O nome deve ter no maximo 255 caracteres',
            'celular.celular_com_ddd' => 'Celular inválido',
        ];
    }

}
