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

<!-- Categories Management Section -->
<section class="py-8 lg:py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Categories Section -->
        <div class="space-y-6">
            <!-- Header -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <h2 class="text-xl lg:text-2xl font-bold text-gray-900">Catégories du Processus</h2>
                        <p class="text-gray-600 text-sm lg:text-base mt-1">{{ $process->title }} - {{ $process->categories->count() }} catégories disponibles</p>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <div class="relative">
                            <input type="text" id="category-search" placeholder="Rechercher une catégorie..." 
                                   class="w-full sm:w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-aptiv-orange-500 focus:border-transparent text-sm">
                            <svg class="absolute left-3 top-2.5 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <select id="status-filter" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-aptiv-orange-500 focus:border-transparent text-sm">
                            <option value="">Tous les statuts</option>
                            <option value="active">Avec questions</option>
                            <option value="empty">Sans questions</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Categories Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center">
                        <div class="p-2 bg-aptiv-orange-100 rounded-lg">
                            <svg class="w-6 h-6 text-aptiv-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Catégories</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $process->categories->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center">
                        <div class="p-2 bg-green-100 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Avec Questions</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $process->categories->where('quzs_count', '>', 0)->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center">
                        <div class="p-2 bg-yellow-100 rounded-lg">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Sans Questions</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $process->categories->where('quzs_count', '<=', 0)->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Questions</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $process->categories->sum('quzs_count') ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            </div>

            @if($process->categories->count() > 0)
                <!-- Categories Grid -->
                <div id="categories-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($process->categories as $category)
                        <div class="category-card bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition-all duration-300 overflow-hidden" data-category-title="{{ strtolower($category->title) }}" data-status="{{ ($category->quzs_count ?? 0) > 0 ? 'active' : 'empty' }}">
                            <!-- Card Header -->
                            <div class="p-6 pb-4">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="w-12 h-12 bg-aptiv-orange-100 rounded-xl flex items-center justify-center">
                                        <svg class="w-6 h-6 text-aptiv-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                        </svg>
                                    </div>
                                    <span class="text-xs text-gray-500 bg-gray-100 px-3 py-1 rounded-full font-medium">
                                        ID: {{ $category->id }}
                                    </span>
                                </div>
                                
                                <h3 class="text-lg font-semibold text-gray-900 mb-3 line-clamp-2">
                                    {{ $category->title }}
                                </h3>
                                
                                <div class="flex items-center space-x-2 mb-4">
                                    @if(($category->quzs_count ?? 0) > 0)
                                        <span class="text-sm text-green-700 bg-green-100 px-3 py-1 rounded-full font-medium">
                                            {{ $category->quzs_count }} questions
                                        </span>
                                    @else
                                        <span class="text-sm text-yellow-700 bg-yellow-100 px-3 py-1 rounded-full font-medium">
                                            Aucune question
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Card Footer -->
                            <div class="px-6 pb-6 pt-2">
                                <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                                    <span>Créé le {{ \Carbon\Carbon::parse($category->create_at)->format('d/m/Y') }}</span>
                                </div>
                                
                                <div class="flex space-x-2">
                                    @if(($category->quzs_count ?? 0) > 0)
                                        <a href="{{ route('quiz.start', ['category_id' => $category->id]) }}" 
                                           class="flex-1 bg-aptiv-orange-600 hover:bg-aptiv-orange-700 text-white px-4 py-2 rounded-lg font-medium text-sm transition-colors text-center">
                                            Démarrer Test
                                        </a>
                                    @else
                                        <button disabled 
                                                class="flex-1 bg-gray-300 text-gray-500 px-4 py-2 rounded-lg font-medium text-sm cursor-not-allowed text-center">
                                            Pas de questions
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Aucune catégorie disponible</h3>
                    <p class="text-gray-500 mb-4">Les catégories pour ce processus n'ont pas encore été configurées.</p>
                    <a href="{{ route('home') }}" class="bg-aptiv-orange-600 text-white px-6 py-3 rounded-lg hover:bg-aptiv-orange-700 transition-colors font-medium">
                        Retour à l'accueil
                    </a>
                </div>
            @endif
        </div>
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

<script>
// Categories filtering functionality
document.addEventListener('DOMContentLoaded', function() {
    const categorySearch = document.getElementById('category-search');
    const statusFilter = document.getElementById('status-filter');
    
    function filterCategories() {
        const searchTerm = categorySearch.value.toLowerCase();
        const statusValue = statusFilter.value;
        const categoryCards = document.querySelectorAll('.category-card');
        
        categoryCards.forEach(card => {
            const title = card.getAttribute('data-category-title');
            const status = card.getAttribute('data-status');
            
            const matchesSearch = title.includes(searchTerm);
            const matchesStatus = statusValue === '' || status === statusValue;
            
            if (matchesSearch && matchesStatus) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
        
        // Check if any categories are visible
        const visibleCards = document.querySelectorAll('.category-card[style="display: block"], .category-card:not([style*="display: none"])');
        const grid = document.getElementById('categories-grid');
        const emptyMessage = document.getElementById('no-results-message');
        
        if (visibleCards.length === 0 && grid) {
            if (!emptyMessage) {
                const messageDiv = document.createElement('div');
                messageDiv.id = 'no-results-message';
                messageDiv.className = 'col-span-full bg-white rounded-xl shadow-sm border border-gray-200 p-8 text-center';
                messageDiv.innerHTML = `
                    <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Aucune catégorie trouvée</h3>
                    <p class="text-gray-500">Essayez de modifier vos critères de recherche.</p>
                `;
                grid.appendChild(messageDiv);
            }
        } else if (emptyMessage) {
            emptyMessage.remove();
        }
    }
    
    if (categorySearch) {
        categorySearch.addEventListener('input', filterCategories);
    }
    
    if (statusFilter) {
        statusFilter.addEventListener('change', filterCategories);
    }
});
</script>
@endsection