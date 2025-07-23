<?php

namespace App\Livewire\Publico;

use App\Models\Candidato;
use App\Models\Vaga;
use App\Models\CandidaturaPivot;
use Livewire\Component;
use Livewire\WithFileUploads;

class Candidatos extends Component
{
    use WithFileUploads;

    public $vagas;
    public $vaga = '';
    public $candidatos;
    public $candidaturas;

    public $nome = '';
    public $cpf = '';
    public $email = '';
    public $telefone = '';
    public $informacoes_adicionais = '';
    public $path_curriculo;
    public $termos = false;
    public $status_candidatura = 'pendente';

    public function mount()
    {
        $this->vagas = Vaga::all();
        $this->candidatos = Candidato::all();
        $this->candidaturas = CandidaturaPivot::with(['candidato', 'vaga'])->get();
    }

    public function save()
    {
        $this->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'email' => 'required|email',
            'telefone' => 'required',
            'vaga' => 'required|exists:vaga,id',
            'termos' => 'accepted',
        ]);

        $pathCurriculo = $this->path_curriculo ? $this->path_curriculo->store('curriculos', 'public') : null;

        $candidato = Candidato::create([
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'informacoes_adicionais' => $this->informacoes_adicionais,
            'path_curriculo' => $pathCurriculo,
            'termos' => $this->termos,
        ]);

        $candidato->vagas()->attach($this->vaga, [
            'data_inscricao' => now(),
            'status_candidatura' => $this->status_candidatura
        ]);

        $this->candidaturas = CandidaturaPivot::with(['candidato', 'vaga'])->get();

        session()->flash('message', 'Candidatura realizada com sucesso!');
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset([
            'nome', 'cpf', 'email', 'telefone', 
            'informacoes_adicionais', 'path_curriculo', 
            'termos', 'vaga'
        ]);
    }

    public function render()
    {
        return view('livewire.publico.candidatura');
    }
}