<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cantor extends Model
{

    protected $fillable = [
        'nome',
        'sobrenome',
        'nome_artistico'
    ];

    protected $table = 'cantores';

    use HasFactory;

    public function festas()
    {
        return $this->belongsToMany(Festa::class, 'festas_cantores', 'cantor_id', 'festa_id');
    }
}
