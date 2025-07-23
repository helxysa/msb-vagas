<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidaturaPivot extends Model
{
    protected $table = 'candidatura_pivot';

    protected $fillable = [
        'candidatura_id',
        'vaga_id',
        'data_inscricao',
    ];

    public $timestamps = true;

    public function candidatura()
    {
        return $this->belongsTo(Candidato::class, 'candidato_id');
    }

    public function vaga()
    {
        return $this->belongsTo(Vaga::class, 'vaga_id');
    }
}
