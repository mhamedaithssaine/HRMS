{{-- {{ dd($cursus->id) }} --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Modifier le cursus
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('cursus.update', ['cursus' => $cursus->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="grade" class="block text-sm font-medium text-gray-700">Grade</label>
                            <select id="grade" name="grade" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade }}" {{ $cursus->grade === $grade ? 'selected' : '' }}>{{ $grade }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="campus" class="block text-sm font-medium text-gray-700">Campus</label>
                            <input type="text" id="campus" name="campus" value="{{ $cursus->campus }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <div class="mb-4">
                            <label for="formation" class="block text-sm font-medium text-gray-700">Formation</label>
                            <input type="text" id="formation" name="formation" value="{{ $cursus->formation }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <div class="mb-4">
                            <label for="department_id" class="block text-sm font-medium text-gray-700">Département</label>
                            <select id="department_id" name="department_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}" {{ $cursus->department_id === $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="emplois_id" class="block text-sm font-medium text-gray-700">Emploi</label>
                            <select id="emplois_id" name="emplois_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($emplois as $emploi)
                                    <option value="{{ $emploi->id }}" {{ $cursus->emplois_id === $emploi->id ? 'selected' : '' }}>{{ $emploi->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="contract_id" class="block text-sm font-medium text-gray-700">Contrat</label>
                            <select id="contract_id" name="contract_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($contracts as $contract)
                                    <option value="{{ $contract->id }}" {{ $cursus->contract_id === $contract->id ? 'selected' : '' }}>{{ $contract->type }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="remarques" class="block text-sm font-medium text-gray-700">Remarques</label>
                            <textarea id="remarques" name="remarques" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ $cursus->remarques }}</textarea>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 transition ease-in-out duration-150">
                                Mettre à jour
                            </button>
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

            departmentSelect.addEventListener('change', function () {
                const departmentId = departmentSelect.value;

                fetch(`/emplois-by-department/${departmentId}`)
                    .then(response => response.json())
                    .then(data => {
                        emploisSelect.innerHTML = '';

                        data.forEach(emploi => {
                            const option = document.createElement('option');
                            option.value = emploi.id;
                            option.text = emploi.name;
                            emploisSelect.add(option);
                        });
                    })
                    .catch(error => console.error('Erreur lors du chargement des emplois:', error));
            });
        });
    </script>
</x-app-layout>