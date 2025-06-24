<!-- Tests Management Section -->
<div class="space-y-6">
    <!-- Enhanced Header with Creative Search -->
    <div class="bg-gradient-to-r from-white via-blue-50 to-purple-50 rounded-2xl shadow-lg border border-gray-200 p-6">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
            <div class="text-center lg:text-left">
                <div class="flex items-center justify-center lg:justify-start gap-3 mb-2">
                    <div class="p-2 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl lg:text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                        Gestion des Tests
                    </h2>
                </div>
                <p class="text-gray-600 text-sm lg:text-base">Analysez et gérez les performances des tests avec des outils avancés</p>
            </div>
            
            <!-- Advanced Search Controls -->
            <div class="bg-white rounded-xl p-4 shadow-md border border-gray-100">
                <div class="flex flex-col sm:flex-row gap-3">
                    <!-- Smart Search Input -->
                    <div class="relative group">
                        <input type="text" 
                               id="smart-search" 
                               placeholder="Recherche intelligente..." 
                               class="w-full sm:w-80 pl-12 pr-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 text-sm group-hover:border-blue-300">
                        <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <!-- Filter Buttons -->
                    <div class="flex gap-2">
                        <button id="filter-toggle" class="px-4 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors text-sm font-medium flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                            </svg>
                            Filtres
                        </button>
                        
                        <button onclick="exportTests()" class="px-4 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors text-sm font-medium flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Exporter
                        </button>
                    </div>
                </div>
                
                <!-- Advanced Filters Panel -->
                <div id="filters-panel" class="hidden mt-4 pt-4 border-t border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1">Score</label>
                            <select id="score-filter" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                <option value="">Tous les scores</option>
                                <option value="excellent">Excellent (≥75%)</option>
                                <option value="good">Bon (50-74%)</option>
                                <option value="poor">Faible (<50%)</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1">Période</label>
                            <select id="period-filter" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                <option value="">Toutes les périodes</option>
                                <option value="today">Aujourd'hui</option>
                                <option value="week">Cette semaine</option>
                                <option value="month">Ce mois</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1">Catégorie</label>
                            <select id="category-filter" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                <option value="">Toutes les catégories</option>
                                <!-- Categories will be populated dynamically -->
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1">Formateur</label>
                            <select id="formateur-filter" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                <option value="">Tous les formateurs</option>
                                <!-- Formateurs will be populated dynamically -->
                            </select>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between mt-4">
                        <div class="flex items-center gap-2">
                            <input type="checkbox" id="show-retakes" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            <label for="show-retakes" class="text-sm text-gray-700">Afficher uniquement les tests repris</label>
                        </div>
                        <button onclick="clearFilters()" class="text-sm text-gray-500 hover:text-gray-700">Effacer les filtres</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-6 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium">Total Tests</p>
                    <p class="text-2xl font-bold" id="total-tests">-</p>
                </div>
                <div class="p-3 bg-white/20 rounded-lg">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl p-6 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm font-medium">Score Moyen</p>
                    <p class="text-2xl font-bold" id="average-score">-</p>
                </div>
                <div class="p-3 bg-white/20 rounded-lg">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl p-6 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-yellow-100 text-sm font-medium">Tests Aujourd'hui</p>
                    <p class="text-2xl font-bold" id="today-tests">-</p>
                </div>
                <div class="p-3 bg-white/20 rounded-lg">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl p-6 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-100 text-sm font-medium">Taux de Réussite</p>
                    <p class="text-2xl font-bold" id="success-rate">-</p>
                </div>
                <div class="p-3 bg-white/20 rounded-lg">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading State -->
    <div id="tests-loading" class="bg-white rounded-xl shadow-sm border border-gray-200 p-8 text-center">
        <div class="spinner mx-auto mb-4"></div>
        <p class="text-gray-600">Chargement des tests...</p>
    </div>

    <!-- Tests Table Container -->
    <div id="tests-container" class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hidden">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Liste des Tests</h3>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-500" id="results-count">0 résultat(s)</span>
                    <div class="flex items-center gap-2">
                        <label class="text-sm text-gray-600">Afficher:</label>
                        <select id="per-page" class="text-sm border border-gray-300 rounded px-2 py-1">
                            <option value="10">10</option>
                            <option value="25" selected>25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100" onclick="sortTable('user')">
                            Utilisateur
                            <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                            </svg>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100" onclick="sortTable('category')">
                            Catégorie
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100" onclick="sortTable('formateur')">
                            Formateur
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100" onclick="sortTable('score')">
                            Score
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100" onclick="sortTable('date')">
                            Date
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody id="tests-table-body" class="bg-white divide-y divide-gray-200">
                    <!-- Tests will be populated here -->
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="bg-gray-50 px-6 py-3 border-t border-gray-200">
            <div class="flex items-center justify-between">
                <div class="text-sm text-gray-700">
                    Affichage <span id="showing-from">1</span> à <span id="showing-to">25</span> sur <span id="total-results">0</span> résultats
                </div>
                <div class="flex items-center gap-2" id="pagination-controls">
                    <!-- Pagination buttons will be generated here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Empty State -->
    <div id="tests-empty" class="bg-white rounded-xl shadow-sm border border-gray-200 p-12 text-center hidden">
        <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
        </div>
        <h3 class="text-lg font-medium text-gray-900 mb-2">Aucun test trouvé</h3>
        <p class="text-gray-500 mb-6">Il n'y a pas de tests correspondant à vos critères de recherche.</p>
        <button onclick="clearFilters()" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
            Effacer les filtres
        </button>
    </div>
