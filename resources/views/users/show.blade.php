
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-extrabold text-center bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
            Parcours Professionnel de {{ $user->first_name }} {{ $user->last_name }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 py-12">
        <div class="relative">
            {{-- Vertical Timeline Line --}}
            <div class="absolute left-10 md:left-1/2 transform -translate-x-1/2 w-0.5 bg-gradient-to-b from-blue-400 to-purple-600 h-full"></div>

            @if ($cursus->isEmpty())
                <div class="text-center py-16 bg-gray-50 rounded-lg shadow-md">
                    <p class="text-xl text-gray-500">
                        <i class="fas fa-graduation-cap mr-2"></i>
                        Aucun cursus trouvé pour cet utilisateur
                    </p>
                </div>
            @else
                <div class="space-y-12 relative">
                    @foreach ($cursus as $index => $item)
                        <div class="flex items-center w-full">
                            {{-- Alternate sides for timeline entries --}}
                            <div class="{{ $index % 2 == 0 ? 'md:flex-row-reverse' : '' }} flex items-center w-full space-x-4 md:space-x-8">
                                {{-- Timeline Marker --}}
                                <div class="z-10 flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full shadow-lg">
                                    <span class="text-white font-bold">{{ $index + 1 }}</span>
                                </div>

                                {{-- Content Card --}}
                                <div class="flex-grow bg-white border-2 border-gray-100 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 p-6">
                                    <h3 class="text-xl font-bold text-gray-800 mb-3 border-b-2 border-blue-500 pb-2">
                                        {{ $item->grade }}
                                    </h3>

                                    <div class="grid md:grid-cols-2 gap-2 text-gray-600">
                                        <p><span class="font-semibold text-blue-600">Formation:</span> {{ $item->formation }}</p>
                                        <p><span class="font-semibold text-blue-600">Campus:</span> {{ $item->campus }}</p>
                                        <p><span class="font-semibold text-blue-600">Département:</span> {{ $item->department->name }}</p>
                                        <p><span class="font-semibold text-blue-600">Emploi:</span> {{ $item->emplois->name }}</p>
                                        <p><span class="font-semibold text-blue-600">Contrat:</span> {{ $item->contract->type }}</p>
                                    </div>

                                    @if($item->remarques)
                                        <div class="mt-4 bg-gray-50 rounded-lg p-3">
                                            <p class="text-sm text-gray-500 italic">
                                                <i class="fas fa-quote-left mr-2 text-blue-400"></i>
                                                {{ $item->remarques }}
                                            </p>
                                        </div>
                                    @endif

                                    <div class="mt-4 flex justify-end">
                                        <a href="{{ route('cursus.edit', $item->id) }}" class="px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-md hover:opacity-90 transition-all flex items-center">
                                            <i class="fas fa-edit mr-2"></i>
                                            Éditer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- Add New Cursus Button --}}
            <div class="mt-12 text-center">
                <a href="{{ route('cursus.create', $user->id) }}" class="inline-block px-8 py-3 bg-gradient-to-r from-blue-600 to-purple-700 text-white font-bold rounded-full hover:scale-105 transform transition-all shadow-lg">
                    <i class="fas fa-plus-circle mr-2"></i>
                    Ajouter un nouveau cursus
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
