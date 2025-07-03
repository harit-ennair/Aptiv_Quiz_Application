<!-- Formateurs Management Section -->
<div class="space-y-6">
    <!-- Enhanced Header -->
    <div class="bg-gradient-to-r from-white via-blue-50 to-purple-50 rounded-2xl shadow-lg border border-gray-200 p-6">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
            <div class="text-center lg:text-left">
                <div class="flex items-center justify-center lg:justify-start gap-3 mb-2">
                    <div class="p-2 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl lg:text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                        Gestion des Formateurs
                    </h2>
                </div>
                <p class="text-gray-600 text-sm lg:text-base">Gérer les formateurs et leurs informations</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <div class="relative">
                    <input type="text" id="formateur-search" placeholder="Rechercher un formateur..." 
                           class="w-full sm:w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-aptiv-orange-500 focus:border-transparent text-sm">
                    <svg class="absolute left-3 top-2.5 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <button data-action="add-formateur" class="bg-aptiv-orange-600 hover:bg-aptiv-orange-700 text-white px-4 py-2 rounded-lg text-sm transition-colors flex items-center justify-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Ajouter un formateur
                </button>
            </div>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-6 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium">Total Formateurs</p>
                    <p class="text-2xl font-bold" id="total-formateurs">-</p>
                </div>
                <div class="p-3 bg-white/20 rounded-lg">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl p-6 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm font-medium">Formateurs Actifs</p>
                    <p class="text-2xl font-bold" id="active-formateurs">-</p>
                </div>
                <div class="p-3 bg-white/20 rounded-lg">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl p-6 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-yellow-100 text-sm font-medium">Nouveau Ce Mois</p>
                    <p class="text-2xl font-bold" id="new-formateurs">-</p>
                </div>
                <div class="p-3 bg-white/20 rounded-lg">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl p-6 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-100 text-sm font-medium">Tests Supervisés</p>
                    <p class="text-2xl font-bold" id="supervised-tests">-</p>
                </div>
                <div class="p-3 bg-white/20 rounded-lg">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading State -->
    <div id="formateurs-loading" class="bg-white rounded-xl shadow-sm border border-gray-200 p-8 text-center">
        <div class="spinner mx-auto mb-4"></div>
        <p class="text-gray-600">Chargement des formateurs...</p>
    </div>

    <!-- Formateurs Table Container -->
    <div id="formateurs-container" class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hidden">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Liste des Formateurs</h3>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-500" id="formateurs-results-count">0 résultat(s)</span>
                    <div class="flex items-center gap-2">
                        <label class="text-sm text-gray-600">Afficher:</label>
                        <select id="formateurs-per-page" class="text-sm border border-gray-300 rounded px-2 py-1">
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
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100" onclick="sortFormateurTable('name')">
                            Formateur
                            <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                            </svg>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100" onclick="sortFormateurTable('identification')">
                            Identification
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100" onclick="sortFormateurTable('tests_count')">
                            Tests Supervisés
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100" onclick="sortFormateurTable('created_at')">
                            Date de Création
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody id="formateurs-table-body" class="bg-white divide-y divide-gray-200">
                    <!-- Formateurs will be populated here -->
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="bg-gray-50 px-6 py-3 border-t border-gray-200">
            <div class="flex items-center justify-between">
                <div class="text-sm text-gray-700">
                    Affichage <span id="formateurs-showing-from">1</span> à <span id="formateurs-showing-to">25</span> sur <span id="formateurs-total-results">0</span> résultats
                </div>
                <div class="flex items-center gap-2" id="formateurs-pagination-controls">
                    <!-- Pagination buttons will be generated here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Empty State -->
    <div id="formateurs-empty" class="bg-white rounded-xl shadow-sm border border-gray-200 p-12 text-center hidden">
        <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
        </div>
        <h3 class="text-lg font-medium text-gray-900 mb-2">Aucun formateur trouvé</h3>
        <p class="text-gray-500 mb-6">Il n'y a pas de formateurs correspondant à vos critères de recherche.</p>
        <button onclick="clearFormateurFilters()" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
            Effacer les filtres
        </button>
    </div>
</div>

