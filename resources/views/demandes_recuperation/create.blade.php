<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Soumettre une Demande de Récupération
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-6">Soumettre une demande de récupération</h1>

                    <form action="{{ route('demandes_recuperation.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="date" class="block text-gray-700 dark:text-gray-300">Date</label>
                            <input type="date" name="date" id="date" class="w-full px-4 py-2 border rounded text-gray-700 dark:text-gray-300" required>
                            @error('date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                             @enderror
                        </div>
                        <div class="mb-4">
                            <label for="heures_travaillees" class="block text-gray-700 dark:text-gray-300">Heures travaillées</label>
                            <input type="number" name="heures_travaillees" id="heures_travaillees" class="w-full px-4 py-2 border rounded text-gray-700 dark:text-gray-300" step="0.5" required>
                            @error('heures_travaillees')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                             @enderror
                        </div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Soumettre
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>