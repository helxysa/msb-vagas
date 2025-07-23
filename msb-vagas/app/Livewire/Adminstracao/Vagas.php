<?php

namespace App\Livewire\Adminstracao;
use Livewire\Component;
use App\Models\Vaga;
use App\Models\Candidatos;
use App\Models\CandidaturaPivot;



class Vagas extends Component
{   


    
    public $vagas;
    public $vaga = '';
    public $nome = '';
    public $area = '';
    public $localizacao = '';
    public $descricao_da_vaga = '';
    public $responsabilidades = '';
    public $requisitos = '';
    public $beneficios = '';
    public $remuneracao = '';
    public $modalidade = '';

    public function mount()
    {
        $this->vagas = Vaga::orderBy('id', 'ASC')->get();
    }

    public function save()
    {
        $validated = $this->validate([
            'nome' => 'required',
            'area' => 'nullable',
            'localizacao' => 'nullable',
            'descricao_da_vaga' => 'nullable',
            'responsabilidades' => 'nullable',
            'requisitos' => 'nullable',
            'beneficios' => 'nullable',
            'remuneracao' => 'nullable',
            'modalidade' => 'nullable',
        ]);

        $vaga = Vaga::create([
            'nome' => $this->nome, 
            'area' => $this->area, 
            'localizacao' => $this->localizacao, 
            'descricao_da_vaga' => $this->descricao_da_vaga, 
            'responsabilidades' => $this->responsabilidades, 
            'requisitos' => $this->requisitos, 
            'beneficios' => $this->beneficios, 
            'remuneracao' => $this->remuneracao,
            'modalidade' => $this->modalidade,
        ]);

         session()->flash('message', 'Vaga cadrastada com sucesso!');
         $this->resetForm();
    }


    private function resetForm()
    {
        $this->reset([
            'nome',
            'area',
            'localizacao',
            'descricao_da_vaga',
            'responsabilidades',
            'requisitos',
            'beneficios',
            'remuneracao',
            'modalidade',
        ]);
    }

    public function render()
    {
        return view('livewire.adminstracao.vaga');
    }
}
