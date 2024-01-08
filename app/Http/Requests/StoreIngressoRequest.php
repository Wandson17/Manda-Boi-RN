<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\CategoriaIngresso;

class StoreIngressoRequest extends FormRequest
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
        $categorias = CategoriaIngresso::all();
        $rules = ['festa_id' => ['required', 'exists:festas,id']];

        foreach ($categorias as $categoria) {
            $rules['cat_'.$categoria->categoria] = ['required', 'string', 'max:45', 'exists:categorias_ingressos,categoria'];
            $rules["value_{$categoria->categoria}"] = ['required', 'numeric', 'min:0','max:100000'];
            $rules['observation_'.$categoria->categoria] = ['string', 'max:255'];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'festa_id.required' => 'Festa inválida',
            '*.required' => 'Esse campo é obrigatório',
            '*.string' => 'Esse campo deve ser uma string',
            '*.exists' => 'Categoria inválida',
            '*.numeric' => 'Valor inválido',
            'value_VIP.min' => 'O tamnho minimo do ingresso é de R$ 0,00',
            'value_VIP.max' => 'O tamnho maximo do ingresso é de R$ 100.000,00',
            'value_Estudante.min' => 'O tamnho minimo do ingresso é de R$ 0,00',
            'value_Estudante.max' => 'O tamnho maximo do ingresso é de R$ 100.000,00',
            'value_Pista.min' => 'O tamnho minimo do ingresso é de R$ 0,00',
            'value_Pista.max' => 'O tamnho maximo do ingresso é de R$ 100.000,00',
            'value_Meia.min' => 'O tamnho minimo do ingresso é de R$ 0,00',
            'value_Meia.max' => 'O tamnho maximo do ingresso é de R$ 100.000,00',
            'observation_VIP.max' => 'O tamanho maximo da observação é de 255 caracteres',
        ];
    }

}
