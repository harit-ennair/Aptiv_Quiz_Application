<!-- Categories Management -->
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div>
                <!-- <h2 class="text-xl lg:text-2xl font-bold text-gray-900">Gestion des Catégories</h2> -->
                <p class="text-gray-600 text-sm lg:text-base mt-1">Organiser les catégories par processus</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <div class="relative">
                    <input type="text" id="category-search" placeholder="Rechercher une catégorie..." 
                           class="w-full sm:w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-aptiv-orange-500 focus:border-transparent text-sm">
                    <svg class="absolute left-3 top-2.5 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <select id="process-filter" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-aptiv-orange-500 focus:border-transparent text-sm">
                    <option value="">Tous les processus</option>
                </select>
                <button onclick="adminDashboard.openCategoryModal()" class="bg-aptiv-orange-600 hover:bg-aptiv-orange-700 text-white px-4 py-2 rounded-lg text-sm transition-colors flex items-center justify-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Ajouter
                </button>
            </div>
        </div>
    </div>

    <!-- Categories Statistics -->
    <div id="categories-stats" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 hidden">
        <!-- Stats cards will be populated here -->
    </div>

    <!-- Loading State -->
    <div id="categories-loading" class="bg-white rounded-xl shadow-sm border border-gray-200 p-8 text-center">
        <div class="spinner mx-auto mb-4"></div>
        <p class="text-gray-600">Chargement des catégories...</p>
    </div>

    <!-- Empty State -->
    <div id="categories-empty" class="bg-white rounded-xl shadow-sm border border-gray-200 p-8 text-center hidden">
        <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
        </svg>
        <h3 class="text-lg font-medium text-gray-900 mb-2">Aucune catégorie trouvée</h3>
        <p class="text-gray-500">Il n'y a pas de catégories dans le système.</p>
    </div>

    <!-- Desktop Process-based View -->
    <div id="categories-desktop" class="space-y-6 hidden lg:block">
        <!-- Categories will be grouped by process here -->
    </div>

    <!-- Mobile Process-based View -->
    <div id="categories-mobile" class="space-y-6 lg:hidden hidden">
        <!-- Mobile process groups will be populated here -->
    </div>
</div>

<!-- Category Modal -->
<div id="category-modal" class="modal fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
    <div class="modal-body bg-white rounded-lg max-w-lg w-full max-h-screen overflow-y-auto">
        <div class="px-4 lg:px-6 py-4 border-b border-gray-200">
            <h3 id="category-modal-title" class="text-lg font-medium text-gray-900">Ajouter une catégorie</h3>
        </div>
        
        <form id="category-form" class="p-4 lg:p-6 space-y-4">
            <input type="hidden" id="category-id">
            
            <div>
                <label for="category-title" class="block text-sm font-medium text-gray-700 mb-2">Titre *</label>
                <input type="text" id="category-title" name="title" required 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500 text-sm lg:text-base">
            </div>
            
            <div>
                <label for="category-process" class="block text-sm font-medium text-gray-700 mb-2">Processus *</label>
                <select id="category-process" name="process_id" required 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500 text-sm lg:text-base">
                    <option value="">Sélectionner un processus</option>
                </select>
            </div>
            
            <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4">                <button type="button" onclick="adminDashboard.closeCategoryModal()" 
                        class="px-4 py-2 text-gray-700 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors text-sm lg:text-base">
                    Annuler
                </button>
                <button type="submit" 
                        class="bg-aptiv-orange-600 hover:bg-aptiv-orange-700 text-white px-4 py-2 rounded-md transition-colors text-sm lg:text-base">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// Add categories filtering functionality
document.addEventListener('DOMContentLoaded', function() {
    const categorySearch = document.getElementById('category-search');
    const processFilter = document.getElementById('process-filter');
    
    if (categorySearch) {
        categorySearch.addEventListener('input', function() {
            if (window.adminDashboard) {
                window.adminDashboard.filterCategories();
            }
        });
    }
    
    if (processFilter) {
        processFilter.addEventListener('change', function() {
            if (window.adminDashboard) {
                window.adminDashboard.filterCategories();
            }
        });
    }
});
</script>