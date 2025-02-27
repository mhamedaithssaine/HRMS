<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Gestion des Départements
        </h2>
    </x-slot>
<div class="max-w-2xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-4">Modifier le Département</h2>

    <form action="{{ route('departments.update', $department->id) }}" method="POST" class="bg-white p-6 shadow-md rounded-lg">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700">Nom du Département</label>
            <input type="text" name="name" class="w-full p-2 border rounded" value="{{ old('name', $department->name) }}" required>
            @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Description</label>
            <textarea name="description" class="w-full p-2 border rounded">{{ old('description', $department->description) }}</textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Mettre à Jour
        </button>
    </form>
</div>
</x-app-layout>
