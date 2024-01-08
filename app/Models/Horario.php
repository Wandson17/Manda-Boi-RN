<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{

    protected $fillable = [
        'hora_inicio',
        'hora_fim',
        'festa_id'
    ];

    protected $table = 'horarios';

    use HasFactory;
}
