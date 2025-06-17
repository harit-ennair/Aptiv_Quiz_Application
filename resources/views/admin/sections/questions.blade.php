<style>
/* Quizizz-style card design */
.question-card {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 16px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    min-height: 200px;
    cursor: pointer;
    border: none;
}

.question-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
}

.question-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.05) 100%);
    pointer-events: none;
}

.question-card.gradient-1 {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.question-card.gradient-2 {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
}

.question-card.gradient-3 {
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
}

.question-card.gradient-4 {
    background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
}

.question-card.gradient-5 {
    background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
}

.question-card.gradient-6 {
    background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
}

.question-text {
    color: white;
    font-weight: 600;
    font-size: 1.1rem;
    line-height: 1.4;
    text-shadow: 0 1px 2px rgba(0,0,0,0.1);
}

.question-meta {
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(10px);
    border-radius: 8px;
    padding: 8px 12px;
    color: white;
    font-size: 0.85rem;
    font-weight: 500;
}

.question-actions {
    background: rgba(255,255,255,0.9);
    backdrop-filter: blur(10px);
    border-radius: 8px;
    padding: 8px;
}

.question-action-btn {
    color: #374151;
    border: 1px solid #d1d5db;
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 0.8rem;
    font-weight: 500;
    transition: all 0.2s ease;
    background: white;
}

.question-action-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.question-action-btn.edit:hover {
    color: #3b82f6;
    border-color: #3b82f6;
}

.question-action-btn.delete:hover {
    color: #ef4444;
    border-color: #ef4444;
}

.question-number {
    position: absolute;
    top: 12px;
    right: 12px;
    background: rgba(255,255,255,0.2);
    color: white;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
}

.answer-option {
    transition: all 0.2s ease;
    border: 2px solid transparent;
}

.answer-option:hover {
    border-color: #ea580c;
    background-color: #fef3e6;
}

.answer-option.correct {
    background-color: #dcfce7;
    border-color: #16a34a;
}

.answer-option.incorrect {
    background-color: #fef2f2;
    border-color: #dc2626;
}

.filter-badge {
    transition: all 0.2s ease;
}

.filter-badge:hover {
    transform: scale(1.05);
}

.stats-card {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.stats-card.orange {
    background: linear-gradient(135deg, #ea580c 0%, #f97316 100%);
}

.stats-card.blue {
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
}

.stats-card.green {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
}

.question-preview {
    max-height: 60px;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.pulse-animation {
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.7; }
}

.slide-in {
    animation: slideIn 0.3s ease-out;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes pulse {
    0%, 100% {
        box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7);
    }
    50% {
        box-shadow: 0 0 0 6px rgba(239, 68, 68, 0);
    }
}

.pulse-animation {
    animation: pulse 2s infinite;
}

/* Loading animation for cards */
.card-loading {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: loading 1.5s infinite;
    border-radius: 16px;
    min-height: 200px;
}

@keyframes loading {
    0% { background-position: 200% 0; }
    100% { background-position: -200% 0; }
}

/* Spinner animation */
.spinner {
    border: 2px solid #f3f3f3;
    border-top: 2px solid #ea580c;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Form styling to match view modal */
.form-section {
    background: white;
    border-radius: 8px;
    border: 1px solid #e5e7eb;
    padding: 1rem;
    margin-bottom: 1rem;
}

.form-section h4 {
    font-weight: 600;
    color: #374151;
    margin-bottom: 0.75rem;
    font-size: 1rem;
}

.form-label {
    display: block;
    font-weight: 500;
    color: #374151;
    margin-bottom: 0.5rem;
    font-size: 0.95rem;
}

.form-input {
    width: 100%;
    padding: 8px 12px;
    border: 2px solid #e5e7eb;
    border-radius: 6px;
    font-size: 0.9rem;
    transition: all 0.2s ease;
    background: #fafafa;
}

.form-input:focus {
    outline: none;
    border-color: #ea580c;
    background: white;
    box-shadow: 0 0 0 2px rgba(234, 88, 12, 0.1);
}

.form-textarea {
    min-height: 80px;
    resize: vertical;
}

.form-select {
    width: 100%;
    padding: 8px 12px;
    border: 2px solid #e5e7eb;
    border-radius: 6px;
    font-size: 0.9rem;
    background: #fafafa;
    transition: all 0.2s ease;
}

.form-select:focus {
    outline: none;
    border-color: #ea580c;
    background: white;
    box-shadow: 0 0 0 2px rgba(234, 88, 12, 0.1);
}

.answer-input-group {
    background: #f8fafc;
    border: 2px solid #e2e8f0;
    border-radius: 8px;
    padding: 0.75rem;
    margin-bottom: 0.5rem;
    transition: all 0.2s ease;
}

.answer-input-group:hover {
    border-color: #cbd5e1;
    background: #f1f5f9;
}

.answer-input-group.correct-answer {
    background: #dcfce7;
    border-color: #16a34a;
}

.answer-radio {
    width: 20px;
    height: 20px;
    accent-color: #ea580c;
}

.answer-text-input {
    flex: 1;
    padding: 8px 12px;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    font-size: 0.9rem;
    background: white;
    transition: all 0.2s ease;
}

.answer-text-input:focus {
    outline: none;
    border-color: #ea580c;
    box-shadow: 0 0 0 2px rgba(234, 88, 12, 0.1);
}

.remove-answer-btn {
    color: #ef4444;
    padding: 6px;
    border-radius: 6px;
    transition: all 0.2s ease;
    background: rgba(239, 68, 68, 0.1);
}

.remove-answer-btn:hover {
    background: rgba(239, 68, 68, 0.2);
    transform: scale(1.05);
}

.add-answer-btn {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white;
    padding: 8px 16px;
    border-radius: 6px;
    font-weight: 500;
    transition: all 0.2s ease;
    border: none;
    box-shadow: 0 2px 4px rgba(16, 185, 129, 0.2);
    font-size: 0.85rem;
}

.add-answer-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(16, 185, 129, 0.3);
}

.form-actions {
    background: #f9fafb;
    border-top: 1px solid #e5e7eb;
    padding: 1rem;
    display: flex;
    justify-content: flex-end;
    gap: 0.75rem;
}

.btn-cancel {
    padding: 8px 16px;
    background: #6b7280;
    color: white;
    border-radius: 6px;
    font-weight: 500;
    transition: all 0.2s ease;
    border: none;
    font-size: 0.9rem;
}

.btn-cancel:hover {
    background: #4b5563;
    transform: translateY(-1px);
}

.btn-save {
    padding: 8px 16px;
    background: linear-gradient(135deg, #ea580c 0%, #dc2626 100%);
    color: white;
    border-radius: 6px;
    font-weight: 500;
    transition: all 0.2s ease;
    border: none;
    box-shadow: 0 2px 4px rgba(234, 88, 12, 0.2);
    font-size: 0.9rem;
}

.btn-save:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(234, 88, 12, 0.3);
}

.help-text {
    font-size: 0.85rem;
    color: #6b7280;
    margin-top: 0.5rem;
    font-style: italic;
}

.required-indicator {
    color: #ef4444;
    font-weight: bold;
}

/* Mobile responsive styles */
@media (max-width: 768px) {
    .question-card {
        margin-bottom: 1rem;
        padding: 1rem;
        min-height: 160px;
    }
    
    .stats-card {
        margin-bottom: 0.5rem;
    }
    
    .question-actions {
        flex-direction: column;
    }
    
    .question-action-btn {
        margin-bottom: 0.25rem;
    }
    
    .form-section {
        padding: 1rem;
        margin-bottom: 1rem;
    }
    
    .form-actions {
        flex-direction: column;
    }
    
    .form-actions button {
        width: 100%;
    }
}
</style>

<!-- Questions Management Section -->
<div class="bg-white rounded-lg shadow-sm">
    <!-- Header -->
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
            <h2 class="text-xl font-semibold text-gray-900">Gestion des Questions</h2>
            <button onclick="openQuestionModal()" class="bg-aptiv-orange-600 hover:bg-aptiv-orange-700 text-white px-4 py-2 rounded-md transition-colors btn-touch inline-flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Ajouter une question
            </button>
        </div>
    </div>

    <!-- Filters Section -->
    <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Process Filter -->
            <div>
                <label for="question-process-filter" class="block text-sm font-medium text-gray-700 mb-2">Processus</label>
                <select id="question-process-filter" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500">
                    <option value="">Tous les processus</option>
                </select>
            </div>

            <!-- Category Filter -->
            <div>
                <label for="question-category-filter" class="block text-sm font-medium text-gray-700 mb-2">Catégorie</label>
                <select id="question-category-filter" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500" disabled>
                    <option value="">Sélectionner d'abord un processus</option>
                </select>
            </div>

            <!-- Search -->
            <div>
                <label for="question-search" class="block text-sm font-medium text-gray-700 mb-2">Rechercher</label>
                <input type="text" id="question-search" placeholder="Rechercher une question..." 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500">
            </div>
        </div>        <!-- Statistics Bar -->
        <div id="questions-stats" class="mt-4 flex flex-wrap gap-4">
            <div class="stats-card orange rounded-lg px-4 py-3 shadow-lg">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <span class="text-sm opacity-90">Total Questions:</span>
                        <span id="total-questions-count" class="font-bold text-lg ml-1">0</span>
                    </div>
                </div>
            </div>
            <div class="stats-card blue rounded-lg px-4 py-3 shadow-lg">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                    </svg>
                    <div>
                        <span class="text-sm opacity-90">Filtrées:</span>
                        <span id="filtered-questions-count" class="font-bold text-lg ml-1">0</span>
                    </div>
                </div>
            </div>
            <div class="stats-card green rounded-lg px-4 py-3 shadow-lg">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    <div>
                        <span class="text-sm opacity-90">Catégorie:</span>
                        <span id="selected-category-name" class="font-bold text-lg ml-1">Aucune</span>
                    </div>
                </div>
            </div>
        </div>        <!-- Action Buttons -->
        <div class="mt-4 flex flex-wrap gap-2">
            <button 
                id="clear-filters-btn"
                onclick="clearFilters()" 
                class="bg-gray-400 cursor-not-allowed opacity-50 text-white px-4 py-2 rounded-md transition-colors text-sm font-medium"
                title="Aucun filtre actif"
                disabled>
                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                Effacer les filtres
            </button>
            <button onclick="refreshQuestions()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition-colors text-sm">
                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
                Actualiser
            </button>
        </div>
    </div>

    <!-- Loading State -->
    <div id="questions-loading" class="px-6 py-8 text-center">
        <div class="inline-flex items-center">
            <div class="spinner mr-3"></div>
            <span class="text-gray-600">Chargement des questions...</span>
        </div>
    </div>

    <!-- Empty State -->
    <div id="questions-empty" class="px-6 py-12 text-center hidden">
        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <h3 class="mt-2 text-sm font-medium text-gray-900">Aucune question trouvée</h3>
        <p class="mt-1 text-sm text-gray-500">Commencez par créer une nouvelle question.</p>
    </div>

    <!-- Filtered Empty State -->
    <div id="questions-filtered-empty" class="px-6 py-12 text-center hidden">
        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
        <h3 class="mt-2 text-sm font-medium text-gray-900">Aucun résultat trouvé</h3>
        <p class="mt-1 text-sm text-gray-500">Essayez de modifier vos critères de recherche.</p>
        <button onclick="clearFilters()" class="mt-3 bg-aptiv-orange-600 hover:bg-aptiv-orange-700 text-white px-4 py-2 rounded-md transition-colors text-sm">
            Effacer les filtres
        </button>
    </div>    <!-- Questions Cards Grid (Quizizz Style) -->
    <div id="questions-cards" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 p-6">
        <!-- Question cards will be populated by JavaScript -->
    </div>
</div>

<!-- Question Modal -->
<div id="question-modal" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
    <div class="modal-body bg-white rounded-lg max-w-3xl w-full mx-4 max-h-screen overflow-y-auto">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 id="question-modal-title" class="text-lg font-medium text-gray-900">Ajouter une question</h3>
        </div>
        
        <form id="question-form" class="space-y-4">
            <input type="hidden" id="question-id">
            
            <div class="p-4 space-y-4">                <!-- Question Text Section -->
                <div class="form-section">
                    <h4 class="font-medium text-gray-900 mb-3">
                        <svg class="w-4 h-4 inline mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Question
                    </h4>
                    
                    <!-- Question Text -->
                    <div class="mb-4">
                        <label for="question-text" class="form-label">Texte de la question (optionnel si image fournie)</label>
                        <textarea id="question-text" name="question_text" rows="3" 
                                  class="form-input form-textarea"
                                  placeholder="Saisissez votre question ici..."></textarea>
                    </div>
                    
                    <!-- Question Image -->
                    <div class="mb-4">
                        <label for="question-image" class="form-label">Image de la question (optionnel si texte fourni)</label>
                        <div class="mt-1">
                            <input type="file" id="question-image" name="image" accept="image/*" 
                                   class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF jusqu'à 2MB</p>
                        </div>
                        
                        <!-- Image Preview -->
                        <div id="image-preview-container" class="mt-3 hidden">
                            <div class="relative inline-block">
                                <img id="image-preview" src="" alt="Prévisualisation" class="max-w-full h-48 object-contain border border-gray-300 rounded-lg">
                                <button type="button" id="remove-image" class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Current Image (for editing) -->
                        <div id="current-image-container" class="mt-3 hidden">
                            <p class="text-sm text-gray-600 mb-2">Image actuelle:</p>
                            <div class="relative inline-block">
                                <img id="current-image" src="" alt="Image actuelle" class="max-w-full h-48 object-contain border border-gray-300 rounded-lg">
                                <button type="button" id="delete-current-image" class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Note about question requirements -->
                    <div class="p-3 bg-blue-50 border border-blue-200 rounded-lg">
                        <div class="flex items-start">
                            <svg class="w-4 h-4 text-blue-600 mt-0.5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div class="text-xs text-blue-700">
                                <p class="font-medium">Important:</p>
                                <p class="mt-1">Au moins un texte ou une image est requis pour la question</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Category Selection Section -->
                <div class="form-section">
                    <h4 class="font-medium text-gray-900 mb-3">
                        <svg class="w-4 h-4 inline mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        Catégorie <span class="required-indicator">*</span>
                    </h4>
                    <label for="question-category" class="form-label">Sélectionner une catégorie</label>
                    <select id="question-category" name="categories_id" required class="form-select">
                        <option value="">Sélectionner une catégorie</option>
                    </select>
                </div>

                <!-- Answers Section -->
                <div class="form-section">
                    <div class="flex justify-between items-center mb-3">
                        <h4 class="font-medium text-gray-900">
                            <svg class="w-4 h-4 inline mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v6a2 2 0 002 2h6a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                            Réponses (2-6) <span class="required-indicator">*</span>
                        </h4>
                        <button type="button" onclick="addAnswer()" class="add-answer-btn">
                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Ajouter
                        </button>
                    </div>
                    
                    <div id="answers-container" class="space-y-2">
                        <!-- Answers will be populated here -->
                    </div>
                    
                    <div class="mt-3 p-2 bg-yellow-50 border border-yellow-200 rounded-lg">
                        <div class="flex items-start">
                            <svg class="w-4 h-4 text-yellow-600 mt-0.5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                            <div class="text-xs text-yellow-700">
                                <p class="font-medium">Important:</p>
                                <p class="mt-1">Une seule réponse correcte • Min 2, Max 6 réponses</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="form-actions">
                <button type="button" onclick="closeQuestionModal()" class="btn-cancel">
                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    Annuler
                </button>
                <button type="submit" class="btn-save">
                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h6a2 2 0 002-2V9a2 2 0 00-2-2h-6a2 2 0 00-2 2v1m2 4h6m0 0v2a2 2 0 01-2 2H9a2 2 0 01-2-2v-2m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v8.001"></path>
                    </svg>
                    Enregistrer
                </button>
            </div>
        </form>    </div>
</div>

<script>
// Questions Management JavaScript
let allQuestions = [];
let filteredQuestions = [];
let allCategories = [];
let allProcesses = [];

// Initialize questions section
function initQuestionsSection() {
    // Save current filter state before reloading
    const currentSearch = document.getElementById('question-search')?.value || '';
    const currentProcess = document.getElementById('question-process-filter')?.value || '';
    const currentCategory = document.getElementById('question-category-filter')?.value || '';
    
    loadProcessesForQuestions().then(() => {
        loadCategoriesForQuestions().then(() => {
            loadQuestions().then(() => {
                // Restore filter state after data is loaded
                if (currentSearch || currentProcess || currentCategory) {
                    const searchInput = document.getElementById('question-search');
                    const processFilter = document.getElementById('question-process-filter');
                    const categoryFilter = document.getElementById('question-category-filter');
                    
                    if (searchInput && currentSearch) searchInput.value = currentSearch;
                    if (processFilter && currentProcess) {
                        processFilter.value = currentProcess;
                        updateCategoryFilter(currentProcess);
                    }
                    if (categoryFilter && currentCategory) {
                        // Wait a bit for category filter to be populated
                        setTimeout(() => {
                            categoryFilter.value = currentCategory;
                            filterQuestions();
                        }, 100);
                    } else if (currentSearch || currentProcess) {
                        filterQuestions();
                    }
                }
            });
        });
    });
}

// Load processes for filter dropdown
async function loadProcessesForQuestions() {
    try {
        const response = await fetch('/admin/api/processes');
        const result = await response.json();
        
        if (result.success) {
            allProcesses = result.data;
            populateProcessFilter(result.data);
        }
        return result.success;
    } catch (error) {
        console.error('Error loading processes:', error);
        return false;
    }
}

// Load categories for question form and filters
async function loadCategoriesForQuestions() {
    try {
        const response = await fetch('/admin/api/categories');
        const result = await response.json();
        
        if (result.success) {
            allCategories = result.data;
            populateQuestionCategoryDropdown(result.data);
        }
        return result.success;
    } catch (error) {
        console.error('Error loading categories:', error);
        return false;
    }
}

// Load questions
async function loadQuestions() {
    const loadingEl = document.getElementById('questions-loading');
    const cardsEl = document.getElementById('questions-cards');
    const emptyEl = document.getElementById('questions-empty');

    showElement(loadingEl);
    hideElement(cardsEl);
    hideElement(emptyEl);

    try {
        const response = await fetch('/admin/api/questions');
        const result = await response.json();

        if (result.success) {
            allQuestions = result.data;
            filteredQuestions = [...allQuestions];
            renderQuestions();
            updateStatistics();
        } else {
            showMessage('Erreur lors du chargement des questions', 'error');
        }
        return result.success;
    } catch (error) {
        showMessage('Une erreur est survenue', 'error');
        console.error('Error:', error);
        return false;
    } finally {
        hideElement(loadingEl);
    }
}

// Populate process filter dropdown
function populateProcessFilter(processes) {
    const select = document.getElementById('question-process-filter');
    if (!select) return;

    // Clear existing options except the first one
    select.innerHTML = '<option value="">Tous les processus</option>';
    
    processes.forEach(process => {
        const option = document.createElement('option');
        option.value = process.id;
        option.textContent = `${process.title} (${process.categories_count || 0} catégories)`;
        select.appendChild(option);
    });
}

// Populate question category dropdown
function populateQuestionCategoryDropdown(categories, selectedProcessId = null) {
    const select = document.getElementById('question-category');
    if (!select) return;

    select.innerHTML = '<option value="">Sélectionner une catégorie</option>';
    
    // If a process is selected in the filter, only show categories for that process
    let categoriesToShow = categories;
    if (selectedProcessId) {
        categoriesToShow = categories.filter(category => category.process_id == selectedProcessId);
    }
    
    categoriesToShow.forEach(category => {
        const option = document.createElement('option');
        option.value = category.id;
        option.textContent = `${category.title} (${category.process ? category.process.title : 'N/A'})`;
        select.appendChild(option);
    });
}

// Handle process filter change
document.addEventListener('DOMContentLoaded', function() {
    const processFilter = document.getElementById('question-process-filter');
    const categoryFilter = document.getElementById('question-category-filter');
    const searchInput = document.getElementById('question-search');

    if (processFilter) {
        processFilter.addEventListener('change', function() {
            const processId = this.value;
            updateCategoryFilter(processId);
            filterQuestions();
        });
    }

    if (categoryFilter) {
        categoryFilter.addEventListener('change', filterQuestions);
    }

    if (searchInput) {
        searchInput.addEventListener('input', debounce(filterQuestions, 300));
    }
    
    // Initialize the questions section when DOM is ready
    initQuestionsSection();
    
    // Initialize button states
    setTimeout(() => {
        updateClearFiltersButton();
    }, 500);
});

// Debounce function to improve search performance
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Update category filter based on selected process
function updateCategoryFilter(processId) {
    const categoryFilter = document.getElementById('question-category-filter');
    if (!categoryFilter) return;

    if (!processId) {
        categoryFilter.innerHTML = '<option value="">Sélectionner d\'abord un processus</option>';
        categoryFilter.disabled = true;
        return;
    }

    categoryFilter.disabled = false;
    categoryFilter.innerHTML = '<option value="">Toutes les catégories</option>';

    const filteredCategories = allCategories.filter(cat => cat.process_id == processId);
    filteredCategories.forEach(category => {
        const option = document.createElement('option');
        option.value = category.id;
        option.textContent = category.title;
        categoryFilter.appendChild(option);
    });
}

// Filter questions based on search and filters
function filterQuestions() {
    try {
        const searchInput = document.getElementById('question-search');
        const processFilter = document.getElementById('question-process-filter');
        const categoryFilter = document.getElementById('question-category-filter');
        
        const searchTerm = searchInput?.value.toLowerCase() || '';
        const processId = processFilter?.value || '';
        const categoryId = categoryFilter?.value || '';

        filteredQuestions = allQuestions.filter(question => {
            if (!question || !question.question_text) return false;
            
            const searchMatch = question.question_text.toLowerCase().includes(searchTerm);
            
            const categoryMatch = !categoryId || question.categories_id == categoryId;
            
            const processMatch = !processId || (question.category && question.category.process_id == processId);

            return searchMatch && categoryMatch && processMatch;
        });

        renderQuestions();
        updateStatistics();
    } catch (error) {
        console.error('Error filtering questions:', error);
        showMessage('Erreur lors du filtrage des questions', 'error');
    }
}

// Clear all filters
function clearFilters() {
    const clearBtn = document.getElementById('clear-filters-btn');
    
    // Prevent execution if button is disabled
    if (clearBtn?.disabled) {
        return;
    }
    
    // Force clear all filter inputs
    const searchInput = document.getElementById('question-search');
    const processFilter = document.getElementById('question-process-filter');
    const categoryFilter = document.getElementById('question-category-filter');
    
    if (searchInput) searchInput.value = '';
    if (processFilter) processFilter.value = '';
    if (categoryFilter) {
        categoryFilter.value = '';
        categoryFilter.disabled = true;
        categoryFilter.innerHTML = '<option value="">Sélectionner d\'abord un processus</option>';
    }
    
    // Clear any stored filter state
    sessionStorage.removeItem('questionFilters');
    localStorage.removeItem('questionFilters');
    
    // Reset filtered questions to show all
    filteredQuestions = [...allQuestions];
    renderQuestions();
    updateStatistics();
    
    // Show confirmation message
    showMessage('Filtres effacés avec succès', 'success');
}

// Update statistics
function updateStatistics() {
    document.getElementById('total-questions-count').textContent = allQuestions.length;
    document.getElementById('filtered-questions-count').textContent = filteredQuestions.length;
    
    const categoryFilter = document.getElementById('question-category-filter');
    const selectedCategoryId = categoryFilter?.value;
    const selectedCategory = allCategories.find(cat => cat.id == selectedCategoryId);
    document.getElementById('selected-category-name').textContent = selectedCategory ? selectedCategory.title : 'Aucune';
    
    // Update clear filters button state
    updateClearFiltersButton();
}

// Update clear filters button visual state
function updateClearFiltersButton() {
    const clearBtn = document.getElementById('clear-filters-btn');
    if (!clearBtn) return;
    
    const hasFilters = document.getElementById('question-search')?.value.trim() !== '' ||
                      document.getElementById('question-process-filter')?.value !== '' ||
                      document.getElementById('question-category-filter')?.value !== '';
    
    if (hasFilters) {
        clearBtn.classList.remove('bg-gray-400', 'cursor-not-allowed', 'opacity-50');
        clearBtn.classList.add('bg-red-500', 'hover:bg-red-600', 'pulse-animation');
        clearBtn.disabled = false;
        clearBtn.title = 'Effacer tous les filtres actifs';
    } else {
        clearBtn.classList.remove('bg-red-500', 'hover:bg-red-600', 'pulse-animation');
        clearBtn.classList.add('bg-gray-400', 'cursor-not-allowed', 'opacity-50');
        clearBtn.disabled = true;
        clearBtn.title = 'Aucun filtre actif';
    }
}

// Render questions as Quizizz-style cards
function renderQuestions() {
    const cardsContainer = document.getElementById('questions-cards');
    const emptyEl = document.getElementById('questions-empty');
    const filteredEmptyEl = document.getElementById('questions-filtered-empty');

    if (filteredQuestions.length === 0) {
        hideElement(cardsContainer);
        
        if (allQuestions.length === 0) {
            showElement(emptyEl);
            hideElement(filteredEmptyEl);
        } else {
            showElement(filteredEmptyEl);
            hideElement(emptyEl);
        }
        return;
    }

    hideElement(emptyEl);
    hideElement(filteredEmptyEl);

    // Render Quizizz-style cards
    if (cardsContainer) {
        cardsContainer.innerHTML = filteredQuestions.map((question, index) => {
            const correctAnswersCount = question.repos ? question.repos.filter(r => r.is_correct).length : 0;
            const totalAnswersCount = question.repos ? question.repos.length : 0;
            const gradientClass = `gradient-${(index % 6) + 1}`;
            
            return `
                <div class="question-card ${gradientClass} slide-in p-6 flex flex-col justify-between">
                    <div class="question-number">#${index + 1}</div>
                      <div class="flex-1 mb-4">
                        ${question.question_text ? `<h3 class="question-text mb-4">${question.question_text}</h3>` : ''}
                        
                        ${question.image_url ? `
                            <div class="mb-4">
                                <img src="${question.image_url}" alt="Question image" class="w-full h-32 object-cover rounded-lg border border-white border-opacity-30">
                            </div>
                        ` : ''}
                        
                        ${!question.question_text && !question.image_url ? `
                            <h3 class="question-text mb-4 italic opacity-75">Question sans contenu</h3>
                        ` : ''}
                        
                        <div class="space-y-2">
                            <div class="question-meta inline-block">
                                <span class="mr-2">📁</span>
                                ${question.category ? question.category.title : 'N/A'}
                            </div>
                            ${question.category && question.category.process ? `
                                <div class="question-meta inline-block ml-2">
                                    <span class="mr-2">🔧</span>
                                    ${question.category.process.title}
                                </div>
                            ` : ''}
                        </div>
                    </div>
                    
                    <div class="mt-auto">
                        <div class="question-meta mb-3 flex items-center justify-between">
                            <div class="flex items-center">
                                <span class="mr-2">💬</span>
                                ${totalAnswersCount} réponses
                                ${correctAnswersCount === 1 ? 
                                    '<span class="ml-2 text-green-200">✓</span>' : 
                                    '<span class="ml-2 text-red-200">⚠</span>'
                                }
                            </div>                            <div class="text-xs opacity-75">
                                ${question.created_at ? new Date(question.created_at).toLocaleDateString('fr-FR') : 'Date inconnue'}
                            </div>
                        </div>
                          <div class="question-actions flex gap-2">
                            <button onclick="editQuestion(${question.id})" class="question-action-btn edit flex-1 text-center">
                                ✏️ Modifier
                            </button>
                            <button onclick="deleteQuestion(${question.id})" class="question-action-btn delete flex-1 text-center">
                                🗑️ Supprimer
                            </button>
                        </div>
                    </div>
                </div>
            `;
        }).join('');
        
        showElement(cardsContainer);
    }
}

// Open question modal
function openQuestionModal(questionId = null) {
    const modal = document.getElementById('question-modal');
    const title = document.getElementById('question-modal-title');
    const form = document.getElementById('question-form');
    
    if (questionId) {
        title.textContent = 'Modifier la question';
        loadQuestionForEdit(questionId);
    } else {
        title.textContent = 'Ajouter une question';
        form.reset();
        document.getElementById('question-id').value = '';
        
        // Reset image form
        resetImageForm();
        
        // Pre-select category based on current filters
        setupQuestionCategoryFromFilters();
        
        initializeAnswers();
    }
    
    // Setup image handlers
    setupImageHandlers();
    
    showElement(modal);
}

// Setup question category dropdown based on current filters
function setupQuestionCategoryFromFilters() {
    const processFilter = document.getElementById('question-process-filter');
    const categoryFilter = document.getElementById('question-category-filter');
    const questionCategorySelect = document.getElementById('question-category');
    
    if (!questionCategorySelect) return;
    
    const selectedProcessId = processFilter?.value;
    const selectedCategoryId = categoryFilter?.value;
    
    if (selectedProcessId) {
        // Update question form category dropdown to show only categories from selected process
        populateQuestionCategoryDropdown(allCategories, selectedProcessId);
        
        // If a specific category is also selected, pre-select it
        if (selectedCategoryId) {
            questionCategorySelect.value = selectedCategoryId;
        }
        
        // Show helpful message
        const selectedProcess = allProcesses.find(p => p.id == selectedProcessId);
        if (selectedProcess) {
            showMessage(`Catégories filtrées pour le processus: ${selectedProcess.title}`, 'info');
        }
    } else {
        // No process filter, show all categories
        populateQuestionCategoryDropdown(allCategories);
        
        // If a category is selected in filter, pre-select it
        if (selectedCategoryId) {
            questionCategorySelect.value = selectedCategoryId;
        }
    }
}

// Close question modal
function closeQuestionModal() {
    const modal = document.getElementById('question-modal');
    hideElement(modal);
}

// Initialize answers with 2 default answers
function initializeAnswers() {
    const container = document.getElementById('answers-container');
    container.innerHTML = '';
    
    // Add 2 default answers
    addAnswer(true); // First answer marked as correct
    addAnswer(false);
}

// Add answer input
function addAnswer(isCorrect = false) {
    const container = document.getElementById('answers-container');
    const answersCount = container.children.length;
    
    if (answersCount >= 6) {
        showMessage('Maximum 6 réponses autorisées', 'error');
        return;
    }    
    const answerDiv = document.createElement('div');
    answerDiv.className = 'answer-input-group';
    answerDiv.innerHTML = `
        <div class="flex items-center space-x-3">
            <input type="radio" name="correct_answer" value="${answersCount}" ${isCorrect ? 'checked' : ''} 
                   class="answer-radio" required>
            <input type="text" name="answers[${answersCount}][answer_text]" placeholder="Texte de la réponse" required
                   class="answer-text-input">
            <button type="button" onclick="removeAnswer(this)" class="remove-answer-btn">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
            </button>
        </div>
    `;
      container.appendChild(answerDiv);
    
    // Update styling based on correct answer selection
    updateAnswerStyling();
}

// Update answer styling based on correct selection
function updateAnswerStyling() {
    const container = document.getElementById('answers-container');
    const answerGroups = container.querySelectorAll('.answer-input-group');
    const correctRadio = document.querySelector('input[name="correct_answer"]:checked');
    
    answerGroups.forEach((group, index) => {
        const radio = group.querySelector('input[type="radio"]');
        if (radio && radio.checked) {
            group.classList.add('correct-answer');
        } else {
            group.classList.remove('correct-answer');
        }
    });
}

// Handle correct answer radio change
document.addEventListener('change', function(e) {
    if (e.target.name === 'correct_answer') {
        updateAnswerStyling();
    }
});

// Remove answer
function removeAnswer(button) {
    const container = document.getElementById('answers-container');
    const answersCount = container.children.length;
    
    if (answersCount <= 2) {
        showMessage('Minimum 2 réponses requises', 'error');
        return;
    }
    
    button.parentElement.remove();
    reindexAnswers();
}

// Reindex answers after removal
function reindexAnswers() {
    const container = document.getElementById('answers-container');
    const answers = container.children;
    
    for (let i = 0; i < answers.length; i++) {
        const radio = answers[i].querySelector('input[type="radio"]');
        const textInput = answers[i].querySelector('input[type="text"]');
        
        radio.value = i;
        textInput.name = `answers[${i}][answer_text]`;
    }
}

// Handle question form submission
document.addEventListener('DOMContentLoaded', function() {
    const questionForm = document.getElementById('question-form');
    if (questionForm) {
        questionForm.addEventListener('submit', handleQuestionSubmit);
    }
});

async function handleQuestionSubmit(e) {
    e.preventDefault();
    
    try {
        const questionId = document.getElementById('question-id')?.value;
        const isEdit = !!questionId;
        
        // Validate question content (text or image required)
        if (!validateQuestionContent()) {
            return;
        }
        
        // Validate category
        const categoryId = document.getElementById('question-category')?.value;
        if (!categoryId) {
            showMessage('Une catégorie doit être sélectionnée', 'error');
            return;
        }
        
        // Prepare answers data
        const answers = [];
        const container = document.getElementById('answers-container');
        const answerInputs = container.querySelectorAll('input[type="text"]');
        const correctAnswerRadio = document.querySelector('input[name="correct_answer"]:checked');
        
        if (!correctAnswerRadio) {
            showMessage('Une réponse correcte doit être sélectionnée', 'error');
            return;
        }
        
        const correctAnswerIndex = parseInt(correctAnswerRadio.value);
        
        answerInputs.forEach((input, index) => {
            const answerText = input.value.trim();
            if (answerText) {
                answers.push({
                    answer_text: answerText,
                    is_correct: index === correctAnswerIndex
                });
            }
        });
        
        if (answers.length < 2) {
            showMessage('Au moins 2 réponses sont requises', 'error');
            return;
        }
        
        // Check if exactly one answer is marked as correct
        const correctAnswers = answers.filter(a => a.is_correct);
        if (correctAnswers.length !== 1) {
            showMessage('Exactement une réponse doit être marquée comme correcte', 'error');
            return;
        }
          // Prepare FormData for file upload
        const formData = new FormData();
        const questionText = document.getElementById('question-text')?.value?.trim();
        
        if (questionText) {
            formData.append('question_text', questionText);
        }
        
        formData.append('categories_id', categoryId);        // Add answers as individual form fields instead of JSON
        answers.forEach((answer, index) => {
            formData.append(`answers[${index}][answer_text]`, answer.answer_text);
            formData.append(`answers[${index}][is_correct]`, answer.is_correct ? '1' : '0');
        });
        
        // Add image if selected
        const imageInput = document.getElementById('question-image');
        if (imageInput?.files?.length > 0) {
            formData.append('image', imageInput.files[0]);
        }
        
        // Add method for Laravel's method spoofing (for PUT requests)
        if (isEdit) {
            formData.append('_method', 'PUT');
        }
        
        const url = isEdit ? `/admin/api/questions/${questionId}` : '/admin/api/questions';
        const method = 'POST'; // Always POST with FormData (Laravel method spoofing handles PUT)
        
        showLoading();
          const response = await fetch(url, {
            method: method,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
                // Don't set Content-Type header - let browser set it for FormData
            },
            body: formData
        });

        console.log('Response status:', response.status);
        
        if (!response.ok) {
            // Try to get error details from response
            const errorText = await response.text();
            console.error('Server response:', errorText);
            try {
                const errorData = JSON.parse(errorText);
                if (errorData.errors) {
                    // Laravel validation errors
                    const errorMessages = Object.values(errorData.errors).flat().join(', ');
                    showMessage('Erreurs de validation: ' + errorMessages, 'error');
                } else {
                    showMessage(errorData.message || 'Erreur du serveur', 'error');
                }
            } catch (e) {
                showMessage('Erreur du serveur (Status: ' + response.status + ')', 'error');
            }
            return;
        }

        const result = await response.json();

        if (result.success) {
            showMessage(result.message || 'Question sauvegardée avec succès');
            closeQuestionModal();
            loadQuestions();
        } else {
            showMessage(result.message || 'Une erreur est survenue', 'error');
        }
    } catch (error) {
        console.error('Error submitting question:', error);
        showMessage('Une erreur est survenue lors de la sauvegarde', 'error');
    } finally {
        hideLoading();
    }
}

// Load question for editing
async function loadQuestionForEdit(questionId) {
    try {
        const response = await fetch(`/admin/api/questions/${questionId}`);
        const result = await response.json();
        
        if (result.success) {
            const question = result.data;
            
            document.getElementById('question-id').value = question.id;
            document.getElementById('question-text').value = question.question_text || '';
            document.getElementById('question-category').value = question.categories_id;
            
            // Reset image form first
            resetImageForm();
            
            // Show current image if exists
            if (question.image_url) {
                showCurrentImage(question.image_url);
            }
            
            // Populate answers
            const container = document.getElementById('answers-container');
            container.innerHTML = '';
            question.repos.forEach((answer, index) => {
                const answerDiv = document.createElement('div');
                answerDiv.className = 'answer-input-group';
                answerDiv.innerHTML = `
                    <div class="flex items-center space-x-3">
                        <input type="radio" name="correct_answer" value="${index}" ${answer.is_correct ? 'checked' : ''} 
                               class="answer-radio" required>
                        <input type="text" name="answers[${index}][answer_text]" value="${answer.answer_text}" required
                               class="answer-text-input">
                        <button type="button" onclick="removeAnswer(this)" class="remove-answer-btn">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                `;
                container.appendChild(answerDiv);
            });
            
            // Update styling after loading answers
            updateAnswerStyling();
        }
    } catch (error) {
        console.error('Error loading question:', error);
        showMessage('Erreur lors du chargement de la question', 'error');
    }
}

// Edit question
function editQuestion(questionId) {
    openQuestionModal(questionId);
}

// Delete question
async function deleteQuestion(questionId) {
    if (!confirm('Êtes-vous sûr de vouloir supprimer cette question et toutes ses réponses ?')) {
        return;
    }
    
    try {
        showLoading();
        
        const response = await fetch(`/admin/api/questions/${questionId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        });

        const result = await response.json();

        if (result.success) {
            showMessage(result.message);
            loadQuestions();
        } else {
            showMessage(result.message || 'Une erreur est survenue', 'error');
        }
    } catch (error) {
        showMessage('Une erreur est survenue', 'error');
        console.error('Error:', error);
    } finally {
        hideLoading();
    }
}

// Refresh questions
function refreshQuestions() {
    // Check if filters are active and give user the option to clear them
    const hasFilters = document.getElementById('question-search')?.value.trim() !== '' ||
                      document.getElementById('question-process-filter')?.value !== '' ||
                      document.getElementById('question-category-filter')?.value !== '';
    
    if (hasFilters) {
        // Clear filters first, then reload
        clearFilters();
        setTimeout(() => {
            loadQuestions();
        }, 100);
    } else {
        loadQuestions();
    }
}

// Utility functions
function showElement(element) {
    if (element) {
        element.classList.remove('hidden');
    }
}

function hideElement(element) {
    if (element) {
        element.classList.add('hidden');
    }
}

function showLoading() {
    const overlay = document.getElementById('loading-overlay');
    if (overlay) {
        overlay.classList.remove('hidden');
    }
}

function hideLoading() {
    const overlay = document.getElementById('loading-overlay');
    if (overlay) {
        overlay.classList.add('hidden');
    }
}

function showMessage(message, type = 'success') {
    if (window.adminDashboard && typeof window.adminDashboard.showMessage === 'function') {
        window.adminDashboard.showMessage(message, type);
    } else {
        // Fallback to console and alert
        console.log(`${type.toUpperCase()}: ${message}`);
        
        // Create a better visual feedback for different message types
        const alertClass = type === 'error' ? 'alert-error' : type === 'info' ? 'alert-info' : 'alert-success';
        
        // Create temporary message element
        const messageDiv = document.createElement('div');
        messageDiv.className = `fixed top-4 right-4 z-50 p-4 rounded-lg text-white ${alertClass} slide-in`;
        messageDiv.style.cssText = `
            background-color: ${type === 'error' ? '#ef4444' : type === 'info' ? '#3b82f6' : '#10b981'};
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            max-width: 400px;
            word-wrap: break-word;
        `;
        messageDiv.textContent = message;
        
        document.body.appendChild(messageDiv);
        
        // Auto remove after 4 seconds
        setTimeout(() => {
            if (messageDiv.parentNode) {
                messageDiv.style.opacity = '0';
                messageDiv.style.transform = 'translateX(100%)';
                setTimeout(() => {
                    messageDiv.remove();
                }, 300);
            }
        }, 4000);
    }
}

// Image handling functions
function setupImageHandlers() {
    const imageInput = document.getElementById('question-image');
    const previewContainer = document.getElementById('image-preview-container');
    const previewImage = document.getElementById('image-preview');
    const removeImageBtn = document.getElementById('remove-image');
    const currentImageContainer = document.getElementById('current-image-container');
    const deleteCurrentImageBtn = document.getElementById('delete-current-image');
    
    // Handle image file selection
    if (imageInput) {
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            
            if (file) {
                // Validate file size (2MB max)
                if (file.size > 2 * 1024 * 1024) {
                    showMessage('L\'image doit faire moins de 2MB', 'error');
                    this.value = '';
                    return;
                }
                
                // Validate file type
                const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/svg+xml'];
                if (!allowedTypes.includes(file.type)) {
                    showMessage('Format d\'image non supporté. Utilisez JPG, PNG, GIF ou SVG', 'error');
                    this.value = '';
                    return;
                }
                
                // Show preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                    currentImageContainer.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                // No file selected, hide preview
                previewContainer.classList.add('hidden');
            }
        });
    }
    
    // Handle remove new image preview
    if (removeImageBtn) {
        removeImageBtn.addEventListener('click', function() {
            imageInput.value = '';
            previewContainer.classList.add('hidden');
            
            // Show current image again if editing
            const questionId = document.getElementById('question-id')?.value;
            if (questionId && currentImageContainer.querySelector('#current-image').src) {
                currentImageContainer.classList.remove('hidden');
            }
        });
    }
    
    // Handle delete current image (for editing)
    if (deleteCurrentImageBtn) {
        deleteCurrentImageBtn.addEventListener('click', async function() {
            const questionId = document.getElementById('question-id')?.value;
            if (!questionId) return;
            
            if (!confirm('Êtes-vous sûr de vouloir supprimer l\'image actuelle ?')) {
                return;
            }
            
            try {
                showLoading();
                
                const response = await fetch(`/admin/api/questions/${questionId}/image`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
                    }
                });
                
                const result = await response.json();
                
                if (result.success) {
                    currentImageContainer.classList.add('hidden');
                    showMessage('Image supprimée avec succès');
                } else {
                    showMessage(result.message || 'Erreur lors de la suppression de l\'image', 'error');
                }
            } catch (error) {
                console.error('Error deleting image:', error);
                showMessage('Erreur lors de la suppression de l\'image', 'error');
            } finally {
                hideLoading();
            }
        });
    }
}

// Reset image form when opening modal
function resetImageForm() {
    const imageInput = document.getElementById('question-image');
    const previewContainer = document.getElementById('image-preview-container');
    const currentImageContainer = document.getElementById('current-image-container');
    
    if (imageInput) imageInput.value = '';
    if (previewContainer) previewContainer.classList.add('hidden');
    if (currentImageContainer) currentImageContainer.classList.add('hidden');
}

// Show current image when editing
function showCurrentImage(imageUrl) {
    const currentImageContainer = document.getElementById('current-image-container');
    const currentImage = document.getElementById('current-image');
    
    if (imageUrl && currentImage && currentImageContainer) {
        currentImage.src = imageUrl;
        currentImageContainer.classList.remove('hidden');
    }
}

// Validate question content (text or image required)
function validateQuestionContent() {
    const questionText = document.getElementById('question-text')?.value?.trim();
    const imageInput = document.getElementById('question-image');
    const hasNewImage = imageInput?.files?.length > 0;
    const currentImage = document.getElementById('current-image');
    const currentImageContainer = document.getElementById('current-image-container');
    const hasCurrentImage = currentImage && !currentImageContainer.classList.contains('hidden') && currentImage.src;
    
    if (!questionText && !hasNewImage && !hasCurrentImage) {
        showMessage('Au moins un texte ou une image est requis pour la question', 'error');
        return false;
    }
    
    return true;
}

// Export functions to global scope for external access
window.initQuestionsSection = initQuestionsSection;
window.openQuestionModal = openQuestionModal;
window.closeQuestionModal = closeQuestionModal;
window.editQuestion = editQuestion;
window.deleteQuestion = deleteQuestion;
window.addAnswer = addAnswer;
window.removeAnswer = removeAnswer;
window.clearFilters = clearFilters;
window.refreshQuestions = refreshQuestions;
</script>