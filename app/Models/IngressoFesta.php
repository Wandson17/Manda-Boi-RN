<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngressoFesta extends Model
{
    protected $fillable = [
        'festa_id',
        'ingresso_id',
        'forma_pagamento_id',
        'user_id',
        'valor_total',
    ];

    public function festa()
    {
        return $this->belongsTo(Festa::class);
    }

    public function ingresso()
    {
        return $this->belongsTo(Ingresso::class);
    }

    public function formaPagamento()
    {
        return $this->belongsTo(FormaPagamento::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $table = 'ingressos_festas';

    use HasFactory;
}
