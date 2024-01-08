<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Corrida extends Model
{
    use HasTrixRichText;

    protected $fillable = ['corrida-trixFields', 'nome', 'park_name', 'data_inicio', 'data_fim', 'city', 'cover', 'qntd_senha'];

    public function cityy()
    {
        return $this->belongsTo(City::class, 'city'); // Certifique-se de passar o nome da coluna corretamente
    }

    public function festa()
    {
        return $this->belongsTo(Festa::class, 'id', 'corrida_id');
    }

    protected $table = 'corridas';

    protected $guarded = [];

    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::deleted(function ($corrida) {
            $corrida->trixRichText->each->delete();
        });
    }
}
