<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-gray-100">
            Détails de l'Utilisateur
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-50/50 dark:bg-gray-900/50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8 flex items-center justify-between">
                <div>
                  
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        Informations personnelles et professionnelles
                    </p>
                </div>
                <a href="{{ route('users.index') }}" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 border border-gray-300 transition-colors">
                    <span>←</span> Retour à la liste
                </a>
            </div>

            <div class="space-y-6">
                <!-- Personal Information -->
                <section>
                    <div class="flex items-center mb-6">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                            Informations Personnelles
                        </h2>
                        <div class="flex-grow h-px bg-gray-200 dark:bg-gray-700 ml-4"></div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- User Info Card -->
                        <div class="flex items-start space-x-4 p-4 rounded-lg bg-white dark:bg-gray-800 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <div class="p-2 rounded-full bg-primary/10 dark:bg-primary/5">
                                <svg class="w-5 h-5 text-primary dark:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nom Complet</dt>
                                <dd class="mt-1 text-base font-semibold text-gray-900 dark:text-gray-100">{{ $user->first_name }} {{ $user->last_name }}</dd>
                            </div>
                        </div>

                        <!-- Email Card -->
                        <div class="flex items-start space-x-4 p-4 rounded-lg bg-white dark:bg-gray-800 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <div class="p-2 rounded-full bg-primary/10 dark:bg-primary/5">
                                <svg class="w-5 h-5 text-primary dark:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Email</dt>
                                <dd class="mt-1 text-base font-semibold text-gray-900 dark:text-gray-100">{{ $user->email }}</dd>
                            </div>
                        </div>

                        <!-- Phone Card -->
                        <div class="flex items-start space-x-4 p-4 rounded-lg bg-white dark:bg-gray-800 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <div class="p-2 rounded-full bg-primary/10 dark:bg-primary/5">
                                <svg class="w-5 h-5 text-primary dark:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Téléphone</dt>
                                <dd class="mt-1 text-base font-semibold text-gray-900 dark:text-gray-100">{{ $user->phone }}</dd>
                            </div>
                        </div>

                        <!-- Birth Date Card -->
                        <div class="flex items-start space-x-4 p-4 rounded-lg bg-white dark:bg-gray-800 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <div class="p-2 rounded-full bg-primary/10 dark:bg-primary/5">
                                <svg class="w-5 h-5 text-primary dark:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Date de naissance</dt>
                                <dd class="mt-1 text-base font-semibold text-gray-900 dark:text-gray-100">{{ $user->date_of_birth->format('d/m/Y') }}</dd>
                            </div>
                        </div>

                        <!-- Address Card -->
                        <div class="flex items-start space-x-4 p-4 rounded-lg bg-white dark:bg-gray-800 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <div class="p-2 rounded-full bg-primary/10 dark:bg-primary/5">
                                <svg class="w-5 h-5 text-primary dark:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Adresse</dt>
                                <dd class="mt-1 text-base font-semibold text-gray-900 dark:text-gray-100">{{ $user->address }}</dd>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Professional Information -->
                <section>
                    <div class="flex items-center mb-6">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                            Informations Professionnelles
                        </h2>
                        <div class="flex-grow h-px bg-gray-200 dark:bg-gray-700 ml-4"></div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Department Card -->
                        <div class="flex items-start space-x-4 p-4 rounded-lg bg-white dark:bg-gray-800 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <div class="p-2 rounded-full bg-primary/10 dark:bg-primary/5">
                                <svg class="w-5 h-5 text-primary dark:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Département</dt>
                                <dd class="mt-1 text-base font-semibold text-gray-900 dark:text-gray-100">{{ $user->department->name }}</dd>
                            </div>
                        </div>

                        <!-- Job Card -->
                        <div class="flex items-start space-x-4 p-4 rounded-lg bg-white dark:bg-gray-800 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <div class="p-2 rounded-full bg-primary/10 dark:bg-primary/5">
                                <svg class="w-5 h-5 text-primary dark:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Emploi</dt>
                                <dd class="mt-1 text-base font-semibold text-gray-900 dark:text-gray-100">{{ $user->emplois->title }}</dd>
                            </div>
                        </div>

                        <!-- Contract Card -->
                        <div class="flex items-start space-x-4 p-4 rounded-lg bg-white dark:bg-gray-800 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <div class="p-2 rounded-full bg-primary/10 dark:bg-primary/5">
                                <svg class="w-5 h-5 text-primary dark:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Type de Contrat</dt>
                                <dd class="mt-1 text-base font-semibold text-gray-900 dark:text-gray-100">{{ $user->contract->type }}</dd>
                            </div>
                        </div>

                        <!-- Recruitment Date Card -->
                        <div class="flex items-start space-x-4 p-4 rounded-lg bg-white dark:bg-gray-800 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <div class="p-2 rounded-full bg-primary/10 dark:bg-primary/5">
                                <svg class="w-5 h-5 text-primary dark:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Date de recrutement</dt>
                                <dd class="mt-1 text-base font-semibold text-gray-900 dark:text-gray-100">{{ $user->recrut_date->format('d/m/Y') }}</dd>
                            </div>
                        </div>

                        <!-- Salary Card -->
                        <div class="flex items-start space-x-4 p-4 rounded-lg bg-white dark:bg-gray-800 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <div class="p-2 rounded-full bg-primary/10 dark:bg-primary/5">
                                <svg class="w-5 h-5 text-primary dark:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Salaire</dt>
                                <dd class="mt-1 text-base font-semibold text-gray-900 dark:text-gray-100">{{ $user->salary }} €</dd>
                            </div>
                        </div>

                        <!-- Status Card -->
                        <div class="flex items-start space-x-4 p-4 rounded-lg bg-white dark:bg-gray-800 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <div class="p-2 rounded-full bg-primary/10 dark:bg-primary/5">
                                <svg class="w-5 h-5 text-primary dark:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Statut</dt>
                                <dd class="mt-1 text-base font-semibold text-gray-900 dark:text-gray-100">{{ $user->status }}</dd>
                            </div>
                        </div>

                        <!-- Leave Balance Card -->
                        <div class="flex items-start space-x-4 p-4 rounded-lg bg-white dark:bg-gray-800 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <div class="p-2 rounded-full bg-primary/10 dark:bg-primary/5">
                                <svg class="w-5 h-5 text-primary dark:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Solde de congés</dt>
                                <dd class="mt-1 text-base font-semibold text-gray-900 dark:text-gray-100">{{ $soldeConges }} jours</dd>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