<!-- Formateur Modal -->
<div id="formateur-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 items-center justify-center hidden">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-md mx-4">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 id="formateur-modal-title" class="text-lg font-semibold text-gray-900">Ajouter un formateur</h3>
                <button onclick="closeFormateurModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
        
        <form id="formateur-form" class="p-6 space-y-4 form-mobile">
            <input type="hidden" id="formateur-id">
            
            <div>
                <label for="formateur-name" class="block text-sm font-medium text-gray-700 mb-2">Prénom <span class="text-red-500">*</span></label>
                <input type="text" id="formateur-name" name="name" required 
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-aptiv-orange-500 focus:border-transparent">
            </div>
            
            <div>
                <label for="formateur-last-name" class="block text-sm font-medium text-gray-700 mb-2">Nom <span class="text-red-500">*</span></label>
                <input type="text" id="formateur-last-name" name="last_name" required 
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-aptiv-orange-500 focus:border-transparent">
            </div>
            
            <div>
                <label for="formateur-identification" class="block text-sm font-medium text-gray-700 mb-2">Identification <span class="text-red-500">*</span></label>
                <input type="number" id="formateur-identification" name="identification" required 
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-aptiv-orange-500 focus:border-transparent">
            </div>
            
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <div class="flex">
                    <svg class="flex-shrink-0 w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-blue-800">Information</h3>
                        <p class="text-sm text-blue-700 mt-1">
                            L'identification doit être unique pour chaque formateur.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                <button type="button" onclick="closeFormateurModal()" 
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors btn-touch">
                    Annuler
                </button>
                <button type="submit" 
                        class="px-4 py-2 text-sm font-medium text-white bg-aptiv-orange-600 hover:bg-aptiv-orange-700 rounded-lg transition-colors btn-touch">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Formateur Details Modal -->
<div id="formateur-details-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 overflow-y-auto h-full w-full z-50 backdrop-blur-sm">
    <div class="relative top-20 mx-auto p-2 border w-11/12 md:w-2/3 lg:w-1/2 xl:w-2/5 shadow-2xl rounded-lg bg-white max-w-2xl">
        <div class="flex items-center justify-between p-3 border-b border-gray-200">
            <div class="flex items-center">
                <div class="w-5 h-5 bg-gradient-to-r from-blue-500 to-purple-600 rounded flex items-center justify-center mr-2">
                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <h3 class="text-base font-semibold text-gray-900">Détails du Formateur</h3>
            </div>
            <button id="formateur-header-close-btn" class="text-gray-400 hover:text-gray-600 transition-colors duration-200 p-1 hover:bg-gray-100 rounded">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div id="formateur-details-content" class="p-3">
            <!-- Formateur details will be loaded here -->
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

/* Modal styles */
#formateur-modal {
    backdrop-filter: blur(4px);
    display: none;
}

#formateur-modal.flex {
    display: flex !important;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Fade in animation */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.fade-in {
    animation: fadeIn 0.5s ease-out;
}

/* Status badge styles */
.status-active { @apply bg-green-100 text-green-800; }
.status-inactive { @apply bg-red-100 text-red-800; }
.status-new { @apply bg-blue-100 text-blue-800; }
</style>

<script>
// Formateurs Management JavaScript
let currentFormateurPage = 1;
let formateurPerPage = 25;
let currentFormateurSort = { field: 'name', direction: 'asc' };
let allFormateurs = [];
let filteredFormateurs = [];

