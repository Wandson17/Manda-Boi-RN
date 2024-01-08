<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaIngresso extends Model
{

    protected $fillable = [
        'categoria'
    ];

    use HasFactory;

    protected $table = "categorias_ingressos";
}
