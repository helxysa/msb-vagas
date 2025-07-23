<?php

namespace App\Livewire\Publico;
use App\Models\Vaga;

use Livewire\Component;

class VagaUnica extends Component
{
    public Vaga $vaga;

    public function render()
    {
        return view('livewire.publico.vaga-unica');
    }
}
