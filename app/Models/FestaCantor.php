<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FestaCantor extends Model
{

    protected $fillable = [
        'festa_id',
        'cantor_id'
    ];

    protected $table = 'festas_cantores';

    use HasFactory;
}
