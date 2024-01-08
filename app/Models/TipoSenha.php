<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoSenha extends Model
{

    protected $fillable = [
        'de',
        'ate',
        'corrida_id',
        'categoria_senhas_id',
        'valor'
    ];

    public function categoria()
    {
        return $this->belongsTo(CategoriaSenha::class);
    }

    protected $table = "tipos_senhas";

    use HasFactory;
}
