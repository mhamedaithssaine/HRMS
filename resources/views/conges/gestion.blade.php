<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Gestion des Congés
        </h2>
    </x-slot>
   

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <table class="min-w-full bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Employé</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Date de début</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Date de fin</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Raison</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Statut</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($conges as $conge)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $conge->user->first_name }} {{ $conge->user->last_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $conge->date_debut }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $conge->date_fin }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $conge->raison }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">    <span class="
                                        px-2 py-1 rounded-full text-white text-sm font-semibold
                                        {{ $conge->statut == 'approuvé' ? 'bg-green-500' : ($conge->statut == 'rejeté' ? 'bg-red-600' : 'bg-gray-600') }}
                                    ">
                                        {{ $conge->statut }}
                                    </span>
                                </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if (auth()->user()->hasRole('manager'))
                                            <form action="{{ route('conges.managerApprove', $conge) }}" method="POST" class="inline-block">
                                                @csrf
                                                <select name="approbation_manager" class="block w-full max-w-xs mt-1 text-sm form-select">
                                                    <option value="approuvé">Approuver</option>
                                                    <option value="rejeté">Rejeter</option>
                                                </select>
                                                <button type="submit" class="mt-2 bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded flex items-center gap-2 focus:outline-none focus:shadow-outline">
                                                    <i class="fas fa-sync-alt"></i>
                                                </button>                               
                                            </form>
                                          
                                        @endif
                                        
                                        @if (auth()->user()->hasRole('rh'))
                                        <form action="{{ route('conges.rhApprove', $conge) }}" method="POST" class="inline-block">
                                            @csrf
                                            <select name="approbation_rh" onchange="this.form.submit()"  class="block w-full max-w-xs mt-1 text-sm form-select">
                                                <option value="approuvé">Approuver</option>
                                                <option value="rejeté">Rejeter</option>
                                            </select>
                                            <button type="submit" class="mt-2 bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded flex items-center gap-2 focus:outline-none focus:shadow-outline">
                                                <i class="fas fa-sync-alt"></i>
                                            </button>
                                        </form>                                             
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
