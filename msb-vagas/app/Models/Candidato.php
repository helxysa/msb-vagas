<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    protected $table = 'candidato';

    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'telefone',
        'vaga',
        'status_candidatura',
        'path_curriculo',
        'informacoes_adicionais',
        'termos',
    ];

    // Relacionamento many-to-many com Vagas
    public function vagas()
    {
        return $this->belongsToMany(Vaga::class, 'candidatura_pivot')
                    ->using(CandidaturaPivot::class)
                    ->withPivot(['data_inscricao', 'status_candidatura'])
                    ->withTimestamps();
    }
}