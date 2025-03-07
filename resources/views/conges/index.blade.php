<!-- resources/views/conges/mes-demandes.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Mes Demandes de Congé
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('conges.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Demander un Congé
                        </a>
                    </div>
                    <table class="min-w-full bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Date de début</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Date de fin</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Raison</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Statut</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($conges as $conge)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $conge->date_debut }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $conge->date_fin }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $conge->raison }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap"> <span class="
                                        px-2 py-1 rounded-full text-white text-sm font-semibold
                                        {{ $conge->statut == 'approuvé' ? 'bg-green-500' : ($conge->statut == 'rejeté' ? 'bg-red-600' : 'bg-gray-600') }}
                                    ">
                                        {{ $conge->statut }}
                                    </span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
