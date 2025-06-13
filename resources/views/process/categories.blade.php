@extends('layouts.app')

@section('title', $process->title . ' - Categories')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-gray-900 to-black text-white overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
        <div class="max-w-4xl">
            <!-- Breadcrumb -->
            <nav class="mb-8">
                <ol class="flex items-center space-x-2 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="text-gray-300 hover:text-white transition-colors">
                            Accueil
                        </a>
                    </li>
                    <li class="text-gray-500">/</li>
                    <li class="text-white">{{ $process->title }}</li>
                </ol>
            </nav>

            <h1 class="text-3xl md:text-5xl font-bold leading-tight mb-6">
                {{ $process->title }}
            </h1>
            <p class="text-xl text-gray-200 mb-8 leading-relaxed">
                {{ $process->description }}
            </p>
            <div class="bg-aptiv-orange-600 text-white px-4 py-2 rounded-full inline-block text-sm font-medium">
                {{ $process->categories->count() }} Catégories disponibles
            </div>
        </div>
    </div>
    
    <!-- Background Image/Video placeholder -->
    <div class="absolute inset-0 -z-10">
        <div class="w-full h-full bg-gradient-to-r from-black to-gray-800"></div>
    </div>
</section>

<!-- Categories Section -->
<section class="py-16 lg:py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Catégories du processus</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Explorez toutes les catégories spécialisées de notre {{ strtolower($process->title) }}
            </p>
        </div>

        @if($process->categories->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($process->categories as $category)
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 p-6 border-l-4 border-aptiv-orange-500">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-aptiv-orange-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-aptiv-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-full">
                                #{{ $category->id }}
                            </span>
                        </div>
                        
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">
                            {{ $category->title }}
                        </h3>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">
                                Créé le {{ \Carbon\Carbon::parse($category->create_at)->format('d/m/Y') }}
                            </span>
                            <a href="#" class="text-aptiv-orange-600 hover:text-aptiv-orange-700 font-medium text-sm">
                                Détails →
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-2">Aucune catégorie disponible</h3>
                <p class="text-gray-600 max-w-md mx-auto">
                    Les catégories pour ce processus n'ont pas encore été configurées. Revenez bientôt !
                </p>
                <a href="{{ route('home') }}" class="mt-6 inline-block bg-aptiv-orange-600 text-white px-6 py-3 rounded-lg hover:bg-aptiv-orange-700 transition-colors">
                    Retour à l'accueil
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Back to Processes Section -->
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <a href="{{ route('home') }}" class="inline-flex items-center text-aptiv-orange-600 hover:text-aptiv-orange-700 font-medium">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Retour à tous les processus
            </a>
        </div>
    </div>
</section>
@endsection
