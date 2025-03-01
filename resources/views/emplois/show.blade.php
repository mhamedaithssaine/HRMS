<!-- resources/views/emplois/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Détails de l'Emploi
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-4">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-gray-200">Nom de l'emploi :</h3>
                        <p class="text-gray-600 dark:text-gray-300">{{ $emploi->name }}</p>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-gray-200">Departement :</h3>
                        <p class="text-gray-600 dark:text-gray-300">{{ $emploi->department->name }}</p>
                        <div class="flex justify-center space-x-3">
                            <a href="{{ route('emplois.edit', $emploi->id) }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 btn-primary" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                                Modifier
                            </a>
                            <form action="{{ route('emplois.destroy', $emploi->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 flex items-center" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet emploi?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <a href="{{ route('emplois.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition duration-300">Retour à la liste</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
