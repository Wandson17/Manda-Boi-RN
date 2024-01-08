<?php

namespace App\Rules;

use App\Models\Corrida;
use App\Models\SenhaCorrida;
use App\Models\TipoSenha;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class VerificaSenhaCorrida implements ValidationRule
{
    protected $corridaId;

    public function __construct($corridaId)
    {
        $this->corridaId = $corridaId;
    }

    public function passes($attribute, $value)
    {
        $corrida = Corrida::find($this->corridaId);
        $senhas = TipoSenha::where('corrida_id', $this->corridaId)->get();

        if($value > $corrida->qtd_senhas) {return false;}

        foreach($senhas as $senha)
        {
            if($value < $senha->de || $value > $senha->ate)
                continue;
            else
                return false;
        }
        return true;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $corrida = Corrida::find($this->corridaId);
        $senhas = TipoSenha::where('corrida_id', $this->corridaId)->get();

        if($value > $corrida->qntd_senha) {$fail('A senha ultrapassa a quantidade de senhas');}

        foreach($senhas as $senha)
        {
            if($value < $senha->de || $value > $senha->ate)
                continue;
            else
                $fail('Senha inválida');
        }
    }

    public function message()
    {
        return 'Senha inválida';
    }

}
