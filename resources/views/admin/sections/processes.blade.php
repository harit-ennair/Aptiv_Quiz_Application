<!-- Processes Management -->
<div class="bg-white rounded-lg shadow-sm lg:shadow">
    <div class="px-4 lg:px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">
        <h2 class="text-lg font-medium text-gray-900">Gestion des Processus</h2>
        <button onclick="openProcessModal()" class="bg-aptiv-orange-600 hover:bg-aptiv-orange-700 text-white px-4 py-2 rounded-md text-sm transition-colors flex items-center justify-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Ajouter un processus
        </button>
    </div>
    
    <div class="p-4 lg:p-6">
        <!-- Search and Filter -->
        <div class="mb-4 lg:mb-6">
            <div class="flex flex-col sm:flex-row gap-3 lg:gap-4">
                <div class="flex-1">
                    <input type="text" id="process-search" placeholder="Rechercher un processus..." 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500 text-sm lg:text-base">
                </div>
                <button onclick="loadProcesses()" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-md transition-colors text-sm whitespace-nowrap">
                    Actualiser
                </button>
            </div>
        </div>
          <!-- Mobile Cards View -->
        <div id="processes-mobile" class="block lg:hidden space-y-3">
            <!-- Mobile cards will be populated by JavaScript -->
        </div>
        
        <!-- Desktop Table View -->
        <div id="processes-table" class="hidden lg:block overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégories</th>
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date de création</th>
                        <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="processes-tbody" class="bg-white divide-y divide-gray-200">
                    <!-- Table rows will be populated by JavaScript -->
                </tbody>
            </table>
        </div>
        
        <!-- Loading State -->
        <div id="processes-loading" class="text-center py-8 hidden">
            <div class="spinner mx-auto mb-4"></div>
            <p class="text-gray-500">Chargement des processus...</p>
        </div>
        
        <!-- Empty State -->
        <div id="processes-empty" class="text-center py-8 hidden">
            <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
            </svg>
            <p class="text-gray-500">Aucun processus trouvé</p>
        </div>
    </div>
</div>

<!-- Process Modal -->
<div id="process-modal" class="modal fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
    <div class="modal-body bg-white rounded-lg max-w-lg w-full max-h-screen overflow-y-auto">
        <div class="px-4 lg:px-6 py-4 border-b border-gray-200">
            <h3 id="process-modal-title" class="text-lg font-medium text-gray-900">Ajouter un processus</h3>
        </div>
        
        <form id="process-form" class="p-4 lg:p-6 space-y-4">
            <input type="hidden" id="process-id">
            
            <div>
                <label for="process-title" class="block text-sm font-medium text-gray-700 mb-2">Titre *</label>
                <input type="text" id="process-title" name="title" required 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500 text-sm lg:text-base">
            </div>
            
            <div>
                <label for="process-description" class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                <textarea id="process-description" name="description" rows="4" required 
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500 text-sm lg:text-base resize-none"></textarea>
            </div>
            
            <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4">
                <button type="button" onclick="closeProcessModal()" 
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
