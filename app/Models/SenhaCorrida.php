<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SenhaCorrida extends Model
{

    protected $fillable = [
        'numero',
        'nome_puxador',
        'apelido_puxado',
        'cpf_puxador',
        'cavalo_puxador',
        'nome_esteira',
        'apelido_esteira',
        'cidade',
        'UF',
        'representacao_id',
        'status_pagamento',
        'corrida_id',
        'user_id',
        'categoria_senhas_id',
        'valor_total',
        'forma_pagamento_id',
    ];

    public function corrida()
    {
        return $this->belongsTo(Corrida::class);
    }

    public function categoria()
    {
        return $this->belongsTo(CategoriaSenha::class, 'categoria_senhas_id');
    }

    public function formaPagamento()
    {
        return $this->belongsTo(FormaPagamento::class);
    }

    protected $table = 'senhas_corridas';

    use HasFactory;
}
