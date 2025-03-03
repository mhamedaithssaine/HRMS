<x-app-layout>
    <style>
        .timeline {
            position: relative;
            padding: 20px 0;
            display: flex; /* Utiliser flexbox pour aligner les éléments horizontalement */
            align-items: center; /* Centrer verticalement les éléments */
        }
    
        .timeline::before {
            content: '';
            position: absolute;
            height: 2px; /* Changer la largeur en hauteur pour une ligne horizontale */
            background: #007bff;
            left: 0;
            right: 0;
            top: 50%;
            transform: translateY(-50%); /* Centrer verticalement la ligne */
        }
    
        .timeline-item {
            padding: 10px 40px;
            position: relative;
            background: inherit;
            flex: 1; /* Utiliser flex pour distribuer l'espace de manière égale */
            text-align: center; /* Centrer le contenu horizontalement */
        }
    
        .timeline-item::after {
            content: '';
            position: absolute;
            width: 25px;
            height: 25px;
            background: white;
            border: 4px solid #007bff;
            border-radius: 50%;
            top: 0;
            left: 50%;
            transform: translateX(-50%); /* Centrer horizontalement l'icône */
            z-index: 1;
        }
    
        .timeline-icon {
            position: absolute;
            width: 25px;
            height: 25px;
            background: #007bff;
            border-radius: 50%;
            top: 0;
            left: 50%;
            transform: translateX(-50%); /* Centrer horizontalement l'icône */
            z-index: 2;
        }
    
        .timeline-date {
            color: white;
            font-size: 12px;
            font-weight: bold;
            position: absolute;
            top: -25px;
            left: 50%;
            transform: translateX(-50%); /* Centrer horizontalement la date */
            background: #007bff;
            padding: 2px 5px;
            border-radius: 4px;
        }
    
        .timeline-content {
            padding-top: 20px; /* Ajouter un espacement en haut pour éviter le chevauchement */
            position: relative;
        }
    
        .timeline-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }
    
        .timeline-subtitle {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }
    
        .timeline-details {
            font-size: 14px;
            color: #777;
            margin-bottom: 5px;
        }
    </style>
    
    <x-slot name="header">
        <h2 class="text-center font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Cursus de {{ $user->first_name }} {{ $user->last_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <a href="{{ route('cursus.create', $user->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">Ajouter un nouveau cursus</a>

                    <!-- Timeline -->
                    <div class="timeline">
                        @foreach($cursus as $item)
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <span class="timeline-date">{{ \Carbon\Carbon::parse($item->date)->format('m/Y') }}</span>
                                </div>
                                <div class="timeline-content">
                                    <h3 class="timeline-title">{{ $item->grade }}</h3>
                                    <p class="timeline-subtitle">{{ $item->formation }}</p>
                                    <p class="timeline-details">{{ $item->position }}</p>
                                    <a href="{{ route('cursus.edit', $item->id) }}" class="text-blue-600 hover:text-blue-800">Éditer</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>