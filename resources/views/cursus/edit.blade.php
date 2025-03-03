<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Éditer le cursus
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('cursus.update', $cursu->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="grade" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Grade:</label>
                            <select name="grade" id="grade" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline" required>
                                @foreach($grades as $grade)
                                    <option value="{{ $grade }}" {{ $cursu->grade == $grade ? 'selected' : '' }}>{{ $grade }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="date" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Date:</label>
                            <input type="date" name="date" id="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline" value="{{ $cursu->date }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="campus" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Campus:</label>
                            <input type="text" name="campus" id="campus" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline" value="{{ $cursu->campus }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="contrat" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Contrat:</label>
                            <select name="contrat" id="contrat" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline" required>
                                @foreach($contracts as $contract)
                                    <option value="{{ $contract->id }}" {{ $cursu->contrat == $contract->id ? 'selected' : '' }}>{{ $contract->type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="formation" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Formation:</label>
                            <input type="text" name="formation" id="formation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline" value="{{ $cursu->formation }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="position" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Position:</label>
                            <input type="text" name="position" id="position" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline" value="{{ $cursu->position }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="remarques" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Remarques:</label>
                            <textarea name="remarques" id="remarques" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">{{ $cursu->remarques }}</textarea>
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Mettre à jour</button>
                            <a href="{{ route('users.show', $cursu->user_id) }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
