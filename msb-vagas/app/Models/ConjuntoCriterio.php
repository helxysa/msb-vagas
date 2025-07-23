<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConjuntoCriterio extends Model
{
    protected $table = 'conjuntos_criterios';

    protected $fillable = [
        'nome',
    ];

    public function criterios()
    {
        return $this->hasMany(Criterios::class);
    }
}
