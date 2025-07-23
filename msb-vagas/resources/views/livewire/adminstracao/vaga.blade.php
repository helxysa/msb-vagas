<div x-data="{ open: false }" class="text-center">
    <button @click="open = !open">
        <span x-text="open ? 'Fechar' : 'Abrir'"></span>
    </button>

    <div x-show="!open">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Área</th>
                    <th>Localização</th>
                    <th>Descrição da Vaga</th>
                    <th>Responsabilidades</th>
                    <th>Requisitos</th>
                    <th>Benefícios</th>
                    <th>Remuneração</th>
                    <th>Modalidade</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vagas as $vaga)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $vaga->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $vaga->nome }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $vaga->area }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $vaga->localizacao }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $vaga->descricao_da_vaga }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $vaga->responsabilidades }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $vaga->requisitos }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $vaga->beneficios }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $vaga->remuneracao }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $vaga->modalidade }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div x-show="open" x-transition class="msg">
        <div class='grid grid-cols-2'>
            <form wire:submit="save">
                <label>Nome</label>
                <input type="text" wire:model="nome">
                <label>Area</label>
                <input type="text" wire:model="area">
                <label>Localização</label>
                <input type="text" wire:model="localizacao">
                <label>Descrição da Vaga</label>
                <input type="text" wire:model="descricao_da_vaga">
                <label>Requisitos</label>
                <input type="text" wire:model="requisitos">
                <label>Benefícios</label>
                <input type="text" wire:model="beneficios">
                <label>Remuneração</label>
                <input type="text" wire:model="remuneracao">
                <label>Modalidade</label>
                <input type="text" wire:model="modalidade">
        </div>
        <button type='submit' class='bg-blue-900'>
            Save
        </button>
        </form>
    </div>
</div>
