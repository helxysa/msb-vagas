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
}
