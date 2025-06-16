<!-- Categories Management -->
<div class="bg-white rounded-lg shadow-sm lg:shadow">
    <div class="px-4 lg:px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">        <h2 class="text-lg font-medium text-gray-900">Gestion des Catégories</h2>
        <button onclick="adminDashboard.openCategoryModal()" class="bg-aptiv-orange-600 hover:bg-aptiv-orange-700 text-white px-4 py-2 rounded-md text-sm transition-colors flex items-center justify-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Ajouter une catégorie
        </button>
    </div>
    
    <div class="p-4 lg:p-6">
        <!-- Search and Filter -->
        <div class="mb-4 lg:mb-6">
            <div class="flex flex-col sm:flex-row gap-3 lg:gap-4">
                <div class="flex-1">                    <input type="text" id="category-search" placeholder="Rechercher une catégorie..." 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500 text-sm lg:text-base">
                </div>                <select id="process-filter" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500 text-sm lg:text-base">
                    <option value="">Tous les processus</option>
                </select>                <button onclick="adminDashboard.loadCategories()" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-md transition-colors text-sm whitespace-nowrap">
                    Actualiser
                </button>
            </div>
        </div>
        
        <!-- Mobile Cards View -->
        <div id="categories-mobile" class="block lg:hidden space-y-3">
            <!-- Mobile cards will be populated by JavaScript -->
        </div>
        
        <!-- Desktop Table View -->
        <div id="categories-table" class="hidden lg:block overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Processus</th>
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date de création</th>
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="categories-tbody" class="bg-white divide-y divide-gray-200">
                    <!-- Table rows will be populated by JavaScript -->
                </tbody>
            </table>
        </div>
        
        <!-- Loading State -->        <div id="categories-loading" class="text-center py-8 hidden">
            <div class="spinner mx-auto mb-4"></div>
            <p class="text-gray-500">Chargement des catégories...</p>
        </div>
        
        <!-- Empty State -->
        <div id="categories-empty" class="text-center py-8 hidden">
            <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
            </svg>
            <p class="text-gray-500">Aucune catégorie trouvée</p>
        </div>
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