// Initialize the formateurs section
document.addEventListener('DOMContentLoaded', function() {
    initializeFormateursSection();
    setupFormateurEventListeners();
    loadFormateursData();
    
    // Make functions globally accessible
    window.viewFormateurDetails = viewFormateurDetails;
    window.editFormateur = editFormateur;
    window.deleteFormateur = deleteFormateur;
    window.openFormateurModal = openFormateurModal;
    window.closeFormateurModal = closeFormateurModal;
    window.sortFormateurTable = sortFormateurTable;
    window.clearFormateurFilters = clearFormateurFilters;
    
    console.log('Formateur functions attached to window object');
    
    // Add debugging functions
    window.inspectFormateursData = function() {
        console.log('=== FORMATEURS DATA INSPECTION ===');
        console.log('allFormateurs:', allFormateurs);
        console.log('filteredFormateurs:', filteredFormateurs);
        console.log('allFormateurs.length:', allFormateurs.length);
        console.log('filteredFormateurs.length:', filteredFormateurs.length);
        
        if (allFormateurs.length > 0) {
            console.log('First formateur sample:', allFormateurs[0]);
            console.log('All IDs:', allFormateurs.map(f => ({ id: f.id, type: typeof f.id })));
        }
        
        const tableBody = document.getElementById('formateurs-table-body');
        if (tableBody) {
            console.log('Table body exists, rows:', tableBody.children.length);
            console.log('Table body HTML:', tableBody.innerHTML.substring(0, 200) + '...');
        } else {
            console.log('Table body not found');
        }
        console.log('=== END INSPECTION ===');
    };
    
    // Add test function for manual delete testing
    window.manualDeleteTest = function(id) {
        console.log('Manual delete test for ID:', id);
        console.log('Current allFormateurs:', allFormateurs);
        
        if (allFormateurs.length === 0) {
            console.log('No formateurs loaded. Loading data first...');
            loadFormateursData();
            setTimeout(() => {
                console.log('Data loaded, trying delete again...');
                deleteFormateur(id);
            }, 2000);
        } else {
            deleteFormateur(id);
        }
    };
    
    // Add reload function
    window.reloadFormateursData = function() {
        console.log('Reloading formateurs data...');
        loadFormateursData();
    };
    
    console.log('Debug: You can test delete by calling window.testDeleteFormateur() in console');
    console.log('Debug: You can inspect data by calling window.inspectFormateursData() in console');
    console.log('Debug: You can manually test delete by calling window.manualDeleteTest(id) in console');
    console.log('Debug: You can reload data by calling window.reloadFormateursData() in console');

    // Add event delegation for action buttons
    document.addEventListener('click', function(e) {
        // Check if clicked element or its parent has data attributes
        const target = e.target.closest('[data-action]');
        if (!target) return;
        
        const action = target.getAttribute('data-action');
        const formateurId = target.getAttribute('data-formateur-id');
        
        // Prevent default action to avoid double triggering
        e.preventDefault();
        e.stopPropagation();
        
        console.log('Event delegation triggered:', action, formateurId);
        
        switch(action) {
            case 'delete':
                deleteFormateur(formateurId);
                break;
            case 'edit':
                editFormateur(formateurId);
                break;
            case 'view':
                viewFormateurDetails(formateurId);
                break;
            case 'add-formateur':
                openFormateurModal();
                break;
            default:
                console.log('Unknown action:', action);
        }
    });

    // Setup modal close handlers
    const modal = document.getElementById('formateur-modal');
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeFormateurModal();
            }
        });
    }
    
    const detailsModal = document.getElementById('formateur-details-modal');
    if (detailsModal) {
        detailsModal.addEventListener('click', function(e) {
            if (e.target === detailsModal) {
                detailsModal.classList.add('hidden');
            }
        });
    }

    // Handle formateur form submission (override global handler)
    const form = document.getElementById('formateur-form');
    if (form) {
        // Clone the form to remove all existing event listeners
        const newForm = form.cloneNode(true);
        form.parentNode.replaceChild(newForm, form);
        
        // Add our event listener to the new form
        newForm.addEventListener('submit', function(e) {
            e.preventDefault();
            e.stopImmediatePropagation(); // Prevent other handlers from running
            console.log('Form submission triggered (local handler)');
            
            const formData = new FormData(newForm);
            const formateurId = document.getElementById('formateur-id').value;
            const isEdit = formateurId !== '';
            
            const formateurData = {
                name: formData.get('name'),
                last_name: formData.get('last_name'),
                identification: formData.get('identification')
            };
            
            // Validate required fields
            if (!formateurData.name || !formateurData.last_name || !formateurData.identification) {
                showNotification('Veuillez remplir tous les champs obligatoires', 'error');
                return;
            }
            
            // Make API call
            const url = isEdit ? `/admin/api/formateurs/${formateurId}` : '/admin/api/formateurs';
            const method = isEdit ? 'PUT' : 'POST';
            
            console.log('Making API call:', method, url, formateurData);
            
            fetch(url, {
                method: method,
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
                },
                body: JSON.stringify(formateurData)
            })
            .then(response => response.json())
            .then(data => {
                console.log('API response:', data);
                
                if (data.success) {
                    showNotification(data.message || (isEdit ? 'Formateur modifié avec succès' : 'Formateur ajouté avec succès'), 'success');
                    
                    // Reload data from API to ensure consistency
                    loadFormateursData();
                    closeFormateurModal();
                } else {
                    showNotification(data.message || 'Erreur lors de la sauvegarde', 'error');
                }
            })
            .catch(error => {
                console.error('API error:', error);
                showNotification('Erreur lors de la sauvegarde', 'error');
            });
        });
    }

    // Setup formateur search functionality
    const formateurSearch = document.getElementById('formateur-search');
    if (formateurSearch) {
        formateurSearch.addEventListener('input', function() {
            if (window.formateursDashboard && window.formateursDashboard.filterFormateurs) {
                window.formateursDashboard.filterFormateurs();
            } else if (window.adminDashboard && window.adminDashboard.filterFormateurs) {
                window.adminDashboard.filterFormateurs();
            }
        });
    }
});

