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

/* Enhanced UX animations and improvements */
.filter-section-header {
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    transition: all 0.3s ease;
}

.filter-section-header:hover {
    background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
}

.enhanced-select {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
    background-position: right 0.5rem center;
    background-repeat: no-repeat;
    background-size: 1.5em 1.5em;
    padding-right: 2.5rem;
}

.enhanced-select:focus {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%233b82f6' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
}

.search-input-container {
    position: relative;
    transition: all 0.3s ease;
}

.search-input-container:focus-within {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.quick-filter-badge {
    transition: all 0.2s ease;
    cursor: pointer;
}

.quick-filter-badge:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.stats-card-enhanced {
    position: relative;
    overflow: hidden;
}

.stats-card-enhanced::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.stats-card-enhanced:hover::before {
    left: 100%;
}

.view-toggle-btn {
    transition: all 0.2s ease;
    position: relative;
}

.view-toggle-btn.active {
    background: white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    color: #374151;
}

.view-toggle-btn:not(.active):hover {
    background: rgba(255, 255, 255, 0.5);
    color: #374151;
}

.empty-state-illustration {
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

.step-card {
    transition: all 0.3s ease;
    cursor: pointer;
}

.step-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
}

.step-number {
    animation: pulse-scale 2s infinite;
}

@keyframes pulse-scale {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

.loading-dots {
    display: inline-flex;
    gap: 2px;
}

.loading-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #ea580c;
    animation: loading-bounce 1.4s infinite both;
}

.loading-dot:nth-child(1) { animation-delay: -0.32s; }
.loading-dot:nth-child(2) { animation-delay: -0.16s; }

@keyframes loading-bounce {
    0%, 80%, 100% {
        transform: scale(0);
    }
    40% {
        transform: scale(1);
    }
}

.glassmorphism {
    background: rgba(255, 255, 255, 0.25);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.18);
}

