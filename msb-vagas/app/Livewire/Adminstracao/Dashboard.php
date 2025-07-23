<?php

namespace App\Livewire\Adminstracao;

use App\Models\Vaga;
use Livewire\Component;

class Dashboard extends Component
{
    public $chartData = [];

    public function mount()
    {
        $this->loadChartData();
    }

    public function loadChartData()
    {
        $vagas = Vaga::selectRaw('EXTRACT(MONTH FROM created_at) as month, COUNT(*) as count')
                    ->groupBy('month')
                    ->orderBy('month')
                    ->get();

        $meses = [
            1 => 'Janeiro', 2 => 'Fevereiro', 3 => 'Março', 4 => 'Abril',
            5 => 'Maio', 6 => 'Junho', 7 => 'Julho', 8 => 'Agosto',
            9 => 'Setembro', 10 => 'Outubro', 11 => 'Novembro', 12 => 'Dezembro'
        ];

        $this->chartData = [
            'labels' => $vagas->map(fn($vaga) => $meses[(int)$vaga->month]),
            'datasets' => [
                [
                    'label' => 'Vagas Criadas',
                    'data' => $vagas->pluck('count')->toArray(),
                    'backgroundColor' => '#3B82F6',
                ]
            ]
        ];
    }

    public function render()
    {
        return view('livewire.adminstracao.dashboard');
    }
}