function initializeFormateursSection() {
    console.log('Initializing Formateurs Management Section...');
}

function setupFormateurEventListeners() {
    // Search functionality
    const formateurSearch = document.getElementById('formateur-search');
    if (formateurSearch) {
        formateurSearch.addEventListener('input', debounce(handleFormateurSearch, 300));
    }
    
    // Per page selector
    const formateurPerPageSelect = document.getElementById('formateurs-per-page');
    if (formateurPerPageSelect) {
        formateurPerPageSelect.addEventListener('change', function() {
            formateurPerPage = parseInt(this.value);
            currentFormateurPage = 1;
            renderFormateursTable();
        });
    }
}

function loadFormateursData() {
    console.log('Loading formateurs data...');
    showFormateurLoading();
    
    // Use the correct API endpoint
    fetch('/admin/api/formateurs')
        .then(response => {
            console.log('API Response status:', response.status);
            return response.json();
        })
        .then(data => {
            console.log('Formateurs API Response success:', data.success);
            if (data.success) {
                allFormateurs = data.data || [];
                filteredFormateurs = [...allFormateurs];
                
                // Process the data
                processFormateursData();
                
                // Update stats and render table
                updateFormateurStatsFromData();
                renderFormateursTable();
                console.log('Formateurs data loaded from API:', allFormateurs.length, 'items');
            } else {
                console.log('Formateurs API Error:', data.message);
                showFormateurError(data.message || 'Erreur lors du chargement des formateurs');
                console.log('Falling back to sample data...');
                loadSampleFormateurData();
            }
        })
        .catch(error => {
            console.error('Error loading formateurs:', error);
            console.log('Loading sample formateur data as fallback');
            loadSampleFormateurData();
        })
        .finally(() => {
            hideFormateurLoading();
        });
}

function processFormateursData() {
    console.log('Processing formateurs data...');
    
    // Add computed fields and ensure consistent structure
    allFormateurs = allFormateurs.map(formateur => {
        // Handle both API data and sample data structures
        const processedFormateur = {
            ...formateur,
            // Ensure tests_count exists
            tests_count: formateur.tests ? formateur.tests.length : (formateur.tests_count || 0),
            // Ensure full_name exists
            full_name: formateur.full_name || `${formateur.name || 'N/A'} ${formateur.last_name || ''}`.trim()
        };
        
        return processedFormateur;
    });
    
    console.log('Processed', allFormateurs.length, 'formateurs');
    filteredFormateurs = [...allFormateurs];
}

function updateFormateurStatsFromData() {
    const totalFormateurs = allFormateurs.length;
    const today = new Date();
    const thisMonth = new Date(today.getFullYear(), today.getMonth(), 1);
    
    const newFormateurs = allFormateurs.filter(formateur => {
        const createDate = new Date(formateur.created_at);
        return createDate >= thisMonth;
    }).length;
    
    const activeFormateurs = allFormateurs.filter(formateur => 
        formateur.tests_count > 0
    ).length;
    
    const totalSupervisedTests = allFormateurs.reduce((sum, formateur) => 
        sum + (formateur.tests_count || 0), 0
    );
    
    updateFormateurStats({
        total_formateurs: totalFormateurs,
        active_formateurs: activeFormateurs,
        new_formateurs: newFormateurs,
        supervised_tests: totalSupervisedTests
    });
}

