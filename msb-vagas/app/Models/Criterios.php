<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Criterios extends Model
{
    protected $table = 'criterios';

    protected $fillable = [
        'nome',
        'descricao',
        'peso',
        'conjunto_criterio_id',
    ];

    public function conjuntoCriterio()
    {
        return $this->belongsTo(ConjuntoCriterio::class);
    }
}