</div>

<!-- Test Details Modal -->
<div id="test-details-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 overflow-y-auto h-full w-full z-50 backdrop-blur-sm">
    <div class="relative top-20 mx-auto p-2 border w-11/12 md:w-2/3 lg:w-1/2 xl:w-2/5 shadow-2xl rounded-lg bg-white max-w-2xl">
        <div class="flex items-center justify-between p-3 border-b border-gray-200">
            <div class="flex items-center">
                <div class="w-5 h-5 bg-gradient-to-r from-blue-500 to-purple-600 rounded flex items-center justify-center mr-2">
                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-base font-semibold text-gray-900">Test Details</h3>
            </div>
            <button onclick="closeTestDetailsModal()" class="text-gray-400 hover:text-gray-600 transition-colors duration-200 p-1 hover:bg-gray-100 rounded">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div id="test-details-content" class="p-3">
            <!-- Test details will be loaded here -->
        </div>
    </div>
</div>

<style>
/* Custom animations and styles */
.spinner {
    width: 40px;
    height: 40px;
    border: 4px solid #f3f4f6;
    border-top: 4px solid #3b82f6;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.suggestion-item:hover {
    background-color: #dbeafe;
    transition: background-color 0.2s;
}

/* Score badge styles */
.score-excellent { @apply bg-green-100 text-green-800; }
.score-good { @apply bg-yellow-100 text-yellow-800; }
.score-poor { @apply bg-red-100 text-red-800; }

/* Status badge styles */
.status-completed { @apply bg-blue-100 text-blue-800; }
.status-retake { @apply bg-purple-100 text-purple-800; }
.status-failed { @apply bg-red-100 text-red-800; }

/* Fade in animation */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.fade-in {
    animation: fadeIn 0.5s ease-out;
}

/* Modal animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(60px) scale(0.95);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

@keyframes fadeOutDown {
    from {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
    to {
        opacity: 0;
        transform: translateY(60px) scale(0.95);
    }
}

.animate-fadeInUp {
    animation: fadeInUp 0.3s ease-out;
}

.animate-fadeOutDown {
    animation: fadeOutDown 0.3s ease-in;
}

/* Enhanced modal backdrop */
#test-details-modal {
    backdrop-filter: blur(4px);
    transition: backdrop-filter 0.3s ease;
}

/* Score display enhancements */
.score-circle {
    position: relative;
    overflow: hidden;
}

.score-circle::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: conic-gradient(
        from 0deg,
        transparent 0deg,
        currentColor calc(var(--score) * 3.6deg),
        transparent calc(var(--score) * 3.6deg)
    );
    border-radius: 50%;
    opacity: 0.1;
}
</style>

<script>
// Tests Management JavaScript
let currentPage = 1;
let perPage = 25;
let currentSort = { field: 'date', direction: 'desc' };
let allTests = [];
let filteredTests = [];

// Initialize the tests section
document.addEventListener('DOMContentLoaded', function() {
    initializeTestsSection();
    setupEventListeners();
    loadTestsData();
});

function initializeTestsSection() {
    console.log('Initializing Tests Management Section...');
}

function setupEventListeners() {
    // Smart search functionality
    const smartSearch = document.getElementById('smart-search');
    smartSearch.addEventListener('input', debounce(handleSmartSearch, 300));
    smartSearch.addEventListener('focus', showSearchSuggestions);
    smartSearch.addEventListener('blur', hideSearchSuggestions);
    
    // Filter toggle
    document.getElementById('filter-toggle').addEventListener('click', toggleFiltersPanel);
    
    // Filter controls
    ['score-filter', 'period-filter', 'category-filter', 'formateur-filter', 'show-retakes'].forEach(id => {
        document.getElementById(id).addEventListener('change', applyFilters);
    });
    
    // Per page selector
    document.getElementById('per-page').addEventListener('change', function() {
        perPage = parseInt(this.value);
        currentPage = 1;
        renderTestsTable();
    });
    
    // Search suggestions
    document.querySelectorAll('.suggestion-item').forEach(item => {
        item.addEventListener('click', function() {
            document.getElementById('smart-search').value = this.dataset.search;
            handleSmartSearch();
            hideSearchSuggestions();
        });
    });
}

function loadTestsData() {
    showLoading();
    
    // Use the correct API endpoint from routes
    fetch('/admin/api/tests')
        .then(response => response.json())
        .then(data => {
            console.log('API Response:', data); // Debug log
            if (data.success) {
                allTests = data.data || [];
                filteredTests = [...allTests];
                
                // Process the data to add category and formateur names
                processTestsData();
                
                // Update stats based on loaded data
                updateStatsFromData();
                populateFilterOptions();
                renderTestsTable();
                initializeCharts();
            } else {
                console.log('API Error:', data.message); // Debug log
                showError(data.message || 'Erreur lors du chargement des tests');
            }
        })
        .catch(error => {
            console.error('Error loading tests:', error);
            console.log('Loading sample data as fallback'); // Debug log
            // Show sample data for testing
            loadSampleData();
        })
        .finally(() => {
            hideLoading();
        });
}

