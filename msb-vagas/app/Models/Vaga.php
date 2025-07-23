<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    protected $table = 'vaga';

    protected $fillable = [
        'nome',
        'area',
        'localizacao',
        'descricao_da_vaga',
        'responsabilidades',
        'requisitos',
        'beneficios',
        'remuneracao',
        'modalidade',
    ];


    public function candidatos()
    {
        return $this->belongsToMany(Candidato::class, 'candidatura_pivot')
                    ->using(CandidaturaPivot::class)
                    ->withPivot(['data_inscricao', 'status_candidatura'])
                    ->withTimestamps();
    }
}
