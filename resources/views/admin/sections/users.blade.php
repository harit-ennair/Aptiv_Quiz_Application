<!-- Users Management Section -->
<div class="space-y-6">    
    <!-- Enhanced Header -->
    <div class="bg-gradient-to-r from-white via-blue-50 to-purple-50 rounded-2xl shadow-lg border border-gray-200 p-6">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
            <div class="text-center lg:text-left">
                <div class="flex items-center justify-center lg:justify-start gap-3 mb-2">
                    <div class="p-2 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl lg:text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                        Gestion des Utilisateurs
                    </h2>
                </div>
                <p class="text-gray-600 text-sm lg:text-base">Gérer les rôles et permissions des utilisateurs</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">                <div class="relative">
                    <input type="text" id="user-search" placeholder="Rechercher un Utilisateur..." 
                           class="w-full sm:w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-aptiv-orange-500 focus:border-transparent text-sm">
                    <svg class="absolute left-3 top-2.5 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>                <select id="role-filter" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-aptiv-orange-500 focus:border-transparent text-sm">
                    <option value="">Tous les rôles</option>
                    <option value="1">Super Admin</option>
                    <option value="2">Admin</option>
                    <option value="3">Employee</option>
                </select>
                <button onclick="adminDashboard.openAddUserModal()" 
                        class="px-4 py-2 bg-aptiv-orange-600 hover:bg-aptiv-orange-700 text-white rounded-lg transition-colors text-sm font-medium flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Ajouter Utilisateur
                </button>
                
            </div>
        </div>
    </div>

    <!-- Users Statistics -->
    <div id="users-stats" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 hidden">
        <!-- Stats cards will be populated here -->
    </div>

    <!-- Loading State -->
    <div id="users-loading" class="bg-white rounded-xl shadow-sm border border-gray-200 p-8 text-center">
        <div class="spinner mx-auto mb-4"></div>
        <p class="text-gray-600">Chargement des utilisateurs...</p>
    </div>

    <!-- Empty State -->
    <div id="users-empty" class="bg-white rounded-xl shadow-sm border border-gray-200 p-8 text-center hidden">
        <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
        </svg>
        <h3 class="text-lg font-medium text-gray-900 mb-2">Aucun utilisateur trouvé</h3>
        <p class="text-gray-500">Il n'y a pas d'utilisateurs dans le système.</p>
    </div>    <!-- Desktop Role-based View -->
    <div id="users-desktop" class="desktop-table space-y-6 hidden">
        <!-- Users will be grouped by role here -->
    </div>

    <!-- Mobile Role-based View -->
    <div id="users-mobile" class="mobile-view space-y-6 hidden">
        <!-- Mobile role groups will be populated here -->
    </div>
</div>

<!-- Role Change Modal -->
<div id="role-modal" class="modal fixed inset-0 bg-black bg-opacity-50 z-modal items-center justify-center hidden">
    <div class="modal-body bg-white rounded-xl shadow-xl w-full max-w-md mx-4">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 id="role-modal-title" class="text-lg font-semibold text-gray-900">Modifier le Rôle</h3>
                <button onclick="adminDashboard.closeRoleModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
        
        <form id="role-form" class="p-6 space-y-4 form-mobile">
            <input type="hidden" id="user-id" name="user_id">
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Utilisateur</label>
                <p id="user-info" class="text-sm text-gray-900 bg-gray-50 p-3 rounded-lg"></p>
            </div>
            
            <div>
                <label for="new-role" class="block text-sm font-medium text-gray-700 mb-2">Nouveau Rôle <span class="text-red-500">*</span></label>
                <select id="new-role" name="role_id" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-aptiv-orange-500 focus:border-transparent">
                    <option value="">Sélectionner un rôle</option>
                    <option value="1">Super Admin</option>
                    <option value="2">Admin</option>
                    <option value="3">Employee</option>
                </select>
            </div>
            
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <div class="flex">
                    <svg class="flex-shrink-0 w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-yellow-800">Attention</h3>
                        <p class="text-sm text-yellow-700 mt-1">
                            Changer le rôle d'un utilisateur modifiera immédiatement ses permissions d'accès.
                        </p>
                    </div>
                </div>
            </div>
              <div class="flex justify-between pt-4 border-t border-gray-200">
                <!-- Delete button (left side) -->
                <button type="button" id="delete-user-btn" onclick="adminDashboard.confirmDeleteUser()" 
                        class="px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg transition-colors btn-touch hidden">
                    <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1-1H8a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    Supprimer
                </button>
                
                <!-- Action buttons (right side) -->
                <div class="flex space-x-3">
                    <button type="button" onclick="adminDashboard.closeRoleModal()" 
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors btn-touch">
                        Annuler
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 text-sm font-medium text-white bg-aptiv-orange-600 hover:bg-aptiv-orange-700 rounded-lg transition-colors btn-touch">
                        Modifier le Rôle
                    </button>
                </div>
            </div></form>
    </div>