function processTestsData() {
    allTests = allTests.map(test => {
        // Add category and process names based on questions
        if (test.quzs && test.quzs.length > 0) {
            const firstQuestion = test.quzs[0];
            if (firstQuestion.category) {
                test.category_name = firstQuestion.category.title;
                test.category_id = firstQuestion.category.id;
                if (firstQuestion.category.process) {
                    test.process_name = firstQuestion.category.process.title;
                }
            }
        }
        
        // Add retake detection
        test.is_retake = test.description && test.description.includes('Test automatique');
        
        // Ensure formateur object exists
        if (!test.formateur) {
            test.formateur = { name: 'N/A', last_name: '' };
        }
        
        return test;
    });
    
    filteredTests = [...allTests];
}

function updateStatsFromData() {
    const totalTests = allTests.length;
    const todayTests = allTests.filter(test => {
        const testDate = new Date(test.created_at);
        const today = new Date();
        return testDate.toDateString() === today.toDateString();
    }).length;
    
    const averageScore = totalTests > 0 ? 
        allTests.reduce((sum, test) => sum + (test.pourcentage || 0), 0) / totalTests : 0;
    
    const successfulTests = allTests.filter(test => (test.pourcentage || 0) >= 50).length;
    const successRate = totalTests > 0 ? (successfulTests / totalTests) * 100 : 0;
    
    updateStats({
        total_tests: totalTests,
        average_score: Math.round(averageScore * 10) / 10,
        today_tests: todayTests,
        success_rate: Math.round(successRate * 10) / 10
    });
}

function loadSampleData() {
    // Sample data for testing when API is not available
    allTests = [
        {
            id: 1,
            user: { name: 'John', last_name: 'Doe', identification: '12345' },
            formateur: { name: 'Marie', last_name: 'Dupont' },
            category_name: 'Ultra-sonic Welding',
            process_name: 'Assemblage',
            category_id: 1,
            formateur_id: 1,
            pourcentage: 85,
            created_at: '2024-06-24T10:30:00Z',
            is_retake: false
        },
        {
            id: 2,
            user: { name: 'Jane', last_name: 'Smith', identification: '67890' },
            formateur: { name: 'Pierre', last_name: 'Martin' },
            category_name: 'Quality Control',
            process_name: 'Contrôle',
            category_id: 2,
            formateur_id: 2,
            pourcentage: 72,
            created_at: '2024-06-23T14:15:00Z',
            is_retake: true
        },
        {
            id: 3,
            user: { name: 'Mike', last_name: 'Johnson', identification: '11111' },
            formateur: { name: 'Sophie', last_name: 'Bernard' },
            category_name: 'Safety Procedures',
            process_name: 'Sécurité',
            category_id: 3,
            formateur_id: 3,
            pourcentage: 45,
            created_at: '2024-06-24T09:00:00Z',
            is_retake: false
        },
        {
            id: 4,
            user: { name: 'Alice', last_name: 'Wonder', identification: '22222' },
            formateur: { name: 'Paul', last_name: 'Durand' },
            category_name: 'Assembly Line',
            process_name: 'Production',
            category_id: 4,
            formateur_id: 4,
            pourcentage: 78,
            created_at: '2024-06-24T11:30:00Z',
            is_retake: false
        },
        {
            id: 5,
            user: { name: 'Bob', last_name: 'Builder', identification: '33333' },
            formateur: { name: 'Claire', last_name: 'Moreau' },
            category_name: 'Quality Assurance',
            process_name: 'Contrôle',
            category_id: 5,
            formateur_id: 5,
            pourcentage: 55,
            created_at: '2024-06-23T16:45:00Z',
            is_retake: true
        }
    ];
    
    filteredTests = [...allTests];
    updateStatsFromData();
    populateFilterOptions();
    renderTestsTable();
    showNotification('Données de test chargées (mode démo)', 'info');
}

function showLoading() {
    document.getElementById('tests-loading').classList.remove('hidden');
    document.getElementById('tests-container').classList.add('hidden');
    document.getElementById('tests-empty').classList.add('hidden');
}

function hideLoading() {
    document.getElementById('tests-loading').classList.add('hidden');
}

function handleSmartSearch() {
    const query = document.getElementById('smart-search').value.toLowerCase().trim();
    
    if (!query) {
        filteredTests = [...allTests];
    } else {
        filteredTests = allTests.filter(test => {
            // Smart search logic
            if (query.startsWith('score:')) {
                return handleScoreQuery(test, query);
            } else if (['today', "aujourd'hui", 'hier', 'semaine', 'mois'].includes(query)) {
                return handleDateQuery(test, query);
            } else if (['failed', 'échec', 'échoué', 'fail'].includes(query)) {
                return (test.pourcentage || 0) < 50;
            } else if (['retake', 'repris', 'retaken'].includes(query)) {
                return test.is_retake === true;
            } else if (['excellent', 'très bien'].includes(query)) {
                return (test.pourcentage || 0) >= 75;
            } else if (['good', 'bien', 'bon'].includes(query)) {
                return (test.pourcentage || 0) >= 50 && (test.pourcentage || 0) < 75;
            } else {
                // General text search - handle potential missing properties
                const searchFields = [
                    test.user?.name || '',
                    test.user?.last_name || '',
                    test.user?.identification || '',
                    test.category_name || '',
                    test.process_name || '',
                    test.formateur?.name || '',
                    test.formateur?.last_name || '',
                    test.description || ''
                ];
                
                return searchFields.some(field => 
                    field.toString().toLowerCase().includes(query)
                );
            }
        });
    }
    
    currentPage = 1;
    renderTestsTable();
}

