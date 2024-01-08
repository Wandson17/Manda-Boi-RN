<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFestaRequest extends FormRequest
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
            'nome' => ['required', 'string', 'max:255'],
            'atracoes' => ['required', 'string', 'max:255'],
            'localizacao' => ['required', 'string', 'max:255'],
            'cover_image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:4096'],
            'data_inicio' => ['required', 'date', 'after_or_equal:today'],
            'time' => ['required', 'date_format:H:i'],
        ];
    }

    public function messages()
    {
        return [
            'cover_image.required' => "A imagem é obrigatória",
            '*.string' => 'Esse campo deve possuir texto',
            '*.required' => 'Esse campo é obrigatório',
            '*.date' => 'Data inválida',
            '*.after_or_equal' => 'Data deve ser maior ou igual a data atual',
            '*.integer' => 'O valor deve ser um número inteiro',
            '*.time' => 'O horário deve estar no formato HH:MM',
            'cover_image.image' => 'Formato de imagem inválida',
            'cover_image.mimes' => 'A imagem deve ser do tipo jpeg, png, jpg ou gif',
            'cover_image.max' => 'A imagem deve ter no máximo 4MB',
        ];
    }
}
