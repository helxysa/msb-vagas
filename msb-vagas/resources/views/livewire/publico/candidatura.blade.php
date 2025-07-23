<div x-data="{ open: false }" class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
    <button @click="open = !open"
        class="mb-6 px-6 py-2 bg-blue-700 text-white rounded shadow hover:bg-blue-800 transition">
        <span x-text="open ? 'Fechar' : 'Abrir'"></span>
    </button>

    <div x-show='!open' x-transition class="w-full max-w-4xl space-y-8">
        <!-- Tabela de Candidaturas (Pivot) -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold mb-4 text-purple-800">Candidaturas</h2>
            <table class="w-full">
                <thead class="bg-purple-100">
                    <tr>
                        <th class="px-6 py-3 text-left">Candidato</th>
                        <th class="px-6 py-3 text-left">Vaga</th>
                        <th class="px-6 py-3 text-left">Data Inscrição</th>
                        <th class="px-6 py-3 text-left">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($candidaturas as $candidatura)
                        <tr class="border-b">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $candidatura->candidato->nome }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $candidatura->vaga->nome }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ \Illuminate\Support\Carbon::parse($candidatura->data_inscricao)->format('d/m/Y H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $candidatura->status_candidatura }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center">Nenhuma candidatura registrada</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Candidatos Table -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold mb-4 text-blue-800">Candidatos</h2>
            <table class="w-full">
                <thead class="bg-blue-100">
                    <tr>
                        <th class="px-6 py-3 text-left">ID</th>
                        <th class="px-6 py-3 text-left">Nome</th>
                        <th class="px-6 py-3 text-left">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($candidatos as $candidato)
                        <tr class="border-b">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $candidato->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $candidato->nome }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $candidato->email }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center">Nenhum candidato encontrado</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Vagas Table -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold mb-4 text-green-800">Vagas</h2>
            <table class="w-full">
                <thead class="bg-green-100">
                    <tr>
                        <th class="px-6 py-3 text-left">ID</th>
                        <th class="px-6 py-3 text-left">Nome</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($vagas as $vaga)
                        <tr class="border-b">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $vaga->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $vaga->nome }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="px-6 py-4 text-center">Nenhuma vaga disponível</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Form Section -->
    <div x-show="open" x-transition>
        <div class="flex justify-center">
            <form wire:submit="save"
                class="bg-white p-10 rounded-xl shadow-2xl border-2 border-blue-700 w-full max-w-2xl">
                <h2 class="text-2xl font-bold mb-6 text-blue-800 text-center">Formulário de Candidatura</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1">Nome</label>
                        <input type="text" wire:model="nome"
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1">CPF</label>
                        <input type="text" wire:model="cpf"
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1">E-mail</label>
                        <input type="email" wire:model="email"
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1">Telefone</label>
                        <input type="text" wire:model="telefone"
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1">Currículo</label>
                        <input type="file" wire:model="path_curriculo"
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1">Informações adicionais</label>
                        <textarea wire:model="informacoes_adicionais"
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-semibold mb-1">Vaga</label>
                        <select wire:model="vaga"
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <option value="">Selecione uma vaga</option>
                            @foreach ($vagas as $vagaOption)
                                <option value="{{ $vagaOption->id }}">{{ $vagaOption->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label class="flex items-center">
                            <input type="checkbox" wire:model="termos" class="form-checkbox h-5 w-5 text-blue-600">
                            <span class="ml-2 text-gray-700">Aceito os termos e condições</span>
                        </label>
                    </div>
                </div>
                <button type='submit'
                    class='mt-8 w-full bg-blue-900 text-white font-bold py-3 rounded-lg shadow hover:bg-blue-800 transition'>
                    Enviar Candidatura
                </button>
            </form>
        </div>
    </div>
</div>
