<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaSenha extends Model
{

    protected $fillable = [
        'categoria',
    ];

    protected $table = "categoria_senhas";

    use HasFactory;
}
