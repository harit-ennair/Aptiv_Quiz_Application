<!-- Formateurs Management -->
<div class="bg-white rounded-lg shadow-sm lg:shadow">
    <div class="px-4 lg:px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">
        <h2 class="text-lg font-medium text-gray-900">Gestion des Formateurs</h2>
        <button onclick="openFormateurModal()" class="bg-aptiv-orange-600 hover:bg-aptiv-orange-700 text-white px-4 py-2 rounded-md text-sm transition-colors flex items-center justify-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Ajouter un formateur
        </button>
    </div>
    
    <div class="p-4 lg:p-6">
        <!-- Search and Filter -->
        <div class="mb-4 lg:mb-6">
            <div class="flex flex-col sm:flex-row gap-3 lg:gap-4">
                <div class="flex-1">
                    <input type="text" id="formateur-search" placeholder="Rechercher un formateur..." 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500 text-sm lg:text-base">
                </div>
                <button onclick="loadFormateurs()" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-md transition-colors text-sm whitespace-nowrap">
                    Actualiser
                </button>
            </div>
        </div>
        
        <!-- Mobile Cards View -->
        <div id="formateurs-mobile" class="block lg:hidden space-y-3">
            <!-- Mobile cards will be populated by JavaScript -->
        </div>
        
        <!-- Desktop Table View -->
        <div id="formateurs-table" class="hidden lg:block overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prénom</th>
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Identification</th>
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date de création</th>
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="formateurs-tbody" class="bg-white divide-y divide-gray-200">
                    <!-- Table rows will be populated by JavaScript -->
                </tbody>
            </table>
        </div>
        
        <!-- Loading State -->
        <div id="formateurs-loading" class="text-center py-8 hidden">
            <div class="spinner mx-auto mb-4"></div>
            <p class="text-gray-500">Chargement des formateurs...</p>
        </div>
        
        <!-- Empty State -->
        <div id="formateurs-empty" class="text-center py-8 hidden">
            <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
            <p class="text-gray-500">Aucun formateur trouvé</p>
        </div>
    </div>
</div>

<!-- Formateur Modal -->
<div id="formateur-modal" class="modal fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
    <div class="modal-body bg-white rounded-lg max-w-lg w-full max-h-screen overflow-y-auto">
        <div class="px-4 lg:px-6 py-4 border-b border-gray-200">
            <h3 id="formateur-modal-title" class="text-lg font-medium text-gray-900">Ajouter un formateur</h3>
        </div>
        
        <form id="formateur-form" class="p-4 lg:p-6 space-y-4">
            <input type="hidden" id="formateur-id">
            
            <div>
                <label for="formateur-name" class="block text-sm font-medium text-gray-700 mb-2">Prénom *</label>
                <input type="text" id="formateur-name" name="name" required 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500 text-sm lg:text-base">
            </div>
            
            <div>
                <label for="formateur-last-name" class="block text-sm font-medium text-gray-700 mb-2">Nom *</label>
                <input type="text" id="formateur-last-name" name="last_name" required 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500 text-sm lg:text-base">
            </div>
              <div>
                <label for="formateur-identification" class="block text-sm font-medium text-gray-700 mb-2">Identification *</label>
                <input type="number" id="formateur-identification" name="identification" required 
                       class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500 text-base lg:text-lg font-medium">
            </div>
            
            <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4">
                <button type="button" onclick="closeFormateurModal()" 
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
