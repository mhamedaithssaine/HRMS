<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Gestion des Départements
        </h2>
    </x-slot>
<div class="max-w-2xl mx-auto mt-10">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">Ajouter un Département</h2>

    <form action="{{ route('departments.store') }}" method="POST" class="bg-white dark:bg-gray-800 p-6 shadow-lg rounded-lg">
        @csrf
        <div class="mb-6">
            <label for="name" class="block text-gray-700 dark:text-gray-300 font-medium">Nom du Département</label>
            <input type="text" name="name" id="name" class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100" value="{{ old('name') }}" required>
            @error('name')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="description" class="block text-gray-700 dark:text-gray-300 font-medium">Description</label>
            <textarea name="description" id="description" class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition duration-300">
            Enregistrer
        </button>
    </form>
</div>
</x-app-layout>