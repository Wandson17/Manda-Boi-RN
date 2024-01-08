<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormaPagamento extends Model
{
    protected $fillable = [
        'forma_pagamento',
    ];

    protected $table = 'formas_pagamentos';

    use HasFactory;
}