function loadSampleFormateurData() {
    allFormateurs = [
        {
            id: 1,
            name: 'Marie',
            last_name: 'Dupont',
            identification: '12345',
            full_name: 'Marie Dupont',
            tests_count: 15,
            created_at: '2024-01-15T10:30:00Z'
        },
        {
            id: 2,
            name: 'Pierre',
            last_name: 'Martin',
            identification: '67890',
            full_name: 'Pierre Martin',
            tests_count: 8,
            created_at: '2024-03-22T14:15:00Z'
        },
        {
            id: 3,
            name: 'Sophie',
            last_name: 'Bernard',
            identification: '11111',
            full_name: 'Sophie Bernard',
            tests_count: 22,
            created_at: '2024-02-10T09:00:00Z'
        },
        {
            id: 4,
            name: 'Paul',
            last_name: 'Durand',
            identification: '22222',
            full_name: 'Paul Durand',
            tests_count: 5,
            created_at: '2024-06-01T11:30:00Z'
        },
        {
            id: 5,
            name: 'Claire',
            last_name: 'Moreau',
            identification: '33333',
            full_name: 'Claire Moreau',
            tests_count: 12,
            created_at: '2024-05-18T16:45:00Z'
        }
    ];
    
    console.log('Sample formateur data loaded:', allFormateurs.length, 'items');
    
    filteredFormateurs = [...allFormateurs];
    updateFormateurStatsFromData();
    renderFormateursTable();
    showNotification('Données de test chargées (mode démo)', 'info');
}

function showFormateurLoading() {
    document.getElementById('formateurs-loading').classList.remove('hidden');
    document.getElementById('formateurs-container').classList.add('hidden');
    document.getElementById('formateurs-empty').classList.add('hidden');
}

function hideFormateurLoading() {
    document.getElementById('formateurs-loading').classList.add('hidden');
}

function handleFormateurSearch() {
    const query = document.getElementById('formateur-search').value.toLowerCase().trim();
    
    if (!query) {
        filteredFormateurs = [...allFormateurs];
    } else {
        filteredFormateurs = allFormateurs.filter(formateur => {
            const searchFields = [
                formateur.name || '',
                formateur.last_name || '',
                formateur.identification || '',
                formateur.full_name || ''
            ];
            
            return searchFields.some(field => 
                field.toString().toLowerCase().includes(query)
            );
        });
    }
    
    currentFormateurPage = 1;
    renderFormateursTable();
}

function renderFormateursTable() {
    if (filteredFormateurs.length === 0) {
        showFormateurEmptyState();
        return;
    }
    
    showFormateursTable();
    
    // Sort formateurs
    const sortedFormateurs = [...filteredFormateurs].sort((a, b) => {
        let aVal, bVal;
        
        switch(currentFormateurSort.field) {
            case 'name':
                aVal = a.full_name || '';
                bVal = b.full_name || '';
                break;
            case 'identification':
                aVal = a.identification || '';
                bVal = b.identification || '';
                break;
            case 'tests_count':
                aVal = a.tests_count || 0;
                bVal = b.tests_count || 0;
                break;
            case 'created_at':
                aVal = new Date(a.created_at);
                bVal = new Date(b.created_at);
                break;
            default:
                aVal = a.id;
                bVal = b.id;
        }
        
        if (currentFormateurSort.direction === 'asc') {
            return aVal > bVal ? 1 : -1;
        } else {
            return aVal < bVal ? 1 : -1;
        }
    });
    
    // Pagination
    const startIndex = (currentFormateurPage - 1) * formateurPerPage;
    const endIndex = startIndex + formateurPerPage;
    const paginatedFormateurs = sortedFormateurs.slice(startIndex, endIndex);
    
    // Render table rows
    const tbody = document.getElementById('formateurs-table-body');
    tbody.innerHTML = '';
    
    paginatedFormateurs.forEach(formateur => {
        const row = createFormateurRow(formateur);
        tbody.appendChild(row);
    });
    
    // Update pagination info
    updateFormateurPaginationInfo(sortedFormateurs.length, startIndex, Math.min(endIndex, sortedFormateurs.length));
    renderFormateurPaginationControls(sortedFormateurs.length);
}

