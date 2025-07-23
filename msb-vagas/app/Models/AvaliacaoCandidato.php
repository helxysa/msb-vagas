<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvaliacaoCandidato extends Model
{
    protected $table = 'avaliacoes_candidatos';

    protected $fillable = [
        'candidato_id',
        'criterio_id',
        'nota',
        'comentario',
    ];

    public function candidato()
    {
        return $this->belongsTo(Candidato::class);
    }

    public function criterio()
    {
        return $this->belongsTo(Criterios::class, 'criterio_id');
    }
}
