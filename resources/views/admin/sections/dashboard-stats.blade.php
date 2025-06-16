<!-- Stats Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-6 lg:mb-8">
    <div class="bg-white rounded-lg shadow p-4 lg:p-6">
        <div class="flex items-center">
            <div class="p-2 lg:p-3 rounded-full bg-blue-100 text-blue-600">
                <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                </svg>            </div>
            <div class="ml-3 lg:ml-4">
                <p class="text-xs lg:text-sm font-medium text-gray-600">Utilisateurs</p>
                <p class="text-xl lg:text-2xl font-semibold text-gray-900">{{ App\Models\User::count() }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-4 lg:p-6">
        <div class="flex items-center">
            <div class="p-2 lg:p-3 rounded-full bg-green-100 text-green-600">
                <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>            </div>
            <div class="ml-3 lg:ml-4">
                <p class="text-xs lg:text-sm font-medium text-gray-600">Processus</p>
                <p class="text-xl lg:text-2xl font-semibold text-gray-900">{{ App\Models\process::count() }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-4 lg:p-6">
        <div class="flex items-center">
            <div class="p-2 lg:p-3 rounded-full bg-yellow-100 text-yellow-600">
                <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                </svg>
            </div>
            <div class="ml-3 lg:ml-4">
                <p class="text-xs lg:text-sm font-medium text-gray-600">Catégories</p>
                <p class="text-xl lg:text-2xl font-semibold text-gray-900">{{ App\Models\categories::count() }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-4 lg:p-6">
        <div class="flex items-center">
            <div class="p-2 lg:p-3 rounded-full bg-purple-100 text-purple-600">
                <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                </svg>
            </div>
            <div class="ml-3 lg:ml-4">
                <p class="text-xs lg:text-sm font-medium text-gray-600">Tests</p>
                <p class="text-xl lg:text-2xl font-semibold text-gray-900">{{ App\Models\test::count() }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-4 lg:p-6">
        <div class="flex items-center">
            <div class="p-2 lg:p-3 rounded-full bg-indigo-100 text-indigo-600">
                <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
            <div class="ml-3 lg:ml-4">
                <p class="text-xs lg:text-sm font-medium text-gray-600">Formateurs</p>
                <p class="text-xl lg:text-2xl font-semibold text-gray-900">{{ App\Models\formateur::count() }}</p>
            </div>
        </div>
    </div>
</div>


<!-- Recent Activity -->
<div class="bg-white rounded-lg shadow">
    <div class="px-4 lg:px-6 py-4 border-b border-gray-200">
        <h2 class="text-lg font-medium text-gray-900">Activité Récente</h2>
    </div>
    <div class="p-4 lg:p-6">
        <div class="text-center py-6 lg:py-8 text-gray-500">
            <svg class="w-10 h-10 lg:w-12 lg:h-12 mx-auto mb-3 lg:mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
            </svg>
            <p class="text-xs lg:text-sm">Aucune activité récente à afficher</p>
        </div>
    </div>
</div>
