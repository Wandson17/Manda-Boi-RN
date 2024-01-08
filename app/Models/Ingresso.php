<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingresso extends Model
{
    protected $fillable = [
        'festa_id',
        'categoria_ingresso_id',
        'preco',
        'observation'
    ];

    public function categoriaIngresso()
    {
        return $this->belongsTo(CategoriaIngresso::class, 'categoria_ingresso_id');
    }

    use HasFactory;
}