function createFormateurRow(formateur) {
    const row = document.createElement('tr');
    row.className = 'hover:bg-gray-50 fade-in';
    
    const testsCount = formateur.tests_count || 0;
    const statusClass = testsCount > 10 ? 'status-active' : 
                       testsCount > 0 ? 'status-new' : 'status-inactive';
    
    const statusText = testsCount > 10 ? 'Très Actif' : 
                      testsCount > 0 ? 'Actif' : 'Inactif';
    
    const initials = `${(formateur.name || 'N').charAt(0)}${(formateur.last_name || 'A').charAt(0)}`;
    
    const buttonHtml = `
        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <button data-action="view" data-formateur-id="${formateur.id}"
                    class="text-blue-600 hover:text-blue-900 mr-3" title="Voir les détails">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
            </button>
            <button data-action="edit" data-formateur-id="${formateur.id}"
                    class="text-green-600 hover:text-green-900 mr-3" title="Modifier">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
            </button>
            <button data-action="delete" data-formateur-id="${formateur.id}"
                    class="text-red-600 hover:text-red-900" title="Supprimer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
            </button>
        </td>
    `;
    
    row.innerHTML = `
        <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                    ${initials}
                </div>
                <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">${formateur.full_name}</div>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ${statusClass}">
                        ${statusText}
                    </span>
                </div>
            </div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">${formateur.identification || 'N/A'}</div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">${testsCount}</div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            ${formatDate(formateur.created_at)}
        </td>
        ${buttonHtml}
    `;
    
    return row;
}

function showFormateursTable() {
    document.getElementById('formateurs-container').classList.remove('hidden');
    document.getElementById('formateurs-empty').classList.add('hidden');
}

function showFormateurEmptyState() {
    document.getElementById('formateurs-container').classList.add('hidden');
    document.getElementById('formateurs-empty').classList.remove('hidden');
}

function updateFormateurStats(stats) {
    document.getElementById('total-formateurs').textContent = stats.total_formateurs || 0;
    document.getElementById('active-formateurs').textContent = stats.active_formateurs || 0;
    document.getElementById('new-formateurs').textContent = stats.new_formateurs || 0;
    document.getElementById('supervised-tests').textContent = stats.supervised_tests || 0;
}

function updateFormateurPaginationInfo(total, from, to) {
    document.getElementById('formateurs-results-count').textContent = `${total} résultat(s)`;
    document.getElementById('formateurs-showing-from').textContent = from + 1;
    document.getElementById('formateurs-showing-to').textContent = to;
    document.getElementById('formateurs-total-results').textContent = total;
}

function renderFormateurPaginationControls(totalItems) {
    const totalPages = Math.ceil(totalItems / formateurPerPage);
    const controls = document.getElementById('formateurs-pagination-controls');
    controls.innerHTML = '';
    
    if (totalPages <= 1) return;
    
    // Previous button
    const prevBtn = document.createElement('button');
    prevBtn.className = `px-3 py-1 rounded-md text-sm ${currentFormateurPage === 1 ? 'bg-gray-100 text-gray-400 cursor-not-allowed' : 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-300'}`;
    prevBtn.textContent = 'Précédent';
    prevBtn.disabled = currentFormateurPage === 1;
    prevBtn.onclick = () => {
        if (currentFormateurPage > 1) {
            currentFormateurPage--;
            renderFormateursTable();
        }
    };
    controls.appendChild(prevBtn);
    
    // Page numbers
    const startPage = Math.max(1, currentFormateurPage - 2);
    const endPage = Math.min(totalPages, currentFormateurPage + 2);
    
    for (let i = startPage; i <= endPage; i++) {
        const pageBtn = document.createElement('button');
        pageBtn.className = `px-3 py-1 rounded-md text-sm ${i === currentFormateurPage ? 'bg-blue-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-300'}`;
        pageBtn.textContent = i;
        pageBtn.onclick = () => {
            currentFormateurPage = i;
            renderFormateursTable();
        };
        controls.appendChild(pageBtn);
    }
    
    // Next button
    const nextBtn = document.createElement('button');
    nextBtn.className = `px-3 py-1 rounded-md text-sm ${currentFormateurPage === totalPages ? 'bg-gray-100 text-gray-400 cursor-not-allowed' : 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-300'}`;
    nextBtn.textContent = 'Suivant';
    nextBtn.disabled = currentFormateurPage === totalPages;
    nextBtn.onclick = () => {
        if (currentFormateurPage < totalPages) {
            currentFormateurPage++;
            renderFormateursTable();
        }
    };
    controls.appendChild(nextBtn);
}

