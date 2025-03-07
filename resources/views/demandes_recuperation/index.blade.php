<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Demandes de Récupération
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold">Demandes de récupération</h1>
                        @if (Auth::user()->hasRole('emplyee') || Auth::user()->hasRole('manager'))
                        <a href="{{ route('demandes_recuperation.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Créer une demande
                        </a>
                        @endif 
                    </div>

                    <table class="min-w-full bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Utilisateur</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Date</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Heures travaillées</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Statut</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($demandes as $demande)
                                <tr>
                                    <td class="px-4 py-2">{{ $demande->user->first_name }} {{ $demande->user->last_name }}</td>
                                    <td class="px-4 py-2">{{ $demande->date->format('d/m/Y') }}</td>
                                    <td class="px-4 py-2">{{ floatval($demande->heures_travaillees) }} heures</td>
                                    <td class="px-4 py-2">
                                        <span class="px-2 py-1 rounded
                                            @if($demande->statut == 'approuvé') bg-green-100 text-green-700
                                            @elseif($demande->statut == 'rejeté') bg-red-100 text-red-700
                                            @else bg-yellow-100 text-yellow-700
                                            @endif">
                                            {{ $demande->statut }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2">
                                        @if (Auth::user()->hasRole('rh'))
                                            <form action="{{ route('demandes_recuperation.updateStatut', $demande->id) }}" method="POST" class="inline">
                                                @csrf
                                                <select name="statut" onchange="this.form.submit()" class="px-2 py-1 rounded border">
                                                    <option value="approuvé" {{ $demande->statut == 'approuvé' ? 'selected' : '' }}>Approuvé</option>
                                                    <option value="rejeté" {{ $demande->statut == 'rejeté' ? 'selected' : '' }}>Rejeté</option>
                                                </select>
                                                <button type="submit" class="mt-2 bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded flex items-center gap-2 focus:outline-none focus:shadow-outline">
                                                    <i class="fas fa-sync-alt"></i>
                                                </button>
                                            </form>
                                        @else 
                                        <a href="{{ route('demandes_recuperation.show', $demande->id) }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                            </svg>
                                            Voir
                                        </a>
                                        
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>