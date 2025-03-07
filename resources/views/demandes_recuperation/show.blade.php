<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-gray-100 text-center">
            Détails de la demande de récupération
        </h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 text-center">
            Informations sur la demande et son statut
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Main Content -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                <div class="p-6 space-y-6">
                    @if ($demande)
                        <!-- User Information -->
                        <div class="flex items-start space-x-4 p-4 rounded-lg bg-gray-50 dark:bg-gray-700/50">
                            <div class="p-2 rounded-full bg-primary/10">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Utilisateur</dt>
                                <dd class="mt-1 text-base font-semibold text-gray-900 dark:text-gray-100">
                                    @if ($demande->user)
                                        {{ $demande->user->first_name }} {{ $demande->user->last_name }}
                                    @else
                                        Non associé
                                    @endif
                                </dd>
                            </div>
                        </div>

                        <!-- Request Details Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Date -->
                            <div class="flex items-start space-x-4 p-4 rounded-lg bg-white dark:bg-gray-800 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                                <div class="p-2 rounded-full bg-primary/10">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Date</dt>
                                    <dd class="mt-1 text-base font-semibold text-gray-900 dark:text-gray-100">
                                        {{ $demande->date->format('d/m/Y') }}
                                    </dd>
                                </div>
                            </div>

                            <!-- Heures travaillées -->
                            <div class="flex items-start space-x-4 p-4 rounded-lg bg-white dark:bg-gray-800 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                                <div class="p-2 rounded-full bg-primary/10">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Heures travaillées</dt>
                                    <dd class="mt-1 text-base font-semibold text-gray-900 dark:text-gray-100">
                                      {{  floatval($demande->heures_travaillees)  }} heures
                                    </dd>
                                </div>
                            </div>

                            <!-- Statut avec badge coloré -->
                            <div class="flex items-start space-x-4 p-4 rounded-lg bg-white dark:bg-gray-800 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors md:col-span-2">
                                <div class="p-2 rounded-full bg-primary/10">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Statut</dt>
                                    <dd class="mt-1">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                            @if($demande->statut == 'approuvé') 
                                                bg-green-100 text-green-800 dark:bg-green-800/20 dark:text-green-400
                                            @elseif($demande->statut == 'rejeté')
                                                bg-red-100 text-red-800 dark:bg-red-800/20 dark:text-red-400
                                            @else
                                                bg-yellow-100 text-yellow-800 dark:bg-yellow-800/20 dark:text-yellow-400
                                            @endif">
                                            {{ $demande->statut }}
                                        </span>
                                    </dd>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-8">
                            <p class="text-gray-500 dark:text-gray-400">Aucune demande trouvée.</p>
                        </div>
                    @endif
                </div>

                <!-- Footer with action button -->
                <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700/50 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('demandes_recuperation.index') }}" 
                       class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                        Retour à la liste
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