function sortFormateurTable(field) {
    if (currentFormateurSort.field === field) {
        currentFormateurSort.direction = currentFormateurSort.direction === 'asc' ? 'desc' : 'asc';
    } else {
        currentFormateurSort.field = field;
        currentFormateurSort.direction = 'asc';
    }
    
    renderFormateursTable();
}

function viewFormateurDetails(formateurId) {
    console.log('View formateur details called with ID:', formateurId);
    const formateur = allFormateurs.find(f => f.id === formateurId);
    if (!formateur) {
        showNotification('Formateur non trouvé', 'error');
        return;
    }
    
    const modal = document.getElementById('formateur-details-modal');
    const content = document.getElementById('formateur-details-content');
    
    if (!modal || !content) {
        console.error('Modal elements not found');
        showNotification('Erreur: Impossible d\'ouvrir les détails', 'error');
        return;
    }
    
    const initials = `${(formateur.name || 'N').charAt(0)}${(formateur.last_name || 'A').charAt(0)}`;
    const testsCount = formateur.tests_count || 0;
    const statusClass = testsCount > 10 ? 'status-active' : 
                       testsCount > 0 ? 'status-new' : 'status-inactive';
    
    content.innerHTML = `
        <div class="space-y-3">
            <!-- Header with User Info -->
            <div class="flex items-center justify-between p-3 bg-gradient-to-r from-blue-50 to-purple-50 rounded-lg border">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-sm">
                        ${initials}
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900">${formateur.full_name}</h3>
                        <p class="text-xs text-gray-600">ID: ${formateur.identification || 'N/A'}</p>
                    </div>
                </div>
                <div class="text-center">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ${statusClass}">
                        ${testsCount} tests
                    </span>
                </div>
            </div>

            <!-- Information Grid -->
            <div class="grid grid-cols-1 gap-3">
                <div class="bg-white p-3 rounded-lg border border-gray-200">
                    <h4 class="text-sm font-semibold text-gray-900 mb-2">Informations</h4>
                    <div class="space-y-1 text-xs">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Nom:</span>
                            <span class="text-gray-900">${formateur.full_name}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">ID:</span>
                            <span class="text-gray-900">${formateur.identification || 'N/A'}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Créé le:</span>
                            <span class="text-gray-900">${formatDate(formateur.created_at)}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Tests supervisés:</span>
                            <span class="text-gray-900">${testsCount}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end gap-2 pt-2 border-t border-gray-200">
                <button id="close-formateur-modal-btn" class="px-3 py-1.5 text-sm text-gray-700 bg-gray-100 hover:bg-gray-200 rounded transition-colors duration-200">
                    Fermer
                </button>
                <button onclick="editFormateur(${formateurId});" class="px-3 py-1.5 text-sm bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors duration-200">
                    Modifier
                </button>
            </div>
        </div>
    `;
    
    modal.classList.remove('hidden');
    
    // Setup event handlers
    setTimeout(() => {
        const closeBtn = document.getElementById('close-formateur-modal-btn');
        const headerCloseBtn = document.getElementById('formateur-header-close-btn');
        
        if (closeBtn) {
            closeBtn.onclick = () => modal.classList.add('hidden');
        }
        if (headerCloseBtn) {
            headerCloseBtn.onclick = () => modal.classList.add('hidden');
        }
    }, 100);
}

function editFormateur(formateurId) {
    console.log('Edit formateur called with ID:', formateurId);
    // Open the modal in edit mode
    openFormateurModal(formateurId);
}

