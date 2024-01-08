<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class VerificaCategoriaSeExiste implements ValidationRule
{

    protected $corridaId;

    public function __construct($corridaId)
    {
        $this->corridaId = $corridaId;
    }

    public function passes($attribute, $value)
    {
        $categoriaExiste = \App\Models\TipoSenha::where('corrida_id', $this->corridaId)->where('categoria_senhas_id', $value)->exists();
        return !$categoriaExiste ? true : false;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $categoriaExiste = \App\Models\TipoSenha::where('corrida_id', $this->corridaId)->where('categoria_senhas_id', $value)->exists();
        if($categoriaExiste)
            $fail('Já existe uma senha com essa categoria');
    }

    public function message()
    {
        return 'Já existe uma senha com essa categoria';
    }

}
