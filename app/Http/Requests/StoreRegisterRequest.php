<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cpf' => ['required', 'cpf', 'unique:users,cpf'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'celular' => ['required', 'celular_com_ddd', 'unique:users,celular'],
            'data_nascimento' => ['required', 'date']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            '*.required' => 'Esse campo é obrigatório',
            'cpf.cpf' => "CPF inválido",
            'data_nascimento.date' => 'Data inválida',
            'celular.celular_com_ddd' => 'Celular inválido',
            'password.min' => 'A senha deve ter pelo menos 8 caracteres',
            'password.confirmed' => 'As senhas devem ser iguais',
            'email.email' => 'Email inválido',
            'name.max' => 'O nome deve ter no maximo 255 caracteres',
            'email.unique' => 'Email já existe',
            'cpf.unique' => 'CPF já existe',
            'celular.unique' => 'Celular já existe',
        ];
    }
}
