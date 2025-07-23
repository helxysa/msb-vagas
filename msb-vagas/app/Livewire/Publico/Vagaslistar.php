<?php

namespace App\Livewire\Publico;
use App\Models\Vaga;
use Livewire\Component;

class Vagaslistar extends Component
{
      
    public $vagas;
    public $vaga = '';
    public $vaga_id = '';

    public function mount(){
        $this->vagas = Vaga::all();
    }




    public function render()
    {
        return view('livewire.publico.vagaslistar');
    }
}