function handleScoreQuery(test, query) {
    const scoreQuery = query.replace('score:', '');
    const score = test.pourcentage || 0;
    
    if (scoreQuery.startsWith('>=')) {
        return score >= parseInt(scoreQuery.substring(2));
    } else if (scoreQuery.startsWith('<=')) {
        return score <= parseInt(scoreQuery.substring(2));
    } else if (scoreQuery.startsWith('>')) {
        return score > parseInt(scoreQuery.substring(1));
    } else if (scoreQuery.startsWith('<')) {
        return score < parseInt(scoreQuery.substring(1));
    } else if (scoreQuery.startsWith('=')) {
        return score == parseInt(scoreQuery.substring(1));
    } else {
        return score == parseInt(scoreQuery);
    }
}

function handleDateQuery(test, query) {
    const testDate = new Date(test.created_at || test.create_at);
    const today = new Date();
    
    switch(query) {
        case 'today':
        case "aujourd'hui":
            return testDate.toDateString() === today.toDateString();
        case 'hier':
        case 'yesterday':
            const yesterday = new Date(today);
            yesterday.setDate(yesterday.getDate() - 1);
            return testDate.toDateString() === yesterday.toDateString();
        case 'semaine':
        case 'week':
            const weekAgo = new Date(today);
            weekAgo.setDate(weekAgo.getDate() - 7);
            return testDate >= weekAgo;
        case 'mois':
        case 'month':
            const monthAgo = new Date(today);
            monthAgo.setMonth(monthAgo.getMonth() - 1);
            return testDate >= monthAgo;
        default:
            return false;
    }
}

function showSearchSuggestions() {
    document.getElementById('search-suggestions').classList.remove('hidden');
}

function hideSearchSuggestions() {
    setTimeout(() => {
        document.getElementById('search-suggestions').classList.add('hidden');
    }, 200);
}

function toggleFiltersPanel() {
    const panel = document.getElementById('filters-panel');
    panel.classList.toggle('hidden');
    
    const button = document.getElementById('filter-toggle');
    if (panel.classList.contains('hidden')) {
        button.classList.remove('bg-blue-100', 'text-blue-700');
        button.classList.add('bg-gray-100', 'text-gray-700');
    } else {
        button.classList.remove('bg-gray-100', 'text-gray-700');
        button.classList.add('bg-blue-100', 'text-blue-700');
    }
}

function applyFilters() {
    const scoreFilter = document.getElementById('score-filter').value;
    const periodFilter = document.getElementById('period-filter').value;
    const categoryFilter = document.getElementById('category-filter').value;
    const formateurFilter = document.getElementById('formateur-filter').value;
    const showRetakes = document.getElementById('show-retakes').checked;
    
    filteredTests = allTests.filter(test => {
        // Score filter
        if (scoreFilter) {
            switch(scoreFilter) {
                case 'excellent':
                    if (test.pourcentage < 75) return false;
                    break;
                case 'good':
                    if (test.pourcentage < 50 || test.pourcentage >= 75) return false;
                    break;
                case 'poor':
                    if (test.pourcentage >= 50) return false;
                    break;
            }
        }
        
        // Period filter
        if (periodFilter) {
            const testDate = new Date(test.created_at);
            const today = new Date();
            
            switch(periodFilter) {
                case 'today':
                    if (testDate.toDateString() !== today.toDateString()) return false;
                    break;
                case 'week':
                    const weekAgo = new Date(today);
                    weekAgo.setDate(weekAgo.getDate() - 7);
                    if (testDate < weekAgo) return false;
                    break;
                case 'month':
                    const monthAgo = new Date(today);
                    monthAgo.setMonth(monthAgo.getMonth() - 1);
                    if (testDate < monthAgo) return false;
                    break;
            }
        }
        
        // Category filter
        if (categoryFilter && test.category_id != categoryFilter) return false;
        
        // Formateur filter
        if (formateurFilter && test.formateur_id != formateurFilter) return false;
        
        // Retakes filter
        if (showRetakes && !test.is_retake) return false;
        
        return true;
    });
    
    currentPage = 1;
    renderTestsTable();
}

function clearFilters() {
    document.getElementById('smart-search').value = '';
    document.getElementById('score-filter').value = '';
    document.getElementById('period-filter').value = '';
    document.getElementById('category-filter').value = '';
    document.getElementById('formateur-filter').value = '';
    document.getElementById('show-retakes').checked = false;
    
    filteredTests = [...allTests];
    currentPage = 1;
    renderTestsTable();
}