function deleteFormateur(formateurId) {
    console.log('Delete formateur called with ID:', formateurId);
    
    // Convert to number to ensure consistent comparison
    const id = parseInt(formateurId);
    
    // Find the formateur using loose equality (most reliable)
    const formateurExists = allFormateurs.find(f => f.id == formateurId);
    
    if (!formateurExists) {
        console.error('Formateur not found with ID:', formateurId);
        console.error('Available IDs:', allFormateurs.map(f => f.id));
        showNotification('Formateur non trouvé', 'error');
        return;
    }
    
    console.log('Formateur found:', formateurExists.full_name);
    
    if (!confirm('Êtes-vous sûr de vouloir supprimer ce formateur ?')) {
        console.log('Delete cancelled by user');
        return;
    }
    
    console.log('Proceeding with API delete...');
    
    // Make API call to delete formateur
    fetch(`/admin/api/formateurs/${id}`, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
        },
    })
    .then(response => response.json())
    .then(data => {
        console.log('Delete API response:', data);
        
        if (data.success) {
            showNotification('Formateur supprimé avec succès', 'success');
            
            // Reload data from API to ensure consistency
            loadFormateursData();
            console.log('Delete completed successfully');
        } else {
            console.error('API delete failed:', data.message);
            showNotification(data.message || 'Erreur lors de la suppression', 'error');
        }
    })
    .catch(error => {
        console.error('Delete API error:', error);
        showNotification('Erreur lors de la suppression', 'error');
    });
}

function clearFormateurFilters() {
    document.getElementById('formateur-search').value = '';
    filteredFormateurs = [...allFormateurs];
    currentFormateurPage = 1;
    renderFormateursTable();
}

function showFormateurError(message) {
    showNotification(message, 'error');
}

// Modal functions for formateur management
function openFormateurModal(formateurId = null) {
    console.log('Opening formateur modal, ID:', formateurId);
    const modal = document.getElementById('formateur-modal');
    const title = document.getElementById('formateur-modal-title');
    const form = document.getElementById('formateur-form');
    
    if (!modal || !title || !form) {
        console.error('Modal elements not found');
        showNotification('Erreur: Impossible d\'ouvrir le modal', 'error');
        return;
    }
    
    if (formateurId) {
        // Edit mode
        const formateur = allFormateurs.find(f => f.id === formateurId);
        if (formateur) {
            title.textContent = 'Modifier le formateur';
            document.getElementById('formateur-id').value = formateur.id;
            document.getElementById('formateur-name').value = formateur.name || '';
            document.getElementById('formateur-last-name').value = formateur.last_name || '';
            document.getElementById('formateur-identification').value = formateur.identification || '';
        }
    } else {
        // Add mode
        title.textContent = 'Ajouter un formateur';
        form.reset();
        document.getElementById('formateur-id').value = '';
    }
    
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeFormateurModal() {
    console.log('Closing formateur modal');
    const modal = document.getElementById('formateur-modal');
    if (modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
}

// Utility functions
function formatDate(dateString) {
    if (!dateString) return 'N/A';
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
    // Remove any existing notifications first to prevent duplicates
    const existingNotifications = document.querySelectorAll('.notification-toast');
    existingNotifications.forEach(notification => {
        if (notification.parentNode) {
            notification.parentNode.removeChild(notification);
        }
    });
    
    // Create and show notification
    const notification = document.createElement('div');
    notification.className = `notification-toast fixed top-4 right-4 px-6 py-3 rounded-lg shadow-lg z-50 transition-all duration-300 transform ${
        type === 'success' ? 'bg-green-500 text-white' : 
        type === 'error' ? 'bg-red-500 text-white' : 
        'bg-blue-500 text-white'
    }`;
    notification.innerHTML = `
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                ${type === 'success' ? 
                    '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>' :
                type === 'error' ? 
                    '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>' :
                    '<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>'
                }
            </svg>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    // Add entrance animation
    setTimeout(() => {
        notification.style.opacity = '1';
        notification.style.transform = 'translateX(0)';
    }, 100);
    
    // Remove after 5 seconds
    setTimeout(() => {
        notification.style.opacity = '0';
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => {
            if (notification.parentNode) {
                notification.parentNode.removeChild(notification);
            }
        }, 300);
    }, 5000);
}

// Add the existing formateur search functionality is now handled in the main DOMContentLoaded listener above
</script>


