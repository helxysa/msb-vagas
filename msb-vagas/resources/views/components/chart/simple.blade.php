{{-- resources/views/components/charts/simple.blade.php --}}
@props([
    'id' => 'chart',
    'type' => 'bar',
    'data' => [],
    'title' => '',
    'showLegend' => true,
    'legendPosition' => 'bottom',
    'height' => 'h-40 lg:h-48 xl:h-52'
])

<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 lg:p-6">
    @if($title)
        <h3 class="text-base lg:text-lg font-semibold text-gray-900 mb-3 lg:mb-4">{{ $title }}</h3>
    @endif
    <div class="{{ $height }}">
        <canvas id="{{ $id }}" class="w-full h-full"></canvas>
    </div>
</div>

@push('scripts')
<script>
function createChart{{ $id }}() {
    const canvas = document.getElementById('{{ $id }}');
    if (!canvas) {
        return;
    }
    
    if (typeof Chart === 'undefined') {
        return;
    }
    
    const existingChart = Chart.getChart(canvas);
    if (existingChart) {
        existingChart.destroy();
    }
    
    console.log('Criando gráfico {{ $id }}');
    
    const config = {
        type: '{{ $type }}',
        data: @json($data),
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: {{ $showLegend ? 'true' : 'false' }},
                    position: '{{ $legendPosition }}'
                }
            }
        }
    };
    
    if ('{{ $type }}' === 'pie' || '{{ $type }}' === 'doughnut') {
        config.options.plugins.legend = {
            display: {{ $showLegend ? 'true' : 'false' }},
            position: '{{ $legendPosition }}',
            labels: {
                boxWidth: 20,
                padding: 15
            }
        };
    } else if ('{{ $type }}' === 'bar') {
        config.options.scales = {
            y: {
                beginAtZero: true
            }
        };
    } else if ('{{ $type }}' === 'line') {
        config.options.elements = {
            line: {
                tension: 0.4,
                borderWidth: 2
            },
            point: {
                radius: 3,
                hoverRadius: 5
            }
        };
        config.options.plugins.legend = {
            display: {{ $showLegend ? 'true' : 'false' }},
            position: 'top',
            labels: {
                usePointStyle: true,
                pointStyle: 'rectRounded'
            }
        };
        config.options.scales = {
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Quantidade de Pessoas'
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Período'
                }
            }
        };
    }
    
    try {
        new Chart(canvas.getContext('2d'), config);
        console.log('Gráfico {{ $id }} criado com sucesso!');
    } catch (error) {
        console.error('Erro ao criar gráfico {{ $id }}:', error);
    }
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', createChart{{ $id }});
} else {
    createChart{{ $id }}();
}

document.addEventListener('livewire:navigated', createChart{{ $id }});

document.addEventListener('livewire:update', createChart{{ $id }});
</script>
@endpush 