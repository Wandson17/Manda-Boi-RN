<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Festa extends Model
{
    use HasTrixRichText;

    protected $fillable = [
        'festa-trixFields',
        'nome',
        'data_inicio',
        'data_fim',
        'endereco',
        'descricao',
        'atracoes',
        'corrida_id',
        'photo',
        'time'
    ];

    protected $table = 'festas';

    use HasFactory;

    public function cantores()
    {
        return $this->belongsToMany(Cantor::class, 'festas_cantores', 'festa_id', 'cantor_id');
    }

    public function corrida()
    {
        return $this->belongsTo(Corrida::class, 'corrida_id');
    }
}
