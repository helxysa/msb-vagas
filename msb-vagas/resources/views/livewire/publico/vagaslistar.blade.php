<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($vagas as $vaga)
        <a href="{{ route('todas-as-vagas', ['vaga' => $vaga->id]) }}" wire:navigate class="block h-full">
            <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition duration-200 h-full flex flex-col">
                <div class="p-6 flex-grow flex flex-col">
                    <div class="flex items-center justify-between mb-4">
                        <div class="h-12 w-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </div>
                    </div>

                    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $vaga->nome }}</h2>
                    <h3 class="text-sm text-gray-500 mb-4 flex-grow">{{ $vaga->descricao_da_vaga }}</h3>
                    <div class="mt-auto">
                        <span
                            class="inline-block bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium mb-4">
                            {{ $vaga->area }}
                        </span>
                        <button
                            class="w-full bg-blue-900 hover:bg-blue-800 text-white py-2 rounded-lg font-medium transition duration-200">
                            Ver Detalhes
                        </button>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
</div>
