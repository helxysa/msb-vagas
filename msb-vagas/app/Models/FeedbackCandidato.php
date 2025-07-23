<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedbackCandidato extends Model
{
    protected $table = 'feedback_do_candidato';

    protected $fillable = [
        'nome',
        'tipo_de_feedback',
        'comentario',
        'candidato_id',
    ];

    public function candidato()
    {
        return $this->belongsTo(Candidato::class);
    }
}
