<!-- Dashboard Statistics Section -->
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div>
                <h2 class="text-xl lg:text-2xl font-bold text-gray-900">Tableau de Bord</h2>
                <p class="text-gray-600 text-sm lg:text-base mt-1">Vue d'ensemble des métriques système en temps réel</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <div class="relative">
                    <select id="time-filter" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-aptiv-orange-500 focus:border-transparent text-sm">
                        <option value="today">Aujourd'hui</option>
                        <option value="week">Cette semaine</option>
                        <option value="month">Ce mois</option>
                        <option value="year">Cette année</option>
                    </select>
                </div>
                <button onclick="refreshDashboard()" class="px-4 py-2 text-sm font-medium text-white bg-aptiv-orange-600 hover:bg-aptiv-orange-700 rounded-lg transition-colors btn-touch">
                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Actualiser
                </button>
            </div>
        </div>
    </div>    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4 lg:gap-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-all duration-200 cursor-pointer group" onclick="navigateToUsers()">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 rounded-full bg-blue-50 border border-blue-100 group-hover:bg-blue-100 transition-colors">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                    </svg>
                </div>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-600">Utilisateurs</p>
                <p class="text-2xl font-bold text-gray-900 mb-1">{{ App\Models\User::count() }}</p>
                <p class="text-xs text-gray-500">Total des comptes</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-all duration-200 cursor-pointer group" onclick="navigateToProcesses()">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 rounded-full bg-green-50 border border-green-100 group-hover:bg-green-100 transition-colors">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                </div>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-600">Processus</p>
                <p class="text-2xl font-bold text-gray-900 mb-1">{{ App\Models\process::count() }}</p>
                <p class="text-xs text-gray-500">Total des processus</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-all duration-200 cursor-pointer group" onclick="navigateToCategories()">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 rounded-full bg-yellow-50 border border-yellow-100 group-hover:bg-yellow-100 transition-colors">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                </div>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-600">Catégories</p>
                <p class="text-2xl font-bold text-gray-900 mb-1">{{ App\Models\categories::count() }}</p>
                <p class="text-xs text-gray-500">Total des catégories</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-all duration-200 cursor-pointer group" onclick="navigateToTests()">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 rounded-full bg-purple-50 border border-purple-100 group-hover:bg-purple-100 transition-colors">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-600">Tests</p>
                <p class="text-2xl font-bold text-gray-900 mb-1">{{ App\Models\test::count() }}</p>
                <p class="text-xs text-gray-500">Total des tests</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-all duration-200 cursor-pointer group" onclick="navigateToFormateurs()">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 rounded-full bg-indigo-50 border border-indigo-100 group-hover:bg-indigo-100 transition-colors">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-600">Formateurs</p>
                <p class="text-2xl font-bold text-gray-900 mb-1">{{ App\Models\formateur::count() }}</p>
                <p class="text-xs text-gray-500">Total des formateurs</p>
            </div>
        </div>
    </div>    <!-- Recent Activity -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Activité Récente</h3>
                    <p class="text-gray-600 text-sm mt-1">Dernières actions dans le système</p>
                </div>
            </div>
        </div>
        <div class="p-6">
            <div class="text-center py-8">
                <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Aucune activité récente</h3>
                <p class="text-gray-500">Les activités récentes s'afficheront ici lorsqu'elles seront disponibles.</p>
            </div>
        </div>
    </div>
</div>

<script>
// Dashboard functionality
document.addEventListener('DOMContentLoaded', function() {
    // Time filter functionality
    const timeFilter = document.getElementById('time-filter');
    if (timeFilter) {
        timeFilter.addEventListener('change', function() {
            // Filter dashboard data based on time period
            console.log('Time filter changed to:', this.value);
        });
    }
});

// Refresh dashboard data
window.refreshDashboard = function() {
    location.reload();
};

// Navigation functions - to be implemented with actual navigation logic
window.navigateToUsers = function() {
    // Navigate to users management section
    console.log('Navigate to users');
};

window.navigateToProcesses = function() {
    // Navigate to processes management section
    console.log('Navigate to processes');
};

window.navigateToCategories = function() {
    // Navigate to categories management section
    console.log('Navigate to categories');
};

window.navigateToTests = function() {
    // Navigate to tests management section
    console.log('Navigate to tests');
};

window.navigateToFormateurs = function() {
    // Navigate to formateurs management section
    console.log('Navigate to formateurs');
};
</script>