function populateFilterOptions() {
    // Populate categories - handle missing category data
    const categories = [];
    const categoryMap = new Map();
    
    allTests.forEach(test => {
        if (test.category_id && test.category_name && !categoryMap.has(test.category_id)) {
            categoryMap.set(test.category_id, {
                id: test.category_id,
                name: test.category_name
            });
            categories.push({
                id: test.category_id,
                name: test.category_name
            });
        }
    });
    
    const categorySelect = document.getElementById('category-filter');
    if (categorySelect) {
        categorySelect.innerHTML = '<option value="">Toutes les catégories</option>';
        categories.forEach(cat => {
            categorySelect.innerHTML += `<option value="${cat.id}">${cat.name}</option>`;
        });
    }
    
    // Populate formateurs - handle missing formateur data
    const formateurs = [];
    const formateurMap = new Map();
    
    allTests.forEach(test => {
        if (test.formateur_id && test.formateur && !formateurMap.has(test.formateur_id)) {
            const formateurName = `${test.formateur.name || 'N/A'} ${test.formateur.last_name || ''}`.trim();
            formateurMap.set(test.formateur_id, {
                id: test.formateur_id,
                name: formateurName
            });
            formateurs.push({
                id: test.formateur_id,
                name: formateurName
            });
        }
    });
    
    const formateurSelect = document.getElementById('formateur-filter');
    if (formateurSelect) {
        formateurSelect.innerHTML = '<option value="">Tous les formateurs</option>';
        formateurs.forEach(form => {
            formateurSelect.innerHTML += `<option value="${form.id}">${form.name}</option>`;
        });
    }
}

function renderTestsTable() {
    if (filteredTests.length === 0) {
        showEmptyState();
        return;
    }
    
    showTestsTable();
    
    // Sort tests
    const sortedTests = [...filteredTests].sort((a, b) => {
        let aVal, bVal;
        
        switch(currentSort.field) {
            case 'user':
                aVal = `${a.user.name} ${a.user.last_name}`;
                bVal = `${b.user.name} ${b.user.last_name}`;
                break;
            case 'category':
                aVal = a.category_name;
                bVal = b.category_name;
                break;
            case 'formateur':
                aVal = `${a.formateur.name} ${a.formateur.last_name}`;
                bVal = `${b.formateur.name} ${b.formateur.last_name}`;
                break;
            case 'score':
                aVal = a.pourcentage;
                bVal = b.pourcentage;
                break;
            case 'date':
                aVal = new Date(a.created_at);
                bVal = new Date(b.created_at);
                break;
            default:
                aVal = a.id;
                bVal = b.id;
        }
        
        if (currentSort.direction === 'asc') {
            return aVal > bVal ? 1 : -1;
        } else {
            return aVal < bVal ? 1 : -1;
        }
    });
    
    // Pagination
    const startIndex = (currentPage - 1) * perPage;
    const endIndex = startIndex + perPage;
    const paginatedTests = sortedTests.slice(startIndex, endIndex);
    
    // Render table rows
    const tbody = document.getElementById('tests-table-body');
    tbody.innerHTML = '';
    
    paginatedTests.forEach(test => {
        const row = createTestRow(test);
        tbody.appendChild(row);
    });
    
    // Update pagination info
    updatePaginationInfo(sortedTests.length, startIndex, Math.min(endIndex, sortedTests.length));
    renderPaginationControls(sortedTests.length);
}

function createTestRow(test) {
    const row = document.createElement('tr');
    row.className = 'hover:bg-gray-50 fade-in';
    
    const score = test.pourcentage || 0;
    const scoreClass = score >= 75 ? 'score-excellent' : 
                      score >= 50 ? 'score-good' : 'score-poor';
    
    const statusClass = test.is_retake ? 'status-retake' : 
                       score >= 50 ? 'status-completed' : 'status-failed';
    
    const statusText = test.is_retake ? 'Repris' : 
                      score >= 50 ? 'Réussi' : 'Échoué';
    
    // Safe property access with defaults
    const userName = test.user ? `${test.user.name || 'N/A'} ${test.user.last_name || ''}`.trim() : 'N/A';
    const userInitials = test.user ? 
        `${(test.user.name || 'N').charAt(0)}${(test.user.last_name || 'A').charAt(0)}` : 'NA';
    const userIdentification = test.user ? test.user.identification || 'N/A' : 'N/A';
    const categoryName = test.category_name || 'N/A';
    const processName = test.process_name || 'N/A';
    const formateurName = test.formateur ? 
        `${test.formateur.name || 'N/A'} ${test.formateur.last_name || ''}`.trim() : 'N/A';
    
    row.innerHTML = `
        <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                    ${userInitials}
                </div>
                <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">${userName}</div>
                    <div class="text-sm text-gray-500">ID: ${userIdentification}</div>
                </div>
            </div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">${categoryName}</div>
            <div class="text-sm text-gray-500">${processName}</div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">${formateurName}</div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ${scoreClass}">
                ${score}%
            </span>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            ${formatDate(test.created_at || test.create_at)}
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <button onclick="viewTestDetails(${test.id})" class="text-blue-600 hover:text-blue-900 mr-3" title="Voir les détails">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
            </button>
            <button onclick="editTest(${test.id})" class="text-green-600 hover:text-green-900 mr-3" title="Modifier">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
            </button>
            <button onclick="deleteTest(${test.id})" class="text-red-600 hover:text-red-900" title="Supprimer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
            </button>
        </td>
    `;
    
    return row;
}

function showTestsTable() {
    document.getElementById('tests-container').classList.remove('hidden');
    document.getElementById('tests-empty').classList.add('hidden');
}

function showEmptyState() {
    document.getElementById('tests-container').classList.add('hidden');
    document.getElementById('tests-empty').classList.remove('hidden');
}

