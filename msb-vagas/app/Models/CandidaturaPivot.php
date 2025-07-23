<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CandidaturaPivot extends Pivot
{
    protected $table = 'candidatura_pivot'; 
    
    protected $fillable = [
        'candidato_id',  
        'vaga_id',
        'data_inscricao',
        'status_candidatura' 
    ];

    public $timestamps = true;

    public function candidato()
    {
        return $this->belongsTo(Candidato::class);
    }

    public function vaga()
    {
        return $this->belongsTo(Vaga::class);
    }
}