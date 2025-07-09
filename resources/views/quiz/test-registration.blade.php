@extends('layouts.app')

@section('title', 'Démarrer un Test - Aptiv')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-aptiv-orange-900 py-12">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-white mb-4">
                Démarrer votre Test
            </h1>
            <p class="text-gray-300 text-lg">
                Veuillez remplir vos informations pour commencer le test
            </p>
            @if(isset($selectedCategoryId) && $selectedCategoryId)
                @php
                    $selectedCategory = $categories->firstWhere('id', $selectedCategoryId);
                @endphp
                @if($selectedCategory)
                    <div class="mt-4 bg-aptiv-orange-600/20 border border-aptiv-orange-500 rounded-lg p-3 max-w-md mx-auto">
                        <p class="text-aptiv-orange-200 text-sm">
                            ✅ Catégorie sélectionnée: <strong>{{ $selectedCategory->title }}</strong>
                        </p>
                    </div>
                @endif
            @endif
        </div>

        <!-- Registration Form -->
        <div class="bg-white rounded-2xl shadow-2xl p-8">
            @if($errors->any())
                <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('quiz.register') }}" method="POST" id="testRegistrationForm">
                @csrf
                
                <!-- Personal Information -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-aptiv-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Informations Personnelles
                    </h3>
                      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Prénom <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" id="name" required 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-aptiv-orange-500 focus:border-aptiv-orange-500 transition-colors"
                                   placeholder="Votre prénom"
                                   value="{{ old('name') }}">
                        </div>
                        
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">
                                Nom de famille <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="last_name" id="last_name" required 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-aptiv-orange-500 focus:border-aptiv-orange-500 transition-colors"
                                   placeholder="Votre nom de famille"
                                   value="{{ old('last_name') }}">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 gap-6 mt-6">
                        <div>
                            <label for="identification" class="block text-sm font-medium text-gray-700 mb-2">
                                Numéro d'identification <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="identification" id="identification" required 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-aptiv-orange-500 focus:border-aptiv-orange-500 transition-colors"
                                   placeholder="Votre numéro d'identification"
                                   value="{{ old('identification') }}">
                        </div>
                    </div>
                </div>

                <!-- Test Configuration -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-aptiv-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                        Configuration du Test
                    </h3>                    
                    <!-- Category field (hidden) -->
                    <div style="display: none;">
                        <select name="category_id" id="category_id" required>
                            <option value="">Sélectionner une catégorie</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                        data-process-id="{{ $category->process_id }}"
                                        {{ (old('category_id') == $category->id || (isset($selectedCategoryId) && $selectedCategoryId == $category->id)) ? 'selected' : '' }}>
                                    {{ $category->title }} ({{ $category->process->title }})
                                </option>
                            @endforeach
                        </select>
                        <!-- Champ caché pour process_id -->
                        <input type="hidden" name="process_id" id="process_id" value="{{ old('process_id') }}">
                    </div>
                    
                    <!-- Display selected category info -->
                    @if(isset($selectedCategoryId) && $selectedCategoryId)
                    <div class="bg-aptiv-orange-100 border border-aptiv-orange-300 rounded-lg p-3 mb-4">
                        <p class="text-aptiv-orange-800 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-aptiv-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Catégorie sélectionnée: <strong class="ml-1">{{ $categories->firstWhere('id', $selectedCategoryId)->title }}</strong>
                        </p>
                    </div>
                    @endif
                    
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="formateur_id" class="block text-sm font-medium text-gray-700 mb-2">
                                Formateur <span class="text-red-500">*</span>
                            </label>
                            <select name="formateur_id" id="formateur_id" required 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-aptiv-orange-500 focus:border-aptiv-orange-500 transition-colors">
                                <option value="">Sélectionner un formateur</option>
                                @foreach($formateurs as $formateur)
                                    <option value="{{ $formateur->id }}" {{ old('formateur_id') == $formateur->id ? 'selected' : '' }}>
                                        {{ $formateur->name }} {{ $formateur->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-between">
                    <a href="{{ route('home') }}" 
                       class="text-gray-600 hover:text-gray-800 transition-colors flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Retour à l'accueil
                    </a>
                    
                    <button type="submit" 
                            class="bg-gradient-to-r from-aptiv-orange-500 to-aptiv-orange-600 text-white px-8 py-3 rounded-lg font-semibold hover:from-aptiv-orange-600 hover:to-aptiv-orange-700 transform hover:scale-105 transition-all duration-200 shadow-lg">
                        Démarrer le Test
                        <svg class="w-5 h-5 ml-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </button>
                </div>
            </form>
        </div>        <!-- Info Section -->
        <div class="mt-8 bg-white/10 backdrop-blur-sm rounded-xl p-6 text-white">
            <h4 class="font-semibold mb-3 flex items-center">
                <svg class="w-5 h-5 mr-2 text-aptiv-orange-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Informations importantes
            </h4>
            <ul class="space-y-2 text-sm text-gray-300">
                <li>• Assurez-vous d'avoir une connexion internet stable</li>
                <li>• Le test sera automatiquement sauvegardé</li>
                <li>• Les résultats seront calculés automatiquement</li>
                <li>• Vous ne pouvez pas revenir en arrière une fois le test commencé</li>
                <li>• <strong>Si vous avez déjà passé ce test, votre ancien résultat sera remplacé par le nouveau</strong></li>
                <li>• <strong>Votre mot de passe sera automatiquement votre numéro d'identification</strong></li>
            </ul>
        </div>
    </div>
</div>

<script>
// Add warning area after the form
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('testRegistrationForm');
    const identificationInput = document.getElementById('identification');
    const categorySelect = document.getElementById('category_id');
    const processIdInput = document.getElementById('process_id');
    
    // Ensure category is selected automatically
    function ensureCategorySelected() {
        if (categorySelect.options.length > 1 && !categorySelect.value) {
            // If no category is selected but we have options, select the first non-empty option
            for (let i = 0; i < categorySelect.options.length; i++) {
                if (categorySelect.options[i].value) {
                    categorySelect.selectedIndex = i;
                    break;
                }
            }
        }
        updateProcessId();
    }
    
    // Function to update process_id automatically
    function updateProcessId() {
        const selectedOption = categorySelect.options[categorySelect.selectedIndex];
        if (selectedOption && selectedOption.dataset.processId) {
            processIdInput.value = selectedOption.dataset.processId;
        } else {
            processIdInput.value = '';
        }
    }
    
    // Call functions when page loads and when category changes
    ensureCategorySelected();
    categorySelect.addEventListener('change', updateProcessId);
    
    // Create warning area
    const warningArea = document.createElement('div');
    warningArea.id = 'test-history-warning';
    warningArea.className = 'hidden mb-6 p-4 bg-yellow-100 border border-yellow-400 text-yellow-700 rounded-lg';
    form.insertBefore(warningArea, form.firstChild);
    
    // Function to check test history
    function checkTestHistory() {
        const identification = identificationInput.value;
        const categoryId = categorySelect.value;
        
        if (!identification || !categoryId) {
            warningArea.classList.add('hidden');
            return;
        }
        
        // AJAX request to check history
        fetch('{{ route("quiz.api.check_history") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                identification: identification,
                category_id: categoryId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.has_previous_test) {
                warningArea.innerHTML = `
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-yellow-600 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-yellow-800">Test déjà passé</h4>
                            <p class="text-sm">${data.message}</p>
                        </div>
                    </div>
                `;
                warningArea.classList.remove('hidden');
            } else {
                warningArea.classList.add('hidden');
            }
        })
        .catch(error => {
            console.error('Error checking test history:', error);
            warningArea.classList.add('hidden');
        });
    }
    
    // Add event listeners
    identificationInput.addEventListener('blur', checkTestHistory);
    categorySelect.addEventListener('change', checkTestHistory);
      // Form submission handler
    form.addEventListener('submit', function(e) {
        const categoryId = document.getElementById('category_id').value;
        const formateurId = document.getElementById('formateur_id').value;
        
        if (!formateurId) {
            e.preventDefault();
            alert('Veuillez sélectionner un formateur.');
            return;
        }
        
        if (!categoryId) {
            e.preventDefault();
            alert('Erreur: Aucune catégorie sélectionnée. Veuillez rafraîchir la page.');
            return;
        }
        
        // Check if warning is visible (user has previous test)
        const warningVisible = !warningArea.classList.contains('hidden');
        if (warningVisible) {
            const confirmation = confirm('Vous avez déjà passé ce test. Êtes-vous sûr de vouloir le refaire ? Votre ancien résultat sera définitivement remplacé.');
            if (!confirmation) {
                e.preventDefault();
                return;
            }
        }
        
        // Show loading state
        const submitBtn = e.target.querySelector('button[type="submit"]');
        submitBtn.innerHTML = `
            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Démarrage du test...
        `;
        submitBtn.disabled = true;
    });
});
</script>
@endsection