function updateStats(stats) {
    document.getElementById('total-tests').textContent = stats.total_tests || 0;
    document.getElementById('average-score').textContent = (stats.average_score || 0) + '%';
    document.getElementById('today-tests').textContent = stats.today_tests || 0;
    document.getElementById('success-rate').textContent = (stats.success_rate || 0) + '%';
}

function updatePaginationInfo(total, from, to) {
    document.getElementById('results-count').textContent = `${total} résultat(s)`;
    document.getElementById('showing-from').textContent = from + 1;
    document.getElementById('showing-to').textContent = to;
    document.getElementById('total-results').textContent = total;
}

function renderPaginationControls(totalItems) {
    const totalPages = Math.ceil(totalItems / perPage);
    const controls = document.getElementById('pagination-controls');
    controls.innerHTML = '';
    
    if (totalPages <= 1) return;
    
    // Previous button
    const prevBtn = document.createElement('button');
    prevBtn.className = `px-3 py-1 rounded-md text-sm ${currentPage === 1 ? 'bg-gray-100 text-gray-400 cursor-not-allowed' : 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-300'}`;
    prevBtn.textContent = 'Précédent';
    prevBtn.disabled = currentPage === 1;
    prevBtn.onclick = () => {
        if (currentPage > 1) {
            currentPage--;
            renderTestsTable();
        }
    };
    controls.appendChild(prevBtn);
    
    // Page numbers
    const startPage = Math.max(1, currentPage - 2);
    const endPage = Math.min(totalPages, currentPage + 2);
    
    for (let i = startPage; i <= endPage; i++) {
        const pageBtn = document.createElement('button');
        pageBtn.className = `px-3 py-1 rounded-md text-sm ${i === currentPage ? 'bg-blue-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-300'}`;
        pageBtn.textContent = i;
        pageBtn.onclick = () => {
            currentPage = i;
            renderTestsTable();
        };
        controls.appendChild(pageBtn);
    }
    
    // Next button
    const nextBtn = document.createElement('button');
    nextBtn.className = `px-3 py-1 rounded-md text-sm ${currentPage === totalPages ? 'bg-gray-100 text-gray-400 cursor-not-allowed' : 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-300'}`;
    nextBtn.textContent = 'Suivant';
    nextBtn.disabled = currentPage === totalPages;
    nextBtn.onclick = () => {
        if (currentPage < totalPages) {
            currentPage++;
            renderTestsTable();
        }
    };
    controls.appendChild(nextBtn);
}

function sortTable(field) {
    if (currentSort.field === field) {
        currentSort.direction = currentSort.direction === 'asc' ? 'desc' : 'asc';
    } else {
        currentSort.field = field;
        currentSort.direction = 'asc';
    }
    
    renderTestsTable();
}

