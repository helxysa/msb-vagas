<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    protected $table = 'candidatura';

    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'telefone',
        'status_candidatura',
        'path_curriculo',
        'informacoes_adicionais',
        'termos',
    ];
}