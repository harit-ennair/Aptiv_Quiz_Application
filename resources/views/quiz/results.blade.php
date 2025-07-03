@extends('layouts.app')

@section('title', 'Résultats du Test - Aptiv')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-aptiv-orange-900 py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Results Header -->
        <div class="text-center mb-8">
            <div class="mb-6">
                @if($test->pourcentage >= 75)
                    <div class="w-24 h-24 mx-auto bg-green-500 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h1 class="text-4xl font-bold text-white mb-2">Félicitations!</h1>
                    <p class="text-xl text-green-300">Excellent résultat</p>
                @elseif($test->pourcentage >= 60)
                    <div class="w-24 h-24 mx-auto bg-yellow-500 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.502 0L4.348 15.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                    </div>
                    <h1 class="text-4xl font-bold text-white mb-2">Bien joué!</h1>
                    <p class="text-xl text-yellow-300">Résultat satisfaisant</p>
                @else
                    <div class="w-24 h-24 mx-auto bg-red-500 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                    <h1 class="text-4xl font-bold text-white mb-2">Test terminé</h1>
                    <p class="text-xl text-red-300">Continuez à vous améliorer</p>
                @endif
            </div>
        </div>

        <!-- Results Card -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden mb-8">
            <!-- Score Display -->
            <div class="bg-gradient-to-r from-aptiv-orange-500 to-aptiv-orange-600 px-8 py-12 text-center">
                <div class="relative">
                    <!-- Circular Progress -->
                    <div class="relative w-48 h-48 mx-auto mb-6">
                        <svg class="w-full h-full transform -rotate-90" viewBox="0 0 200 200">
                            <!-- Background Circle -->
                            <circle cx="100" cy="100" r="80" stroke="rgba(255,255,255,0.2)" stroke-width="8" fill="none"></circle>
                            <!-- Progress Circle -->
                            <circle cx="100" cy="100" r="80" 
                                    stroke="white" 
                                    stroke-width="8" 
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-dasharray="{{ 2 * pi() * 80 }}"
                                    stroke-dashoffset="{{ 2 * pi() * 80 * (1 - $test->pourcentage / 100) }}"
                                    class="transition-all duration-1000 ease-out">
                            </circle>
                        </svg>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center">
                                <div class="text-4xl font-bold text-white">{{ $test->pourcentage }}%</div>
                                <div class="text-white/80 text-sm">Score final</div>
                            </div>
                        </div>
                    </div>
                    
                    <h2 class="text-2xl font-bold text-white mb-2">
                        {{ $test->resultat }} / {{ $test->quzs->count() }} bonnes réponses
                    </h2>
                    <p class="text-white/90">
                        @if($test->pourcentage >= 75)
                            Excellent travail! Vous maîtrisez parfaitement ce sujet.
                        @elseif($test->pourcentage >= 60)
                            Bon travail! Continuez vos efforts pour vous améliorer.
                        @else
                            Continuez à étudier et à vous entraîner pour de meilleurs résultats.
                        @endif
                    </p>
                </div>
            </div>

            <!-- Test Details -->
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Personal Information -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-aptiv-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Informations du candidat
                        </h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Nom complet:</span>
                                <span class="font-medium">{{ $test->user->name }} {{ $test->user->last_name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Identification:</span>
                                <span class="font-medium">{{ $test->user->identification }}</span>
                            </div>                            <div class="flex justify-between">
                                <span class="text-gray-600">Formateur:</span>
                                <span class="font-medium">{{ $test->formateur->name }} {{ $test->formateur->last_name }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Test Information -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-aptiv-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                            Détails du test
                        </h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Date:</span>
                                <span class="font-medium">{{ \Carbon\Carbon::parse($test->create_at)->format('d/m/Y') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Nombre de questions:</span>
                                <span class="font-medium">{{ $test->quzs->count() }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Bonnes réponses:</span>
                                <span class="font-medium text-green-600">{{ $test->resultat }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Mauvaises réponses:</span>
                                <span class="font-medium text-red-600">{{ $test->quzs->count() - $test->resultat }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Performance Analysis -->
        <div class="bg-white rounded-2xl shadow-2xl p-8 mb-8">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
                <svg class="w-7 h-7 mr-3 text-aptiv-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
                Analyse de performance
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Performance Level -->
                <div class="text-center p-6 rounded-xl {{ $test->pourcentage >= 75 ? 'bg-green-50 border border-green-200' : ($test->pourcentage >= 60 ? 'bg-yellow-50 border border-yellow-200' : 'bg-red-50 border border-red-200') }}">
                    <div class="text-3xl font-bold {{ $test->pourcentage >= 75 ? 'text-green-600' : ($test->pourcentage >= 60 ? 'text-yellow-600' : 'text-red-600') }} mb-2">
                        @if($test->pourcentage >= 75)
                            A
                        @elseif($test->pourcentage >= 60)
                            B
                        @else
                            C
                        @endif
                    </div>
                    <p class="text-sm font-medium {{ $test->pourcentage >= 75 ? 'text-green-800' : ($test->pourcentage >= 60 ? 'text-yellow-800' : 'text-red-800') }}">
                        Niveau atteint
                    </p>
                </div>

                <!-- Accuracy -->
                <div class="text-center p-6 rounded-xl bg-blue-50 border border-blue-200">
                    <div class="text-3xl font-bold text-blue-600 mb-2">{{ $test->pourcentage }}%</div>
                    <p class="text-sm font-medium text-blue-800">Précision</p>
                </div>

                <!-- Status -->
                <div class="text-center p-6 rounded-xl {{ $test->pourcentage >= 60 ? 'bg-green-50 border border-green-200' : 'bg-red-50 border border-red-200' }}">
                    <div class="text-3xl mb-2">
                        @if($test->pourcentage >= 60)
                            ✅
                        @else
                            ❌
                        @endif
                    </div>
                    <p class="text-sm font-medium {{ $test->pourcentage >= 60 ? 'text-green-800' : 'text-red-800' }}">
                        {{ $test->pourcentage >= 60 ? 'Réussi' : 'Non réussi' }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('home') }}" 
               class="px-8 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors text-center min-w-48">
                Retour à l'accueil
            </a>
            
            <a href="{{ route('quiz.start') }}" 
               class="px-8 py-3 bg-aptiv-orange-500 text-white rounded-lg hover:bg-aptiv-orange-600 transition-colors text-center min-w-48">
                Nouveau test
            </a>
            
            <button onclick="window.print()" 
                    class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-center min-w-48">
                Imprimer les résultats
            </button>
        </div>

        <!-- Certificate Section (if passed) -->
        @if($test->pourcentage >= 60)
        <div class="mt-12 bg-gradient-to-r from-aptiv-orange-500 to-aptiv-orange-600 rounded-2xl p-8 text-center text-white">
            <h3 class="text-2xl font-bold mb-4">🏆 Certificat de réussite</h3>
            <p class="text-lg mb-6">
                Félicitations! Vous avez réussi ce test avec un score de {{ $test->pourcentage }}%.
                Votre certificat sera disponible sous peu.
            </p>
            <div class="bg-white/20 rounded-lg p-4 max-w-md mx-auto">
                <p class="text-sm">
                    Certificat ID: #{{ str_pad($test->id, 6, '0', STR_PAD_LEFT) }}
                </p>
                <p class="text-sm">
                    Date: {{ \Carbon\Carbon::parse($test->create_at)->format('d/m/Y') }}
                </p>
            </div>
        </div>
        @endif
    </div>
</div>

<style>
@media print {
    .no-print {
        display: none !important;
    }
    
    body {
        background: white !important;
    }
    
    .bg-gradient-to-br {
        background: white !important;
    }
}
</style>
@endsection