function viewTestDetails(testId) {
    // Show modal with enhanced test details
    const test = allTests.find(t => t.id === testId);
    if (!test) {
        showNotification('Test not found', 'error');
        return;
    }
    
    const modal = document.getElementById('test-details-modal');
    const content = document.getElementById('test-details-content');
    
    // Calculate additional metrics
    const score = test.pourcentage || 0;
    const scoreClass = score >= 75 ? 'score-excellent' : score >= 50 ? 'score-good' : 'score-poor';
    const scoreColor = score >= 75 ? 'text-green-600' : score >= 50 ? 'text-yellow-600' : 'text-red-600';
    const scoreBg = score >= 75 ? 'bg-green-50' : score >= 50 ? 'bg-yellow-50' : 'bg-red-50';
    
    // Safe property access
    const userName = test.user ? `${test.user.name || 'N/A'} ${test.user.last_name || ''}`.trim() : 'N/A';
    const userInitials = test.user ? 
        `${(test.user.name || 'N').charAt(0)}${(test.user.last_name || 'A').charAt(0)}` : 'NA';
    const userIdentification = test.user ? test.user.identification || 'N/A' : 'N/A';
    const categoryName = test.category_name || 'N/A';
    const processName = test.process_name || 'N/A';
    const formateurName = test.formateur ? 
        `${test.formateur.name || 'N/A'} ${test.formateur.last_name || ''}`.trim() : 'N/A';
    
    // Get status information
    const statusInfo = test.is_retake ? 
        { text: 'Test Retaken', class: 'bg-purple-100 text-purple-800', icon: 'refresh' } :
        score >= 50 ? 
        { text: 'Passed', class: 'bg-green-100 text-green-800', icon: 'check' } :
        { text: 'Failed', class: 'bg-red-100 text-red-800', icon: 'x' };
    
    content.innerHTML = `
        <div class="space-y-3">
            <!-- Compact Header with User and Score -->
            <div class="flex items-center justify-between p-3 bg-gradient-to-r from-blue-50 to-purple-50 rounded-lg border">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-sm">
                        ${userInitials}
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900">${userName}</h3>
                        <p class="text-xs text-gray-600">ID: ${userIdentification}</p>
                        <span class="inline-flex items-center px-1.5 py-0.5 rounded-full text-xs font-medium ${statusInfo.class}">
                            <svg class="w-2 h-2 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                ${getStatusIcon(statusInfo.icon)}
                            </svg>
                            ${statusInfo.text}
                        </span>
                    </div>
                </div>
                <div class="text-center">
                    <div class="w-12 h-12 ${scoreBg} rounded-full flex items-center justify-center border-2 border-white shadow">
                        <span class="text-lg font-bold ${scoreColor}">${score}%</span>
                    </div>
                </div>
            </div>

            <!-- Compact Information Grid -->
            <div class="grid grid-cols-2 gap-3">
                <!-- User Information -->
                <div class="bg-white p-3 rounded-lg border border-gray-200">
                    <div class="flex items-center mb-2">
                        <div class="w-5 h-5 bg-blue-100 rounded flex items-center justify-center mr-2">
                            <svg class="w-3 h-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h4 class="text-sm font-semibold text-gray-900">User Info</h4>
                    </div>
                    <div class="space-y-1 text-xs">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Name:</span>
                            <span class="text-gray-900 font-medium">${userName}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">ID:</span>
                            <span class="text-gray-900 font-mono">${userIdentification}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Trainer:</span>
                            <span class="text-gray-900">${formateurName}</span>
                        </div>
                    </div>
                </div>

                <!-- Test Information -->
                <div class="bg-white p-3 rounded-lg border border-gray-200">
                    <div class="flex items-center mb-2">
                        <div class="w-5 h-5 bg-green-100 rounded flex items-center justify-center mr-2">
                            <svg class="w-3 h-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h4 class="text-sm font-semibold text-gray-900">Test Details</h4>
                    </div>
                    <div class="space-y-1 text-xs">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Category:</span>
                            <span class="text-gray-900">${categoryName}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Process:</span>
                            <span class="text-gray-900">${processName}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Date:</span>
                            <span class="text-gray-900">${formatDate(test.created_at)}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Type:</span>
                            <span class="text-gray-900">${test.is_retake ? 'Retake' : 'First'}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description Section -->
            ${test.description ? `
            <div class="bg-white p-3 rounded-lg border border-gray-200">
                <div class="flex items-center mb-2">
                    <div class="w-5 h-5 bg-yellow-100 rounded flex items-center justify-center mr-2">
                        <svg class="w-3 h-3 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h4 class="text-sm font-semibold text-gray-900">Description</h4>
                </div>
                <div class="text-xs text-gray-700 bg-gray-50 p-2 rounded border">
                    ${test.description}
                </div>
            </div>
            ` : ''}

            <!-- Compact Performance Metrics -->
            <div class="bg-gradient-to-r from-gray-50 to-gray-100 p-3 rounded-lg border">
                <h4 class="text-sm font-semibold text-gray-900 mb-2 flex items-center">
                    <svg class="w-4 h-4 mr-1 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z"></path>
                    </svg>
                    Performance
                </h4>
                <div class="grid grid-cols-3 gap-2">
                    <div class="bg-white p-2 rounded border text-center">
                        <div class="text-lg font-bold ${scoreColor}">${score}%</div>
                        <div class="text-xs text-gray-500">Score</div>
                    </div>
                    <div class="bg-white p-2 rounded border text-center">
                        <div class="text-lg font-bold ${score >= 50 ? 'text-green-600' : 'text-red-600'}">
                            ${score >= 50 ? 'PASS' : 'FAIL'}
                        </div>
                        <div class="text-xs text-gray-500">Result</div>
                    </div>
                    <div class="bg-white p-2 rounded border text-center">
                        <div class="text-lg font-bold text-blue-600">${test.is_retake ? '2nd' : '1st'}</div>
                        <div class="text-xs text-gray-500">Attempt</div>
                    </div>
                </div>
            </div>

            <!-- Compact Action Buttons -->
            <div class="flex items-center justify-end gap-2 pt-2 border-t border-gray-200">
                <button onclick="closeTestDetailsModal()" class="px-3 py-1.5 text-sm text-gray-700 bg-gray-100 hover:bg-gray-200 rounded transition-colors duration-200 flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    Close
                </button>
                <button onclick="editTest(${testId}); closeTestDetailsModal();" class="px-3 py-1.5 text-sm bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors duration-200 flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit
                </button>
            </div>
        </div>
    `;
    
    // Add entrance animation
    modal.classList.remove('hidden');
    setTimeout(() => {
        modal.querySelector('.relative').classList.add('animate-fadeInUp');
    }, 10);
}

function closeTestDetailsModal() {
    const modal = document.getElementById('test-details-modal');
    const modalContent = modal.querySelector('.relative');
    
    // Add exit animation
    modalContent.classList.add('animate-fadeOutDown');
    
    setTimeout(() => {
        modal.classList.add('hidden');
        modalContent.classList.remove('animate-fadeInUp', 'animate-fadeOutDown');
    }, 300);
}

