<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Détails de l'Utilisateur
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Prénom:</label>
                        <p class="text-gray-800 dark:text-gray-200">{{ $user->first_name }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Nom:</label>
                        <p class="text-gray-800 dark:text-gray-200">{{ $user->last_name }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Email:</label>
                        <p class="text-gray-800 dark:text-gray-200">{{ $user->email }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Téléphone:</label>
                        <p class="text-gray-800 dark:text-gray-200">{{ $user->phone }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Date de Naissance:</label>
                        <p class="text-gray-800 dark:text-gray-200">{{ $user->date_of_birth }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Adresse:</label>
                        <p class="text-gray-800 dark:text-gray-200">{{ $user->address }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Date de Recrutement:</label>
                        <p class="text-gray-800 dark:text-gray-200">{{ $user->recrut_date }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Type de Contrat:</label>
                        <p class="text-gray-800 dark:text-gray-200">{{ $user->contract_type }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Salaire:</label>
                        <p class="text-gray-800 dark:text-gray-200">{{ $user->salary }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Statut:</label>
                        <p class="text-gray-800 dark:text-gray-200">{{ $user->status ? 'Actif' : 'Inactif' }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Département:</label>
                        <p class="text-gray-800 dark:text-gray-200">{{ $user->department ? $user->department->name : 'Aucun' }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Rôle:</label>
                        <p class="text-gray-800 dark:text-gray-200">
                            @foreach($user->roles as $role)
                                {{ $role->name }}
                            @endforeach
                        </p>
                    </div>
                    <div class="flex items-center justify-between">
                        <a href="{{ route('users.edit', $user->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Modifier</a>
                        <a href="{{ route('users.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>