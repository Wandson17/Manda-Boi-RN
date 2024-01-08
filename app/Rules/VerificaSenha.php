<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class VerificaSenha implements ValidationRule
{

    protected $corridaId;
    protected $categoriaId;

    public function __construct($categoriaId, $corridaId)
    {
        $this->categoriaId = $categoriaId;
        $this->corridaId = $corridaId;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $tipoSenha = \App\Models\TipoSenha::where('corrida_id', $this->corridaId)
            ->where('categoria_senhas_id', $this->categoriaId)
            ->where('de', '<=', $value)->where('ate', '>=', $value)
            ->exists();
        if (!$tipoSenha)
            $fail('Senha inválida para essa categoria');

        $senha = \App\Models\SenhaCorrida::where('corrida_id', $this->corridaId)
            ->where('categoria_senhas_id', $this->categoriaId)
            ->where('numero', $value)
            ->exists();
        if ($senha)
            $fail('Essa senha já foi selecionada');
    }
}