function deleteTest(testId) {
    if (!confirm('Êtes-vous sûr de vouloir supprimer ce test ?')) return;
    
    // Simulate API call to delete test
    fetch(`/admin/api/tests/${testId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Remove from local data
            allTests = allTests.filter(t => t.id !== testId);
            filteredTests = filteredTests.filter(t => t.id !== testId);
            renderTestsTable();
            showNotification('Test supprimé avec succès', 'success');
        } else {
            showNotification('Erreur lors de la suppression', 'error');
        }
    })
    .catch(error => {
        console.error('Error deleting test:', error);
        showNotification('Erreur de connexion', 'error');
    });
}

function exportTests() {
    // Generate CSV export
    const csvData = filteredTests.map(test => [
        `${test.user.name} ${test.user.last_name}`,
        test.user.identification,
        test.category_name,
        `${test.formateur.name} ${test.formateur.last_name}`,
        test.pourcentage,
        formatDate(test.created_at),
        test.is_retake ? 'Repris' : 'Premier'
    ]);
    
    const headers = ['Utilisateur', 'ID', 'Catégorie', 'Formateur', 'Score (%)', 'Date', 'Type'];
    const csv = [headers, ...csvData].map(row => row.join(',')).join('\n');
    
    const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
    const link = document.createElement('a');
    const url = URL.createObjectURL(blob);
    link.setAttribute('href', url);
    link.setAttribute('download', `tests_export_${new Date().toISOString().split('T')[0]}.csv`);
    link.style.visibility = 'hidden';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

function initializeCharts() {
    // Initialize Chart.js charts
    // This would require Chart.js library to be loaded
    console.log('Charts would be initialized here with Chart.js');
}

function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('fr-FR', {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    });
}

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

function showNotification(message, type = 'info') {
    // Create and show notification
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 px-6 py-3 rounded-lg shadow-lg z-50 ${
        type === 'success' ? 'bg-green-500 text-white' : 
        type === 'error' ? 'bg-red-500 text-white' : 
        'bg-blue-500 text-white'
    }`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

function showError(message) {
    showNotification(message, 'error');
}

function editTest(testId) {
    // Find the test to edit
    const test = allTests.find(t => t.id === testId);
    if (!test) {
        showNotification('Test introuvable', 'error');
        return;
    }
    
    // Show edit modal or redirect to edit page
    const modal = document.getElementById('test-details-modal');
    const content = document.getElementById('test-details-content');
    
    // Update modal title
    modal.querySelector('h3').textContent = 'Modifier le Test';
    
    content.innerHTML = `
        <form id="edit-test-form" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="font-semibold text-gray-900 mb-4">Informations Utilisateur</h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                            <input type="text" value="${test.user.name}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                            <input type="text" value="${test.user.last_name}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">ID</label>
                            <input type="text" value="${test.user.identification}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                        </div>
                    </div>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-900 mb-4">Détails du Test</h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Score (%)</label>
                            <input type="number" id="edit-score" value="${test.pourcentage}" min="0" max="100" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
                            <input type="text" value="${test.category_name}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Formateur</label>
                            <input type="text" value="${test.formateur.name} ${test.formateur.last_name}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                            <input type="text" value="${formatDate(test.created_at)}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea id="edit-description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Description du test...">${test.description || ''}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-200">
                <button type="button" onclick="closeTestDetailsModal()" class="px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors">
                    Annuler
                </button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    Sauvegarder
                </button>
            </div>
        </form>
    `;
    
    // Add form submit handler
    document.getElementById('edit-test-form').addEventListener('submit', function(e) {
        e.preventDefault();
        saveTestChanges(testId);
    });
    
    modal.classList.remove('hidden');
}

function saveTestChanges(testId) {
    const newScore = document.getElementById('edit-score').value;
    const newDescription = document.getElementById('edit-description').value;
    
    if (!newScore || newScore < 0 || newScore > 100) {
        showNotification('Veuillez entrer un score valide (0-100)', 'error');
        return;
    }
    
    // Simulate API call to update test
    fetch(`/admin/api/tests/${testId}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            pourcentage: parseFloat(newScore),
            description: newDescription
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update local data
            const testIndex = allTests.findIndex(t => t.id === testId);
            if (testIndex !== -1) {
                allTests[testIndex].pourcentage = parseFloat(newScore);
                allTests[testIndex].description = newDescription;
            }
            
            const filteredIndex = filteredTests.findIndex(t => t.id === testId);
            if (filteredIndex !== -1) {
                filteredTests[filteredIndex].pourcentage = parseFloat(newScore);
                filteredTests[filteredIndex].description = newDescription;
            }
            
            // Update stats and re-render table
            updateStatsFromData();
            renderTestsTable();
            closeTestDetailsModal();
            showNotification('Test modifié avec succès', 'success');
        } else {
            showNotification('Erreur lors de la modification', 'error');
        }
    })
    .catch(error => {
        console.error('Error updating test:', error);
        // For demo purposes, update locally
        const testIndex = allTests.findIndex(t => t.id === testId);
        if (testIndex !== -1) {
            allTests[testIndex].pourcentage = parseFloat(newScore);
            allTests[testIndex].description = newDescription;
        }
        
        const filteredIndex = filteredTests.findIndex(t => t.id === testId);
        if (filteredIndex !== -1) {
            filteredTests[filteredIndex].pourcentage = parseFloat(newScore);
            filteredTests[filteredIndex].description = newDescription;
        }
        
        updateStatsFromData();
        renderTestsTable();
        closeTestDetailsModal();
        showNotification('Test modifié avec succès (mode démo)', 'success');
    });
}

// Helper function to get status icons
function getStatusIcon(iconType) {
    const icons = {
        'check': '<path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>',
        'x': '<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>',
        'refresh': '<path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"></path>'
    };
    return icons[iconType] || icons['check'];
}

// Enhanced modal close function with animation
function closeTestDetailsModal() {
    const modal = document.getElementById('test-details-modal');
    const modalContent = modal.querySelector('.relative');
    
    // Add exit animation
    modalContent.classList.add('animate-fadeOutDown');
    
    setTimeout(() => {
        modal.classList.add('hidden');
        modalContent.classList.remove('animate-fadeInUp', 'animate-fadeOutDown');
    }, 300);
}
</script>