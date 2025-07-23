<div>
    <h2 class="text-xl font-semibold mb-4">Vagas por Mês</h2>
    
    <div class="bg-white p-4 rounded-lg shadow">
        <x-chart.simple
            id="vagasChart"
            type="bar"
            title="Distribuição de Vagas"
            :data="$chartData"
        />
    </div>
</div>