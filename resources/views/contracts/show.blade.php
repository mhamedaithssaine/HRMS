<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Détails du Contrat
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Type de Contrat:</label>
                        <p class="text-gray-800 dark:text-gray-200">{{ $contract->type }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Date de Début:</label>
                        <p class="text-gray-800 dark:text-gray-200">{{ $contract->start_date }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Date de Fin:</label>
                        <p class="text-gray-800 dark:text-gray-200">{{ $contract->end_date }}</p>
                    </div>
                  
                    <div class="flex items-center justify-between">
                        <a href="{{ route('contracts.edit', $contract->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Modifier</a>
                        <a href="{{ route('contracts.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>