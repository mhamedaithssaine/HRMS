<x-app-layout>
    <x-slot name="header">
        <div class="container mx-auto px-4">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Notifications</h1>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 py-6">
      

        @if ($notifications->isEmpty())
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <p class="text-gray-600 dark:text-gray-400">Aucune nouvelle notification.</p>
            </div>
        @else
        <a href="{{ route('conges.gestion') }}" class="block">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <ul class="space-y-4">
                    @foreach ($notifications as $notification)
                        <li class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                            <div class="flex justify-between items-center">
                                <div class="space-y-3 flex-1">
                                    <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                        {{ $notification->data['message'] }}
                                    </p>
        
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-5 h-5 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <p class="text-gray-700 dark:text-gray-300">
                                            <span class="font-medium">Employé :</span> {{ $notification->data['user_name'] }}
                                        </p>
                                    </div>
        
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-5 h-5 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <p class="text-gray-700 dark:text-gray-300">
                                            <span class="font-medium">Raison :</span> {{ $notification->data['raison'] }}
                                        </p>
                                    </div>
        
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-5 h-5 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <p class="text-gray-700 dark:text-gray-300">
                                            <span class="font-medium">Période :</span>
                                            Du {{ \Carbon\Carbon::parse($notification->data['date_debut'])->format('d/m/Y') }}
                                            au {{ \Carbon\Carbon::parse($notification->data['date_fin'])->format('d/m/Y') }}
                                        </p>
                                    </div>
        
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-5 h-5 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <small class="text-gray-500 dark:text-gray-400">
                                            {{ $notification->created_at->diffForHumans() }}
                                        </small>
                                    </div>
                                </div>
        
                                <div class="flex items-center justify-center ml-4">
                                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </a>
        @endif
    </div>
</x-app-layout>