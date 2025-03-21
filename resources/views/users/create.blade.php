<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Ajouter un Utilisateur
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="first_name" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Prénom:</label>
                            <input type="text" name="first_name" id="first_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('first_name') }}" required>
                            @error('first_name')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="last_name" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Nom:</label>
                            <input type="text" name="last_name" id="last_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('last_name') }}" required>
                            @error('last_name')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Email:</label>
                            <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('email') }}" required>
                            @error('email')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Mot de Passe:</label>
                            <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline" required>
                            @error('password')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Confirmer le Mot de Passe:</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Téléphone:</label>
                            <input type="text" name="phone" id="phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('phone') }}">
                            @error('phone')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="date_of_birth" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Date de Naissance:</label>
                            <input type="date" name="date_of_birth" id="date_of_birth" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('date_of_birth') }}">
                            @error('date_of_birth')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="address" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Adresse:</label>
                            <input type="text" name="address" id="address" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('address') }}">
                            @error('address')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="recrut_date" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Date de Recrutement:</label>
                            <input type="date" name="recrut_date" id="recrut_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('recrut_date') }}">
                            @error('recrut_date')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="salary" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Salaire:</label>
                            <input type="number" step="0.01" name="salary" id="salary" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
                            @error('salary')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="status" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Statut:</label>
                            <select name="status" id="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Actif</option>
                                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactif</option>
                            </select>
                            @error('status')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="department_id" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Département:</label>
                            <select name="department_id" id="department_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Sélectionnez un département</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                                @endforeach
                            </select>
                            @error('department_id')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="emplois_id" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Poste:</label>
                            <select name="emplois_id" id="emplois_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Sélectionnez un poste</option>
                            </select>
                            @error('emplois_id')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="contract_id" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Contrat:</label>
                            <select name="contract_id" id="contract_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Sélectionnez un contrat</option>
                                @foreach($contracts as $contract)
                                    <option value="{{ $contract->id }}" {{ old('contract_id') == $contract->id ? 'selected' : '' }}>{{ $contract->type }}</option>
                                @endforeach
                            </select>
                            @error('contract_id')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="role" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Rôle:</label>
                            <select name="role" id="role" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="">Sélectionnez un rôle</option>

                                @foreach($roles as $role)
                                    <option value="{{ $role->name  }}" {{ old('role') == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Ajouter</button>
                            <a href="{{ route('users.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const departmentSelect = document.getElementById('department_id');
            const emploisSelect = document.getElementById('emplois_id');
            const emploisByDepartment = @json($emplois);

            departmentSelect.addEventListener('change', function () {
                const selectedDepartmentId = departmentSelect.value;
                emploisSelect.innerHTML = '<option value="">Sélectionnez un poste</option>';

                if (selectedDepartmentId && emploisByDepartment[selectedDepartmentId]) {
                    emploisByDepartment[selectedDepartmentId].forEach(emploi => {
                        const option = document.createElement('option');
                        option.value = emploi.id;
                        option.textContent = emploi.name;
                        emploisSelect.appendChild(option);
                    });
                }
            });
        });
    </script>
</x-app-layout>