.card-hover-lift {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.card-hover-lift:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.gradient-text {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
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
<div class="space-y-6">    <!-- Header -->
    <div class="bg-gradient-to-r from-white to-gray-50 rounded-xl shadow-sm border border-gray-200 p-6 relative overflow-hidden">
        <!-- Decorative background pattern -->
        <div class="absolute top-0 right-0 w-32 h-32 opacity-5">
            <svg class="w-full h-full" fill="currentColor" viewBox="0 0 24 24">
                <path d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 relative z-10">
            <div class="flex items-center space-x-4">
                <div class="bg-aptiv-orange-100 p-3 rounded-lg">
                    <svg class="w-8 h-8 text-aptiv-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl lg:text-2xl font-bold text-gray-900 mb-1">Gestion des Questions</h2>
                    <p class="text-gray-600 text-sm lg:text-base">Créez et organisez vos questions par processus et catégorie</p>
                </div>
            </div>
            
            <div class="flex items-center space-x-3">
                <!-- Quick stats mini cards -->
                <div class="hidden lg:flex items-center space-x-2 text-sm text-gray-500 bg-white px-3 py-2 rounded-lg border">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    <span id="header-quick-count">0 questions</span>
                </div>
                
                <button onclick="openQuestionModal()" class="bg-gradient-to-r from-aptiv-orange-500 to-aptiv-orange-600 hover:from-aptiv-orange-600 hover:to-aptiv-orange-700 text-white px-6 py-3 rounded-lg transition-all duration-200 btn-touch inline-flex items-center text-sm font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Nouvelle Question
                </button>
            </div>
        </div>
    </div>    <!-- Filters Section -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <!-- Filter Header -->
        <div class="bg-gradient-to-r from-gray-50 to-white px-6 py-4 border-b border-gray-100">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="bg-blue-100 p-2 rounded-lg">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Filtres & Recherche</h3>
                        <p class="text-sm text-gray-500">Affinez votre recherche de questions</p>
                    </div>
                </div>
                
                <!-- Quick filter badges -->
                <div class="hidden lg:flex items-center space-x-2">
                    <span class="text-xs text-gray-500">Raccourcis:</span>
                    <button onclick="showAllQuestions()" class="px-3 py-1 bg-blue-100 hover:bg-blue-200 text-blue-700 rounded-full text-xs font-medium transition-colors">
                        Toutes
                    </button>
                    <button onclick="showRecentQuestions()" class="px-3 py-1 bg-green-100 hover:bg-green-200 text-green-700 rounded-full text-xs font-medium transition-colors">
                        Récentes
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Filter Controls -->
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Process Filter -->
                <div class="space-y-2">
                    <label for="question-process-filter" class="flex items-center text-sm font-medium text-gray-700">
                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14-7l2 2-2 2m-14 4h14m-14 4h14"></path>
                        </svg>
                        Processus
                    </label>
                    <div class="relative">
                        <select id="question-process-filter" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white shadow-sm transition-all hover:shadow-md appearance-none pr-10 text-gray-700">
                            <option value="">Tous les processus</option>
                        </select>
                        <svg class="absolute right-3 top-3.5 h-4 w-4 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>

                <!-- Category Filter -->
                <div class="space-y-2">
                    <label for="question-category-filter" class="flex items-center text-sm font-medium text-gray-700">
                        <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        Catégorie
                    </label>
                    <div class="relative">
                        <select id="question-category-filter" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent bg-white shadow-sm transition-all hover:shadow-md appearance-none pr-10 disabled:bg-gray-100 disabled:cursor-not-allowed text-gray-700" disabled>
                            <option value="">Sélectionner d'abord un processus</option>
                        </select>
                        <svg class="absolute right-3 top-3.5 h-4 w-4 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>

                <!-- Search -->
                <div class="space-y-2">
                    <label for="question-search" class="flex items-center text-sm font-medium text-gray-700">
                        <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Recherche Textuelle
                    </label>
                    <div class="relative">
                        <input type="text" id="question-search" placeholder="Tapez pour rechercher dans les questions..." 
                               class="w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white shadow-sm transition-all hover:shadow-md text-gray-700">
                        <svg class="absolute left-3 top-3.5 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <button id="clear-search-btn" class="absolute right-3 top-3.5 h-4 w-4 text-gray-400 hover:text-gray-600 hidden">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>        <!-- Enhanced Statistics Dashboard -->
        <div id="questions-stats" class="bg-gradient-to-r from-gray-50 to-white p-6 border-t border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <h4 class="text-sm font-semibold text-gray-700 uppercase tracking-wide">Statistiques en temps réel</h4>
                <div class="flex items-center text-xs text-gray-500">
                    <div class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></div>
                    Mis à jour automatiquement
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Total Questions Card -->
                <div class="stats-card orange rounded-xl px-5 py-4 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 mr-2 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm opacity-90 font-medium">Total</span>
                            </div>
                            <div class="flex items-baseline">
                                <span id="total-questions-count" class="text-2xl font-bold">0</span>
                                <span class="text-sm ml-1 opacity-75">questions</span>
                            </div>
                        </div>
                        <div class="bg-white bg-opacity-20 p-2 rounded-lg group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <!-- Filtered Questions Card -->
                <div class="stats-card blue rounded-xl px-5 py-4 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 mr-2 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                                </svg>
                                <span class="text-sm opacity-90 font-medium">Filtrées</span>
                            </div>
                            <div class="flex items-baseline">
                                <span id="filtered-questions-count" class="text-2xl font-bold">0</span>
                                <span class="text-sm ml-1 opacity-75">résultats</span>
                            </div>
                        </div>
                        <div class="bg-white bg-opacity-20 p-2 rounded-lg group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M10 18h4v-2h-4v2zM3 6v2h18V6H3zm3 7h12v-2H6v2z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <!-- Category Info Card -->
                <div class="stats-card green rounded-xl px-5 py-4 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 mr-2 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                <span class="text-sm opacity-90 font-medium">Catégorie</span>
                            </div>
                            <div class="flex items-baseline">
                                <span id="selected-category-name" class="text-lg font-bold truncate max-w-20">Aucune</span>
                            </div>
                        </div>
                        <div class="bg-white bg-opacity-20 p-2 rounded-lg group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.63 5.84C17.27 5.33 16.67 5 16 5L5 5.01C3.9 5.01 3 5.9 3 7v10c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2l-5.37.84zM12 9c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <!-- Performance Indicator -->
                <div class="stats-card bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl px-5 py-4 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 mr-2 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                <span class="text-sm opacity-90 font-medium">Performance</span>
                            </div>
                            <div class="flex items-baseline">
                                <span id="search-performance" class="text-2xl font-bold">Excellent</span>
                            </div>
                        </div>
                        <div class="bg-white bg-opacity-20 p-2 rounded-lg group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>        <!-- Enhanced Action Buttons -->
        <div class="bg-white p-6 border-t border-gray-100">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <!-- Left side - Filter actions -->
                <div class="flex flex-wrap items-center gap-3">
                    <button 
                        id="clear-filters-btn"
                        onclick="clearFilters()" 
                        class="bg-gray-400 cursor-not-allowed opacity-50 text-white px-4 py-2 rounded-lg transition-all duration-200 text-sm font-medium inline-flex items-center hover:shadow-md disabled:hover:shadow-none"
                        title="Aucun filtre actif"
                        disabled>
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Effacer les filtres
                    </button>
                    
                    <button onclick="refreshQuestions()" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-4 py-2 rounded-lg transition-all duration-200 text-sm font-medium inline-flex items-center shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        Actualiser
                    </button>
                </div>
                
                <!-- Right side - View options -->
                <div class="flex items-center gap-3">
                    <span class="text-sm text-gray-500 font-medium">Affichage:</span>
                    
                    <!-- View toggle buttons -->
                    <div class="bg-gray-100 p-1 rounded-lg flex">
                        <button id="grid-view-btn" onclick="switchToGridView()" class="px-3 py-1.5 rounded-md text-sm font-medium transition-all bg-white shadow-sm text-gray-900 border border-gray-200">
                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                            </svg>
                            Cartes
                        </button>
                        <button id="list-view-btn" onclick="switchToListView()" class="px-3 py-1.5 rounded-md text-sm font-medium transition-all text-gray-500 hover:text-gray-700">
                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                            </svg>
                            Liste
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Quick action hints -->
            <div class="mt-4 p-3 bg-blue-50 border border-blue-200 rounded-lg">
                <div class="flex items-start">
                    <svg class="w-4 h-4 text-blue-600 mt-0.5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div class="text-xs text-blue-700">
                        <p class="font-medium mb-1">💡 Conseils rapides:</p>
                        <ul class="space-y-1 text-blue-600">
                            <li>• Sélectionnez un processus puis une catégorie pour voir les questions</li>
                            <li>• Utilisez la recherche pour trouver des questions spécifiques</li>
                            <li>• Cliquez sur une carte pour modifier la question</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>    <!-- Enhanced Loading State -->
    <div id="questions-loading" class="bg-white rounded-xl shadow-sm border border-gray-200 p-12 text-center">
        <div class="max-w-md mx-auto">
            <!-- Animated loading icon -->
            <div class="relative mb-6">
                <div class="spinner mx-auto mb-4"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <svg class="w-8 h-8 text-aptiv-orange-400 animate-bounce" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                </div>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Chargement en cours...</h3>
            <p class="text-gray-600 mb-4">Nous récupérons vos questions, cela ne prendra qu'un instant.</p>
            <div class="flex justify-center space-x-1">
                <div class="w-2 h-2 bg-aptiv-orange-400 rounded-full animate-bounce"></div>
                <div class="w-2 h-2 bg-aptiv-orange-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                <div class="w-2 h-2 bg-aptiv-orange-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
            </div>
        </div>
    </div>

    <!-- Enhanced Empty State -->
    <div id="questions-empty" class="bg-white rounded-xl shadow-sm border border-gray-200 p-12 text-center hidden">
        <div class="max-w-md mx-auto">
            <!-- Larger, more expressive illustration -->
            <div class="mb-6">
                <div class="w-24 h-24 mx-auto bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="text-4xl mb-2">🎯</div>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-3">Aucune question pour le moment</h3>
            <p class="text-gray-600 mb-6">Commencez à créer votre première question pour enrichir votre base de connaissances.</p>
            <button onclick="openQuestionModal()" class="bg-gradient-to-r from-aptiv-orange-500 to-aptiv-orange-600 hover:from-aptiv-orange-600 hover:to-aptiv-orange-700 text-white px-6 py-3 rounded-lg transition-all duration-200 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-1 inline-flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Créer ma première question
            </button>
        </div>
    </div>

    <!-- Enhanced Filtered Empty State -->
    <div id="questions-filtered-empty" class="bg-white rounded-xl shadow-sm border border-gray-200 p-12 text-center hidden">
        <div class="max-w-md mx-auto">
            <!-- Search illustration -->
            <div class="mb-6">
                <div class="w-24 h-24 mx-auto bg-gradient-to-br from-blue-100 to-blue-200 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-12 h-12 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <div class="text-4xl mb-2">🔍</div>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-3">Aucun résultat trouvé</h3>
            <p class="text-gray-600 mb-6">Nous n'avons trouvé aucune question correspondant à vos critères de recherche. Essayez de modifier vos filtres.</p>
            <div class="space-y-3">
                <button onclick="clearFilters()" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-6 py-3 rounded-lg transition-all duration-200 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-1 inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    Effacer tous les filtres
                </button>
                <p class="text-sm text-gray-500">
                    ou <button onclick="openQuestionModal()" class="text-aptiv-orange-600 hover:text-aptiv-orange-700 font-medium underline">créer une nouvelle question</button>
                </p>
            </div>
        </div>
    </div>

    <!-- Enhanced Initial State -->
    <div id="questions-initial-state" class="bg-white rounded-xl shadow-sm border border-gray-200 p-12 text-center">
        <div class="max-w-lg mx-auto">
            <!-- Step-by-step illustration -->
            <div class="mb-8">
                <div class="w-24 h-24 mx-auto bg-gradient-to-br from-indigo-100 to-purple-200 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-12 h-12 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                </div>
                <div class="text-4xl mb-2">📚</div>
            </div>
            
            <h3 class="text-xl font-bold text-gray-900 mb-4">Commencez par sélectionner une catégorie</h3>
            <p class="text-gray-600 mb-8">Suivez ces étapes simples pour explorer vos questions organisées par catégories.</p>
            
            <!-- Steps -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-blue-50 p-4 rounded-lg border border-blue-200">
                    <div class="w-10 h-10 bg-blue-500 text-white rounded-full flex items-center justify-center mx-auto mb-3 font-bold">1</div>
                    <h4 class="font-semibold text-blue-900 mb-2">Sélectionner un processus</h4>
                    <p class="text-sm text-blue-700">Choisissez le processus qui vous intéresse dans le premier filtre.</p>
                </div>
                
                <div class="bg-green-50 p-4 rounded-lg border border-green-200">
                    <div class="w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center mx-auto mb-3 font-bold">2</div>
                    <h4 class="font-semibold text-green-900 mb-2">Choisir une catégorie</h4>
                    <p class="text-sm text-green-700">Sélectionnez ensuite une catégorie spécifique pour affiner votre recherche.</p>
                </div>
                
                <div class="bg-purple-50 p-4 rounded-lg border border-purple-200">
                    <div class="w-10 h-10 bg-purple-500 text-white rounded-full flex items-center justify-center mx-auto mb-3 font-bold">3</div>
                    <h4 class="font-semibold text-purple-900 mb-2">Explorer les questions</h4>
                    <p class="text-sm text-purple-700">Découvrez toutes les questions liées à cette catégorie.</p>
                </div>
            </div>
            
            <!-- Call to action -->
            <div class="bg-gradient-to-r from-gray-50 to-white p-4 rounded-lg border border-gray-200">
                <p class="text-sm text-gray-600 mb-3">
                    <span class="font-medium">Conseil:</span> Vous pouvez aussi utiliser la recherche textuelle pour trouver des questions spécifiques.
                </p>
                <button onclick="document.getElementById('question-process-filter').focus()" class="text-aptiv-orange-600 hover:text-aptiv-orange-700 font-medium text-sm underline">
                    Commencer maintenant →
                </button>
            </div>
        </div>
    </div><!-- Desktop Questions View -->
    <div id="questions-desktop" class="desktop-table space-y-6 hidden">
        <!-- Questions will be grouped by category here -->
    </div>

    <!-- Mobile Questions View -->
    <div id="questions-mobile" class="mobile-view space-y-6 hidden">
        <!-- Mobile question groups will be populated here -->
    </div>

    <!-- Questions Cards Grid (Quizizz Style) -->
    <div id="questions-cards" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 hidden">
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
                                <p class="mt-1">Au moins une réponse correcte • Min 2, Max 6 réponses</p>
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
console.log('Questions management script loaded');

// Enhanced UX Functions
let currentViewMode = 'grid'; // 'grid' or 'list'

// Switch to grid view
function switchToGridView() {
    currentViewMode = 'grid';
    updateViewButtons();
    refreshQuestionDisplay();
}

// Switch to list view  
function switchToListView() {
    currentViewMode = 'list';
    updateViewButtons();
    refreshQuestionDisplay();
}

// Update view toggle buttons appearance
function updateViewButtons() {
    const gridBtn = document.getElementById('grid-view-btn');
    const listBtn = document.getElementById('list-view-btn');
    
    if (gridBtn && listBtn) {
        if (currentViewMode === 'grid') {
            gridBtn.classList.add('active', 'bg-white', 'shadow-sm', 'text-gray-900', 'border', 'border-gray-200');
            gridBtn.classList.remove('text-gray-500', 'hover:text-gray-700');
            listBtn.classList.remove('active', 'bg-white', 'shadow-sm', 'text-gray-900', 'border', 'border-gray-200');
            listBtn.classList.add('text-gray-500', 'hover:text-gray-700');
        } else {
            listBtn.classList.add('active', 'bg-white', 'shadow-sm', 'text-gray-900', 'border', 'border-gray-200');
            listBtn.classList.remove('text-gray-500', 'hover:text-gray-700');
            gridBtn.classList.remove('active', 'bg-white', 'shadow-sm', 'text-gray-900', 'border', 'border-gray-200');
            gridBtn.classList.add('text-gray-500', 'hover:text-gray-700');
        }
    }
}

// Show all questions (quick filter)
function showAllQuestions() {
    const processFilter = document.getElementById('question-process-filter');
    const categoryFilter = document.getElementById('question-category-filter');
    const searchInput = document.getElementById('question-search');
    
    if (processFilter) processFilter.value = '';
    if (categoryFilter) {
        categoryFilter.value = '';
        categoryFilter.disabled = true;
        categoryFilter.innerHTML = '<option value="">Sélectionner d\'abord un processus</option>';
    }
    if (searchInput) searchInput.value = '';
    
    updateSearchPerformance('excellent');
    filterQuestions();
}

// Show recent questions (quick filter)
function showRecentQuestions() {
    // This would filter by creation date - implementation depends on your data structure
    console.log('Showing recent questions...');
    // For now, just show all questions
    showAllQuestions();
}

// Enhanced search input with clear button
function setupEnhancedSearch() {
    const searchInput = document.getElementById('question-search');
    const clearBtn = document.getElementById('clear-search-btn');
    
    if (searchInput && clearBtn) {
        searchInput.addEventListener('input', function() {
            if (this.value.length > 0) {
                clearBtn.classList.remove('hidden');
            } else {
                clearBtn.classList.add('hidden');
            }
            
            // Update performance indicator based on search length
            if (this.value.length === 0) {
                updateSearchPerformance('excellent');
            } else if (this.value.length < 3) {
                updateSearchPerformance('good');
            } else {
                updateSearchPerformance('excellent');
            }
        });
        
        clearBtn.addEventListener('click', function() {
            searchInput.value = '';
            clearBtn.classList.add('hidden');
            updateSearchPerformance('excellent');
            filterQuestions();
        });
    }
}

// Update search performance indicator
function updateSearchPerformance(level) {
    const performanceEl = document.getElementById('search-performance');
    if (performanceEl) {
        const levels = {
            'excellent': { text: 'Excellent', class: 'text-green-400' },
            'good': { text: 'Bon', class: 'text-yellow-400' },
            'fair': { text: 'Moyen', class: 'text-orange-400' }
        };
        
        const config = levels[level] || levels['excellent'];
        performanceEl.textContent = config.text;
        performanceEl.className = `text-2xl font-bold ${config.class}`;
    }
}

// Refresh question display based on current view mode
function refreshQuestionDisplay() {
    const cardsContainer = document.getElementById('questions-cards');
    const desktopContainer = document.getElementById('questions-desktop');
    const mobileContainer = document.getElementById('questions-mobile');
    
    if (currentViewMode === 'grid') {
        // Show grid view
        if (cardsContainer) cardsContainer.classList.remove('hidden');
        if (desktopContainer) desktopContainer.classList.add('hidden');
        if (mobileContainer) mobileContainer.classList.add('hidden');
    } else {
        // Show list view
        if (cardsContainer) cardsContainer.classList.add('hidden');
        if (desktopContainer) desktopContainer.classList.remove('hidden');
        if (mobileContainer) mobileContainer.classList.remove('hidden');
    }
}

// Enhanced clear filters with animation
function clearFilters() {
    console.log('clearFilters called'); // Debug log
    
    try {
        const processFilter = document.getElementById('question-process-filter');
        const categoryFilter = document.getElementById('question-category-filter');
        const searchInput = document.getElementById('question-search');
        const clearBtn = document.getElementById('clear-filters-btn');
        
        // Prevent execution if button is disabled
        if (clearBtn?.disabled) {
            console.log('Clear filters button is disabled');
            return;
        }
        
        // Add loading animation
        if (clearBtn) {
            clearBtn.innerHTML = '<svg class="w-4 h-4 mr-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>Effacement...';
            clearBtn.disabled = true;
        }
        
        // Clear filters with delay for visual feedback
        setTimeout(() => {
            try {
                if (processFilter) processFilter.value = '';
                if (categoryFilter) {
                    categoryFilter.value = '';
                    categoryFilter.disabled = true;
                    categoryFilter.innerHTML = '<option value="">Sélectionner d\'abord un processus</option>';
                }
                if (searchInput) {
                    searchInput.value = '';
                    const clearSearchBtn = document.getElementById('clear-search-btn');
                    if (clearSearchBtn) clearSearchBtn.classList.add('hidden');
                }
                
                updateSearchPerformance('excellent');
                
                // Reset filtered questions to show all
                filteredQuestions = [...allQuestions];
                renderQuestions();
                updateStatistics();
                
                // Reset button
                if (clearBtn) {
                    clearBtn.innerHTML = '<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>Effacer les filtres';
                    clearBtn.disabled = false;
                }
                
                console.log('Filters cleared successfully');
            } catch (error) {
                console.error('Error in clearFilters timeout:', error);
            }
        }, 500);
        
    } catch (error) {
        console.error('Error in clearFilters:', error);
    }
}

// Initialize enhanced UX features
function initEnhancedUX() {
    console.log('Initializing enhanced UX features...');
    
    try {
        setupEnhancedSearch();
        updateViewButtons();
        updateSearchPerformance('excellent');
        
        // Add smooth scrolling to filter focus
        const processFilter = document.getElementById('question-process-filter');
        if (processFilter) {
            processFilter.addEventListener('focus', function() {
                this.scrollIntoView({ behavior: 'smooth', block: 'center' });
            });
        }
        
        // Add hover effects to stats cards
        const statsCards = document.querySelectorAll('.stats-card');
        statsCards.forEach(card => {
            card.classList.add('stats-card-enhanced');
        });
        
        console.log('Enhanced UX features initialized successfully');
    } catch (error) {
        console.error('Error initializing enhanced UX features:', error);
    }
}

// Questions Management JavaScript
let allQuestions = [];
let filteredQuestions = [];
let allCategories = [];
let allProcesses = [];

// Initialize questions section
function initQuestionsSection() {
    console.log('Initializing questions section...');
    
    try {
        // Initialize enhanced UX features first
        initEnhancedUX();
        
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
                    
                    // Initialize view mode
                    refreshQuestionDisplay();
                    
                    console.log('Questions section initialized successfully');
                }).catch(error => {
                    console.error('Error loading questions:', error);
                });
            }).catch(error => {
                console.error('Error loading categories:', error);
            });
        }).catch(error => {
            console.error('Error loading processes:', error);
        });
    } catch (error) {
        console.error('Error initializing questions section:', error);
    }
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
    const initialStateEl = document.getElementById('questions-initial-state');

    showElement(loadingEl);
    hideElement(cardsEl);
    hideElement(emptyEl);
    hideElement(initialStateEl);

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
    
    // Handle question form submission
    const questionForm = document.getElementById('question-form');
    if (questionForm) {
        questionForm.addEventListener('submit', handleQuestionSubmit);
    }
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
        const categoryId = categoryFilter?.value || '';        filteredQuestions = allQuestions.filter(question => {
            if (!question) return false;
            
            // Search in question text (if it exists)
            const searchMatch = !searchTerm || 
                (question.question_text && question.question_text.toLowerCase().includes(searchTerm));
            
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

// Helper functions to preserve filter state during operations
function saveFilterState() {
    const searchInput = document.getElementById('question-search');
    const processFilter = document.getElementById('question-process-filter');
    const categoryFilter = document.getElementById('question-category-filter');
    
    return {
        search: searchInput?.value || '',
        process: processFilter?.value || '',
        category: categoryFilter?.value || ''
    };
}

function restoreFilterState(filterState) {
    if (!filterState) return;
    
    const searchInput = document.getElementById('question-search');
    const processFilter = document.getElementById('question-process-filter');
    const categoryFilter = document.getElementById('question-category-filter');
    
    if (searchInput && filterState.search) {
        searchInput.value = filterState.search;
    }
    
    if (processFilter && filterState.process) {
        processFilter.value = filterState.process;
        // Update category filter based on process
        updateCategoryFilter(filterState.process);
    }
    
    // Restore category after a small delay to ensure category filter is populated
    if (categoryFilter && filterState.category) {
        setTimeout(() => {
            categoryFilter.value = filterState.category;
            filterQuestions();
        }, 100);
    } else if (filterState.search || filterState.process) {
        // Apply filters if search or process is set but no category
        setTimeout(() => {
            filterQuestions();
        }, 100);
    }
}

// Update statistics
function updateStatistics() {
    const totalCount = allQuestions.length;
    const filteredCount = filteredQuestions.length;
    
    // Update main stats
    document.getElementById('total-questions-count').textContent = totalCount;
    document.getElementById('filtered-questions-count').textContent = filteredCount;
    
    // Update header quick count
    const headerQuickCount = document.getElementById('header-quick-count');
    if (headerQuickCount) {
        if (filteredCount === totalCount) {
            headerQuickCount.textContent = `${totalCount} question${totalCount > 1 ? 's' : ''}`;
        } else {
            headerQuickCount.textContent = `${filteredCount}/${totalCount} question${totalCount > 1 ? 's' : ''}`;
        }
    }
    
    // Update category name
    const categoryFilter = document.getElementById('question-category-filter');
    const selectedCategoryId = categoryFilter?.value;
    const selectedCategory = allCategories.find(cat => cat.id == selectedCategoryId);
    const categoryNameEl = document.getElementById('selected-category-name');
    if (categoryNameEl) {
        categoryNameEl.textContent = selectedCategory ? selectedCategory.title : 'Aucune';
    }
    
    // Update search performance based on filter efficiency
    if (totalCount > 0) {
        const efficiency = filteredCount / totalCount;
        if (efficiency > 0.8) {
            updateSearchPerformance('excellent');
        } else if (efficiency > 0.5) {
            updateSearchPerformance('good');
        } else {
            updateSearchPerformance('fair');
        }
    } else {
        updateSearchPerformance('excellent');
    }
    
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
    const initialStateEl = document.getElementById('questions-initial-state');    // Check if category is selected (required to show questions)
    const categoryId = document.getElementById('question-category-filter')?.value || '';
    
    // If no category is selected, show initial state
    if (!categoryId) {
        hideElement(cardsContainer);
        hideElement(emptyEl);
        hideElement(filteredEmptyEl);
        showElement(initialStateEl);
        return;
    }

    // Hide initial state when category is selected
    hideElement(initialStateEl);

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
    showElement(cardsContainer);

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
            <input type="checkbox" name="correct_answers[]" value="${answersCount}" ${isCorrect ? 'checked' : ''} 
                   class="answer-checkbox">
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
    
    answerGroups.forEach((group, index) => {
        const checkbox = group.querySelector('input[type="checkbox"]');
        if (checkbox && checkbox.checked) {
            group.classList.add('correct-answer');
        } else {
            group.classList.remove('correct-answer');
        }
    });
}

// Handle correct answer checkbox change
document.addEventListener('change', function(e) {
    if (e.target.name === 'correct_answers[]') {
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
        const checkbox = answers[i].querySelector('input[type="checkbox"]');
        const textInput = answers[i].querySelector('input[type="text"]');
        
        checkbox.value = i;
        textInput.name = `answers[${i}][answer_text]`;
    }
}

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
        const correctAnswerCheckboxes = container.querySelectorAll('input[name="correct_answers[]"]:checked');
        
        if (correctAnswerCheckboxes.length === 0) {
            showMessage('Au moins une réponse correcte doit être sélectionnée', 'error');
            return;
        }
        
        const correctIndices = Array.from(correctAnswerCheckboxes).map(cb => parseInt(cb.value));
        
        answerInputs.forEach((input, index) => {
            const answerText = input.value.trim();
            if (answerText) {
                answers.push({
                    answer_text: answerText,
                    is_correct: correctIndices.includes(index)
                });
            }
        });
        
        if (answers.length < 2) {
            showMessage('Au moins 2 réponses sont requises', 'error');
            return;
        }
        
        // Check if at least one answer is marked as correct
        const correctAnswers = answers.filter(a => a.is_correct);
        if (correctAnswers.length < 1) {
            showMessage('Au moins une réponse doit être marquée comme correcte', 'error');
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

        const result = await response.json();        if (result.success) {
            showMessage(result.message || 'Question sauvegardée avec succès');
            closeQuestionModal();
            
            // Save current filter state before reloading
            const filterState = saveFilterState();
            
            loadQuestions().then(() => {
                // Restore filters after questions are loaded
                restoreFilterState(filterState);
            });
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
                        <input type="checkbox" name="correct_answers[]" value="${index}" ${answer.is_correct ? 'checked' : ''} 
                               class="answer-checkbox">
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

        const result = await response.json();        if (result.success) {
            showMessage(result.message);
            
            // Save current filter state before reloading
            const filterState = saveFilterState();
            
            loadQuestions().then(() => {
                // Restore filters after questions are loaded
                restoreFilterState(filterState);
            });
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
    // Save current filter state before refreshing
    const filterState = saveFilterState();
    
    loadQuestions().then(() => {
        // Restore filters after questions are loaded
        restoreFilterState(filterState);
    });
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