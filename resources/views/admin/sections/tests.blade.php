<!-- Tests Management -->
<div class="bg-white rounded-lg shadow">
    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
        <h2 class="text-lg font-medium text-gray-900">Gestion des Tests</h2>
        <button onclick="openTestModal()" class="bg-aptiv-orange-600 hover:bg-aptiv-orange-700 text-white px-4 py-2 rounded-md text-sm transition-colors">
            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Ajouter un test
        </button>
    </div>
    
    <div class="p-6">        <!-- Search and Filter -->
        <div class="mb-6">
            <div class="flex flex-col sm:flex-row gap-4">
                <div class="flex-1">
                    <input type="text" id="test-search" placeholder="Rechercher un test..." 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500">
                </div>
                <select id="test-formateur-filter" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500">
                    <option value="">Tous les formateurs</option>
                </select>
                <select id="test-category-filter" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500">
                    <option value="">Toutes les catégories</option>
                </select>                <select id="test-percentage-filter" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500">
                    <option value="">Tous les pourcentages</option>
                    <option value="75-100">🏆 Excellent (75% - 100%)</option>
                    <option value="50-74">📈 Moyen (50% - 74%)</option>
                    <option value="0-49">❌ Faible (0% - 49%)</option>
                </select>
                <button onclick="loadTests()" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-md transition-colors">
                    Actualiser
                </button>
            </div>
            
            <!-- Performance Legend -->
     
        </div>
          <!-- Mobile Cards View -->
        <div id="tests-mobile" class="block lg:hidden space-y-4">
            <!-- Mobile cards will be populated by JavaScript -->
        </div>
        
        <!-- Desktop Table View -->
        <div id="tests-table" class="hidden lg:block overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Utilisateur</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Formateur</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pourcentage</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="tests-tbody" class="bg-white divide-y divide-gray-200">
                    <!-- Table rows will be populated by JavaScript -->
                </tbody>
            </table>
        </div>
        
        <!-- Loading State -->
        <div id="tests-loading" class="text-center py-8 hidden">
            <div class="spinner mx-auto mb-4"></div>
            <p class="text-gray-500">Chargement des tests...</p>
        </div>
        
        <!-- Empty State -->
        <div id="tests-empty" class="text-center py-8 hidden">
            <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
            </svg>
            <p class="text-gray-500">Aucun test trouvé</p>
        </div>
    </div>
</div>

<!-- Test Modal -->
<div id="test-modal" class="modal fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="modal-body bg-white rounded-lg max-w-md w-full mx-4 max-h-screen overflow-y-auto">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 id="test-modal-title" class="text-lg font-medium text-gray-900">Ajouter un test</h3>
        </div>
        
        <form id="test-form" class="p-6 space-y-4">
            <input type="hidden" id="test-id">
            
            <div>
                <label for="test-user" class="block text-sm font-medium text-gray-700 mb-2">Utilisateur *</label>
                <select id="test-user" name="user_id" required 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500">
                    <option value="">Sélectionner un utilisateur</option>
                </select>
            </div>
            
            <div>
                <label for="test-formateur" class="block text-sm font-medium text-gray-700 mb-2">Formateur *</label>
                <select id="test-formateur" name="formateur_id" required 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500">
                    <option value="">Sélectionner un formateur</option>
                </select>
            </div>
            
            <div>
                <label for="test-description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea id="test-description" name="description" rows="3" 
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500"></textarea>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="test-resultat" class="block text-sm font-medium text-gray-700 mb-2">Résultat *</label>
                    <input type="number" id="test-resultat" name="resultat" min="0" max="100" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500">
                </div>
                
                <div>
                    <label for="test-pourcentage" class="block text-sm font-medium text-gray-700 mb-2">Pourcentage *</label>
                    <input type="number" id="test-pourcentage" name="pourcentage" min="0" max="100" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500">
                </div>
            </div>
            
            <div class="flex justify-end space-x-3 pt-4">
                <button type="button" onclick="closeTestModal()" 
                        class="px-4 py-2 text-gray-700 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                    Annuler
                </button>
                <button type="submit" 
                        class="bg-aptiv-orange-600 hover:bg-aptiv-orange-700 text-white px-4 py-2 rounded-md transition-colors">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>
