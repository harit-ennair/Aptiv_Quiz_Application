<!-- Employees Management Section -->
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div>
                <div class="flex items-center gap-4 mb-2">
                    <div class="p-2 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.916-.75M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.916-.75M7 20v-2c0-.656.126-1.283.356-1.857M15 6a3 3 0 11-6 0 3 3 0 016 0zm-9 8a2 2 0 100-4 2 2 0 000 4zm14 0a2 2 0 100-4 2 2 0 000 4z"></path>
                        </svg>
                    </div>
                  
                </div>
                <p class="text-gray-600 text-sm lg:text-base">Consulter tous les employés et leur historique de tests</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <div class="relative">
                    <input type="text" id="employee-search" placeholder="Rechercher par nom ou ID..." 
                           class="w-full sm:w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-aptiv-orange-500 focus:border-transparent text-sm"
                           title="Rechercher par nom, email ou numéro d'identification">
                    <svg class="absolute left-3 top-2.5 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <button onclick="adminDashboard.refreshEmployees()" 
                        class="px-4 py-2 bg-aptiv-orange-600 hover:bg-aptiv-orange-700 text-white rounded-lg transition-colors text-sm font-medium flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Actualiser
                </button>
            </div>
        </div>
    </div>

    <!-- Employees Statistics -->


    <!-- Loading State -->
    <div id="employees-loading" class="bg-white rounded-xl shadow-sm border border-gray-200 p-8 text-center">
        <div class="spinner mx-auto mb-4"></div>
        <p class="text-gray-600">Chargement des employés...</p>
    </div>

    <!-- Empty State -->
    <div id="employees-empty" class="bg-white rounded-xl shadow-sm border border-gray-200 p-8 text-center hidden">
        <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.916-.75M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.916-.75M7 20v-2c0-.656.126-1.283.356-1.857M12 4a4 4 0 100 8 4 4 0 000-8zm-8 8a2 2 0 100-4 2 2 0 000 4zm16 0a2 2 0 100-4 2 2 0 000 4z"></path>
        </svg>
        <h3 class="text-lg font-medium text-gray-900 mb-2">Aucun employé trouvé</h3>
        <p class="text-gray-500">Il n'y a pas d'employés dans le système.</p>
    </div>

    <!-- Desktop Role-based View -->
    <div id="employees-desktop" class="desktop-table space-y-6 hidden">
        <!-- Employees will be grouped by role here -->
    </div>

    <!-- Mobile Role-based View -->
    <div id="employees-mobile" class="mobile-view space-y-6 hidden">
        <!-- Mobile role groups will be populated here -->
    </div>
</div>

<!-- Employee Details Modal -->
<div id="employee-details-modal" class="modal fixed inset-0 bg-black bg-opacity-50 z-modal items-center justify-center hidden">
    <div class="modal-body bg-white rounded-xl shadow-xl w-full max-w-4xl mx-4 max-h-[90vh] overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 id="employee-details-title" class="text-lg font-semibold text-gray-900">Détails de l'Employé</h3>
                <button onclick="adminDashboard.closeEmployeeDetailsModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
        
        <div class="p-6 overflow-y-auto max-h-[calc(90vh-120px)]">
            <!-- Employee Info -->
            <div id="employee-info" class="bg-gray-50 rounded-lg p-4 mb-6">
                <!-- Employee details will be populated here -->
            </div>
            
            <!-- Test History -->
            <div>
                <h4 class="text-lg font-semibold text-gray-900 mb-4">Historique des Tests</h4>
                <div id="employee-test-history" class="space-y-4">
                    <!-- Test history will be populated here -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Add employees filtering functionality
document.addEventListener('DOMContentLoaded', function() {
    const employeeSearch = document.getElementById('employee-search');
    const roleFilter = document.getElementById('employee-role-filter');
    
    if (employeeSearch) {
        employeeSearch.addEventListener('input', function() {
            if (window.adminDashboard) {
                window.adminDashboard.filterEmployees();
            }
        });
    }
    
    if (roleFilter) {
        roleFilter.addEventListener('change', function() {
            if (window.adminDashboard) {
                window.adminDashboard.filterEmployees();
            }
        });
    }
});
</script>
