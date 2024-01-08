<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name'
    ];

    public function corrida()
    {
        return $this->belongsTo(Corrida::class);
    }

    use HasFactory;

    protected $table = 'cities';
}