</div>

<!-- Add User Modal -->
<div id="add-user-modal" class="modal fixed inset-0 bg-black bg-opacity-50 z-modal items-center justify-center hidden">
    <div class="modal-body bg-white rounded-xl shadow-xl w-full max-w-md mx-4">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Ajouter un Nouvel Utilisateur</h3>
                <button onclick="adminDashboard.closeAddUserModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
        
        <form id="add-user-form" class="p-6 space-y-4 form-mobile">
            <div>
                <label for="user-name" class="block text-sm font-medium text-gray-700 mb-2">Prénom <span class="text-red-500">*</span></label>
                <input type="text" id="user-name" name="name" required 
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-aptiv-orange-500 focus:border-transparent"
                       placeholder="Entrez le prénom">
            </div>
            
            <div>
                <label for="user-last-name" class="block text-sm font-medium text-gray-700 mb-2">Nom de Famille <span class="text-red-500">*</span></label>
                <input type="text" id="user-last-name" name="last_name" required 
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-aptiv-orange-500 focus:border-transparent"
                       placeholder="Entrez le nom de famille">
            </div>
            
            <div>
                <label for="user-identification" class="block text-sm font-medium text-gray-700 mb-2">Numéro d'Identification <span class="text-red-500">*</span></label>
                <input type="text" id="user-identification" name="identification" required 
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-aptiv-orange-500 focus:border-transparent"
                       placeholder="Entrez le numéro d'identification">
            </div>
            
            <div>
                <label for="user-role" class="block text-sm font-medium text-gray-700 mb-2">Rôle <span class="text-red-500">*</span></label>
                <select id="user-role" name="role_id" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-aptiv-orange-500 focus:border-transparent">
                    <option value="">Sélectionner un rôle</option>
                    <option value="1">Super Admin</option>
                    <option value="2">Admin</option>
                    <option value="3">Employee</option>
                </select>
            </div>
            
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <div class="flex">
                    <svg class="flex-shrink-0 w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-blue-800">Information</h3>
                        <p class="text-sm text-blue-700 mt-1">
                            Le mot de passe sera automatiquement défini comme le numéro d'identification.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                <button type="button" onclick="adminDashboard.closeAddUserModal()" 
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors btn-touch">
                    Annuler
                </button>
                <button type="submit" 
                        class="px-4 py-2 text-sm font-medium text-white bg-aptiv-orange-600 hover:bg-aptiv-orange-700 rounded-lg transition-colors btn-touch">
                    Ajouter l'Utilisateur
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Delete User Confirmation Modal -->
<div id="delete-user-modal" class="modal fixed inset-0 bg-black bg-opacity-50 z-modal items-center justify-center hidden">
    <div class="modal-body bg-white rounded-xl shadow-xl w-full max-w-md mx-4">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Confirmer la Suppression</h3>
                <button onclick="adminDashboard.closeDeleteUserModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
        
        <div class="p-6">
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Êtes-vous sûr ?</h3>
                    <p class="text-sm text-gray-600 mb-4">
                        Vous êtes sur le point de supprimer l'utilisateur <span id="delete-user-name" class="font-semibold"></span>. 
                        Cette action est irréversible et supprimera définitivement toutes les données associées à cet utilisateur.
                    </p>
                    
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                        <div class="flex">
                            <svg class="flex-shrink-0 w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">Attention</h3>
                                <p class="text-sm text-red-700 mt-1">
                                    Cette action supprimera définitivement l'utilisateur et toutes ses données.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-end space-x-3 mt-6">
                <button type="button" onclick="adminDashboard.closeDeleteUserModal()" 
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors btn-touch">
                    Annuler
                </button>
                <button type="button" onclick="adminDashboard.deleteUser()" 
                        class="px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg transition-colors btn-touch">
                    Oui, Supprimer
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Add users filtering functionality
document.addEventListener('DOMContentLoaded', function() {
    const userSearch = document.getElementById('user-search');
    const roleFilter = document.getElementById('role-filter');
    
    if (userSearch) {
        userSearch.addEventListener('input', function() {
            if (window.adminDashboard) {
                window.adminDashboard.filterUsers();
            }
        });
    }
    
    if (roleFilter) {
        roleFilter.addEventListener('change', function() {
            if (window.adminDashboard) {
                window.adminDashboard.filterUsers();
            }
        });
    }
});
</script>
