<!-- Dashboard Statistics Section -->
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div>
                <!-- <h2 class="text-xl lg:text-2xl font-bold text-gray-900">Tableau de Bord</h2> -->
                <p class="text-gray-600 text-sm lg:text-base mt-1">Vue d'ensemble des métriques système en temps réel</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <div class="relative">
                    <select id="time-filter" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-aptiv-orange-500 focus:border-transparent text-sm">
                        <option value="today">Aujourd'hui</option>
                        <option value="week">Cette semaine</option>
                        <option value="month">Ce mois</option>
                        <option value="year" selected>Cette année</option>
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
    </div>

    <!-- Interactive Charts Section -->
    <div class="space-y-6">
        <!-- Charts Header -->
        <div class="flex items-center justify-between">
            <h3 class="text-xl font-bold text-gray-900">Analyses Visuelles</h3>
            <div class="flex gap-2">
                <button onclick="exportCharts()" class="px-3 py-1.5 text-sm text-gray-600 hover:text-aptiv-orange-600 transition-colors">
                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Exporter
                </button>
            </div>
        </div>

        <!-- Charts Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Users Distribution Chart -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h4 class="text-lg font-semibold text-gray-900">Distribution des Utilisateurs</h4>
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 bg-blue-500 rounded-full"></span>
                        <span class="text-sm text-gray-600">Par rôle</span>
                    </div>
                </div>
                <div class="relative h-64">
                    <canvas id="usersChart"></canvas>
                </div>
                <div class="mt-4 flex justify-center">
                    <div class="grid grid-cols-2 gap-4 text-sm" id="userRoleLegend">
                        @php
                            $roles = App\Models\roles::with('users')->get();
                            $formateursCount = App\Models\formateur::count();
                            $colors = ['from-blue-500 to-blue-600', 'from-green-500 to-green-600', 'from-purple-500 to-purple-600', 'from-orange-500 to-orange-600', 'from-pink-500 to-pink-600'];
                            $colorIndex = 0;
                        @endphp
                        
                        @foreach($roles as $role)
                            @if($role->users->count() > 0)
                                <div class="flex items-center gap-2">
                                    <span class="w-3 h-3 bg-gradient-to-r {{ $colors[$colorIndex % count($colors)] }} rounded-full"></span>
                                    <span class="text-gray-600">{{ $role->name }} ({{ $role->users->count() }})</span>
                                </div>
                                @php $colorIndex++; @endphp
                            @endif
                        @endforeach
                        
                        @if($formateursCount > 0)
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 bg-gradient-to-r {{ $colors[$colorIndex % count($colors)] }} rounded-full"></span>
                                <span class="text-gray-600">Formateurs ({{ $formateursCount }})</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Test Results Trend -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h4 class="text-lg font-semibold text-gray-900">Tendance des Résultats</h4>
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                        <span class="text-sm text-gray-600">30 derniers jours</span>
                    </div>
                </div>
                <div class="relative h-64">
                    <canvas id="resultsChart"></canvas>
                </div>
                <div class="mt-4 grid grid-cols-3 gap-4 text-center">
                    <div>
                        <p class="text-2xl font-bold text-green-600">{{ number_format(App\Models\test::where('pourcentage', '>=', 75)->count() / max(App\Models\test::count(), 1) * 100, 1) }}%</p>
                        <p class="text-xs text-gray-600">Excellent</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-yellow-600">{{ number_format(App\Models\test::whereBetween('pourcentage', [50, 74])->count() / max(App\Models\test::count(), 1) * 100, 1) }}%</p>
                        <p class="text-xs text-gray-600">Bon</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-red-600">{{ number_format(App\Models\test::where('pourcentage', '<', 50)->count() / max(App\Models\test::count(), 1) * 100, 1) }}%</p>
                        <p class="text-xs text-gray-600">À améliorer</p>
                    </div>
                </div>
            </div>

            <!-- Top 5 Formateur Performance -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h4 class="text-lg font-semibold text-gray-900">Top 5 Formateurs Performance</h4>
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 bg-purple-500 rounded-full"></span>
                        <span class="text-sm text-gray-600">Score moyen</span>
                    </div>
                </div>
                <div class="relative h-64">
                    <canvas id="formateurChart"></canvas>
                </div>
                <div class="mt-4 text-center">
                    <p class="text-sm text-gray-600">
                        <span class="font-semibold">{{ App\Models\formateur::count() }}</span> formateurs actifs
                    </p>
                </div>
            </div>

            <!-- Monthly Activity -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h4 class="text-lg font-semibold text-gray-900">Activité Mensuelle</h4>
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 bg-aptiv-orange-500 rounded-full"></span>
                        <span class="text-sm text-gray-600">Inscriptions</span>
                    </div>
                </div>
                <div class="relative h-64">
                    <canvas id="activityChart"></canvas>
                </div>
                <div class="mt-4 flex justify-between text-sm text-gray-600">
                    <span>Jan</span>
                    <span>Fév</span>
                    <span>Mar</span>
                    <span>Avr</span>
                    <span>Mai</span>
                    <span>Jun</span>
                </div>
            </div>
        </div>

        <!-- Performance Insights -->
        <div class="bg-gradient-to-br from-aptiv-orange-50 to-orange-100 rounded-xl border border-orange-200 p-6">
            <div class="flex items-start gap-4">
                <div class="p-3 bg-aptiv-orange-500 rounded-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <h4 class="text-lg font-semibold text-gray-900 mb-2">Aperçu des Performances</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-white rounded-lg p-4 border border-orange-200">
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-600">Taux de Réussite</span>
                                <span class="text-2xl font-bold text-green-600">
                                    {{ number_format(App\Models\test::where('pourcentage', '>=', 60)->count() / max(App\Models\test::count(), 1) * 100, 1) }}%
                                </span>
                            </div>
                            <div class="mt-2 bg-gray-200 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: {{ App\Models\test::where('pourcentage', '>=', 60)->count() / max(App\Models\test::count(), 1) * 100 }}%"></div>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg p-4 border border-orange-200">
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-600">Score Moyen</span>
                                <span class="text-2xl font-bold text-blue-600">
                                    {{ number_format(App\Models\test::avg('pourcentage') ?? 0, 1) }}%
                                </span>
                            </div>
                            <div class="mt-2 bg-gray-200 rounded-full h-2">
                                <div class="bg-blue-500 h-2 rounded-full" style="width: {{ App\Models\test::avg('pourcentage') ?? 0 }}%"></div>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg p-4 border border-orange-200">
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-600">Tests Complétés</span>
                                <span class="text-2xl font-bold text-purple-600">{{ App\Models\test::count() }}</span>
                            </div>
                            <p class="text-sm text-gray-600 mt-1">Total des évaluations</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Statistics Row -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Questions Statistics -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-indigo-100 rounded-lg">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-bold text-gray-900">{{ App\Models\quz::count() }}</p>
                        <p class="text-sm text-gray-600">Questions</p>
                    </div>
                </div>
                <div class="mt-2 text-xs text-gray-500">
                    +{{ App\Models\quz::whereDate('created_at', today())->count() }} aujourd'hui
                </div>
            </div>

            <!-- Active Processes -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-emerald-100 rounded-lg">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-bold text-gray-900">{{ App\Models\process::count() }}</p>
                        <p class="text-sm text-gray-600">Processus</p>
                    </div>
                </div>
                <div class="mt-2 text-xs text-gray-500">
                    {{ App\Models\categories::count() }} catégories liées
                </div>
            </div>

            <!-- Today's Tests -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-orange-100 rounded-lg">
                        <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-bold text-gray-900">{{ App\Models\test::whereDate('created_at', today())->count() }}</p>
                        <p class="text-sm text-gray-600">Tests Aujourd'hui</p>
                    </div>
                </div>
                <div class="mt-2 text-xs text-gray-500">
                    Moyenne: {{ number_format(App\Models\test::whereDate('created_at', today())->avg('pourcentage') ?? 0, 1) }}%
                </div>
            </div>

            <!-- Top Performer -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-yellow-100 rounded-lg">
                        <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                    </div>
                    <div>
                        @php
                            $topTest = App\Models\test::with('user')->orderBy('pourcentage', 'desc')->first();
                        @endphp
                        @if($topTest)
                            <p class="text-lg font-bold text-gray-900">{{ $topTest->pourcentage }}%</p>
                            <p class="text-sm text-gray-600">Meilleur Score</p>
                        @else
                            <p class="text-lg font-bold text-gray-900">-</p>
                            <p class="text-sm text-gray-600">Meilleur Score</p>
                        @endif
                    </div>
                </div>
                <div class="mt-2 text-xs text-gray-500">
                    @if($topTest && $topTest->user)
                        {{ $topTest->user->name }} {{ $topTest->user->last_name }}
                    @else
                        Aucun test disponible
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
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
            @php
                $recentTests = App\Models\test::with(['user', 'formateur'])
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();
                
                $recentUsers = App\Models\User::with('role')
                    ->orderBy('created_at', 'desc')
                    ->take(3)
                    ->get();
            @endphp
            
            @if($recentTests->count() > 0 || $recentUsers->count() > 0)
                <div class="space-y-4">
                    @if($recentTests->count() > 0)
                        <div>
                            <h4 class="text-sm font-semibold text-gray-900 mb-3">Tests Récents</h4>
                            <div class="space-y-3">
                                @foreach($recentTests as $test)
                                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 bg-{{ $test->pourcentage >= 80 ? 'green' : ($test->pourcentage >= 60 ? 'yellow' : 'red') }}-100 rounded-full flex items-center justify-center">
                                                <svg class="w-4 h-4 text-{{ $test->pourcentage >= 80 ? 'green' : ($test->pourcentage >= 60 ? 'yellow' : 'red') }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">{{ $test->user->name ?? 'Utilisateur' }} {{ $test->user->last_name ?? '' }}</p>
                                                <p class="text-xs text-gray-500">{{ $test->description ?? 'Test' }} • {{ $test->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-sm font-bold text-{{ $test->pourcentage >= 80 ? 'green' : ($test->pourcentage >= 60 ? 'yellow' : 'red') }}-600">{{ $test->pourcentage }}%</p>
                                            <p class="text-xs text-gray-500">{{ $test->resultat }}/{{ $test->resultat + ($test->pourcentage > 0 ? intval((100 - $test->pourcentage) * $test->resultat / $test->pourcentage) : 0) }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    
                    @if($recentUsers->count() > 0)
                        <div>
                            <h4 class="text-sm font-semibold text-gray-900 mb-3">Nouveaux Utilisateurs</h4>
                            <div class="space-y-3">
                                @foreach($recentUsers as $user)
                                    <div class="flex items-center gap-3 p-3 bg-blue-50 rounded-lg">
                                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm font-medium text-gray-900">{{ $user->name }} {{ $user->last_name }}</p>
                                            <p class="text-xs text-gray-500">{{ $user->role->name ?? 'Utilisateur' }} • {{ $user->created_at->diffForHumans() }}</p>
                                        </div>
                                        <span class="text-xs text-blue-600 bg-blue-100 px-2 py-1 rounded-full">Nouveau</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            @else
                <div class="text-center py-8">
                    <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Aucune activité récente</h3>
                    <p class="text-gray-500">Les activités récentes s'afficheront ici lorsqu'elles seront disponibles.</p>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Chart.js Library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Chart.js Configuration and Data
document.addEventListener('DOMContentLoaded', function() {
    // Common chart options
    const chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    usePointStyle: true,
                    padding: 20,
                    font: {
                        size: 12
                    }
                }
            }
        }
    };

    // Users Distribution Chart (Doughnut) - Real Data
    const usersCtx = document.getElementById('usersChart').getContext('2d');
    
    // Get real user role data
    const userRoleData = {
        @php
            $roles = App\Models\roles::with('users')->get();
            $roleNames = [];
            $roleCounts = [];
            $formateursCount = App\Models\formateur::count();
            
            foreach($roles as $role) {
                $roleNames[] = $role->name;
                $roleCounts[] = $role->users->count();
            }
            
            // Add formateurs as a separate category
            if($formateursCount > 0) {
                $roleNames[] = 'Formateurs';
                $roleCounts[] = $formateursCount;
            }
        @endphp
        labels: {!! json_encode($roleNames) !!},
        counts: {!! json_encode($roleCounts) !!}
    };
    
    window.usersChart = new Chart(usersCtx, {
        type: 'doughnut',
        data: {
            labels: userRoleData.labels.length > 0 ? userRoleData.labels : ['Aucun utilisateur'],
            datasets: [{
                data: userRoleData.counts.length > 0 ? userRoleData.counts : [0],
                backgroundColor: [
                    'rgba(59, 130, 246, 0.8)',
                    'rgba(16, 185, 129, 0.8)',
                    'rgba(139, 92, 246, 0.8)',
                    'rgba(249, 115, 22, 0.8)'
                ],
                borderColor: [
                    'rgba(59, 130, 246, 1)',
                    'rgba(16, 185, 129, 1)',
                    'rgba(139, 92, 246, 1)',
                    'rgba(249, 115, 22, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            ...chartOptions,
            cutout: '60%',
            plugins: {
                ...chartOptions.plugins,
                legend: {
                    display: false
                }
            }
        }
    });

    // Test Results Trend (Line Chart) - Real Data
    const resultsCtx = document.getElementById('resultsChart').getContext('2d');
    window.resultsChart = new Chart(resultsCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun'],
            datasets: [{
                label: 'Score Moyen',
                data: [
                    {{ App\Models\test::whereMonth('created_at', 1)->whereYear('created_at', date('Y'))->avg('pourcentage') ?? 0 }},
                    {{ App\Models\test::whereMonth('created_at', 2)->whereYear('created_at', date('Y'))->avg('pourcentage') ?? 0 }},
                    {{ App\Models\test::whereMonth('created_at', 3)->whereYear('created_at', date('Y'))->avg('pourcentage') ?? 0 }},
                    {{ App\Models\test::whereMonth('created_at', 4)->whereYear('created_at', date('Y'))->avg('pourcentage') ?? 0 }},
                    {{ App\Models\test::whereMonth('created_at', 5)->whereYear('created_at', date('Y'))->avg('pourcentage') ?? 0 }},
                    {{ App\Models\test::whereMonth('created_at', 6)->whereYear('created_at', date('Y'))->avg('pourcentage') ?? 0 }}
                ],
                borderColor: 'rgba(16, 185, 129, 1)',
                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: 'rgba(16, 185, 129, 1)',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 6
            }]
        },
        options: {
            ...chartOptions,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)'
                    },
                    ticks: {
                        callback: function(value) {
                            return value + '%';
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            },
            plugins: {
                ...chartOptions.plugins,
                legend: {
                    display: false
                }
            }
        }
    });

    // Top 5 Formateur Performance Chart (Bar Chart) - Real Data
    const formateurCtx = document.getElementById('formateurChart').getContext('2d');
    
    // Get real formateur performance data
    const formateurData = {
        @php
            $topFormateurs = App\Models\formateur::with(['tests' => function($query) {
                $query->select('formateur_id', 'pourcentage');
            }])
            ->get()
            ->map(function($formateur) {
                $avgScore = $formateur->tests->avg('pourcentage') ?? 0;
                $testCount = $formateur->tests->count();
                return [
                    'name' => $formateur->name . ' ' . $formateur->last_name,
                    'avgScore' => round($avgScore, 1),
                    'testCount' => $testCount
                ];
            })
            ->sortByDesc('avgScore')
            ->take(5)
            ->values();
            
            $formateurNames = $topFormateurs->pluck('name')->toArray();
            $formateurScores = $topFormateurs->pluck('avgScore')->toArray();
            $formateurTestCounts = $topFormateurs->pluck('testCount')->toArray();
        @endphp
        labels: {!! json_encode($formateurNames) !!},
        scores: {!! json_encode($formateurScores) !!},
        testCounts: {!! json_encode($formateurTestCounts) !!}
    };
    
    window.formateurChart = new Chart(formateurCtx, {
        type: 'bar',
        data: {
            labels: formateurData.labels.length > 0 ? formateurData.labels : ['Aucun formateur'],
            datasets: [{
                label: 'Score Moyen (%)',
                data: formateurData.scores.length > 0 ? formateurData.scores : [0],
                backgroundColor: [
                    'rgba(139, 92, 246, 0.8)',
                    'rgba(59, 130, 246, 0.8)',
                    'rgba(16, 185, 129, 0.8)',
                    'rgba(249, 115, 22, 0.8)',
                    'rgba(236, 72, 153, 0.8)'
                ],
                borderColor: [
                    'rgba(139, 92, 246, 1)',
                    'rgba(59, 130, 246, 1)',
                    'rgba(16, 185, 129, 1)',
                    'rgba(249, 115, 22, 1)',
                    'rgba(236, 72, 153, 1)'
                ],
                borderWidth: 2,
                borderRadius: 8,
                borderSkipped: false
            }]
        },
        options: {
            ...chartOptions,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)'
                    },
                    ticks: {
                        callback: function(value) {
                            return value + '%';
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        maxRotation: 45,
                        minRotation: 0
                    }
                }
            },
            plugins: {
                ...chartOptions.plugins,
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        afterLabel: function(context) {
                            const index = context.dataIndex;
                            const testCount = formateurData.testCounts[index] || 0;
                            return `Tests supervisés: ${testCount}`;
                        }
                    }
                }
            }
        }
    });

    // Monthly Activity Chart (Area) - Real Data
    const activityCtx = document.getElementById('activityChart').getContext('2d');
    window.activityChart = new Chart(activityCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun'],
            datasets: [{
                label: 'Inscriptions',
                data: [
                    {{ App\Models\User::whereMonth('created_at', 1)->whereYear('created_at', date('Y'))->count() }},
                    {{ App\Models\User::whereMonth('created_at', 2)->whereYear('created_at', date('Y'))->count() }},
                    {{ App\Models\User::whereMonth('created_at', 3)->whereYear('created_at', date('Y'))->count() }},
                    {{ App\Models\User::whereMonth('created_at', 4)->whereYear('created_at', date('Y'))->count() }},
                    {{ App\Models\User::whereMonth('created_at', 5)->whereYear('created_at', date('Y'))->count() }},
                    {{ App\Models\User::whereMonth('created_at', 6)->whereYear('created_at', date('Y'))->count() }}
                ],
                borderColor: 'rgba(249, 115, 22, 1)',
                backgroundColor: 'rgba(249, 115, 22, 0.2)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: 'rgba(249, 115, 22, 1)',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 6
            }]
        },
        options: {
            ...chartOptions,
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            },
            plugins: {
                ...chartOptions.plugins,
                legend: {
                    display: false
                }
            }
        }
    });

    // Time filter functionality
    const timeFilter = document.getElementById('time-filter');
    if (timeFilter) {
        timeFilter.addEventListener('change', function() {
            const selectedPeriod = this.value;
            console.log('Time filter changed to:', selectedPeriod);
            
            // Show loading state
            showLoadingState();
            
            // Apply filter and refresh charts
            setTimeout(() => {
                applyTimeFilter(selectedPeriod);
                hideLoadingState();
            }, 500);
        });
    }
});

// Time Filter Functions
function showLoadingState() {
    const charts = ['usersChart', 'resultsChart', 'formateurChart', 'activityChart'];
    charts.forEach(chartId => {
        const canvas = document.getElementById(chartId);
        if (canvas) {
            const parent = canvas.parentElement;
            parent.style.opacity = '0.5';
            
            // Add loading spinner if not exists
            if (!parent.querySelector('.loading-spinner')) {
                const spinner = document.createElement('div');
                spinner.className = 'loading-spinner absolute inset-0 flex items-center justify-center';
                spinner.innerHTML = `
                    <div class="flex items-center gap-2 bg-white px-4 py-2 rounded-lg shadow-md">
                        <div class="animate-spin rounded-full h-4 w-4 border-b-2 border-aptiv-orange-500"></div>
                        <span class="text-sm text-gray-600">Mise à jour...</span>
                    </div>
                `;
                parent.appendChild(spinner);
            }
        }
    });
}

function hideLoadingState() {
    const charts = ['usersChart', 'resultsChart', 'formateurChart', 'activityChart'];
    charts.forEach(chartId => {
        const canvas = document.getElementById(chartId);
        if (canvas) {
            const parent = canvas.parentElement;
            parent.style.opacity = '1';
            
            // Remove loading spinner
            const spinner = parent.querySelector('.loading-spinner');
            if (spinner) {
                spinner.remove();
            }
        }
    });
}

function applyTimeFilter(period) {
    // Update Test Results Trend Chart
    updateResultsChart(period);
    
    // Update Monthly Activity Chart
    updateActivityChart(period);
    
    // Update stats cards
    updateStatsCards(period);
    
    // Show success message
    showFilterMessage(period);
}

function updateResultsChart(period) {
    if (window.resultsChart) {
        let newData = [];
        let newLabels = [];
        
        switch(period) {
            case 'today':
                newLabels = ['00h-06h', '06h-12h', '12h-18h', '18h-24h'];
                newData = [
                    {{ App\Models\test::whereDate('created_at', today())->whereBetween(DB::raw('HOUR(created_at)'), [0, 5])->avg('pourcentage') ?? 0 }},
                    {{ App\Models\test::whereDate('created_at', today())->whereBetween(DB::raw('HOUR(created_at)'), [6, 11])->avg('pourcentage') ?? 0 }},
                    {{ App\Models\test::whereDate('created_at', today())->whereBetween(DB::raw('HOUR(created_at)'), [12, 17])->avg('pourcentage') ?? 0 }},
                    {{ App\Models\test::whereDate('created_at', today())->whereBetween(DB::raw('HOUR(created_at)'), [18, 23])->avg('pourcentage') ?? 0 }}
                ];
                break;
            case 'week':
                const today = new Date();
                const daysOfWeek = [];
                const weekData = [];
                for(let i = 6; i >= 0; i--) {
                    const date = new Date(today);
                    date.setDate(date.getDate() - i);
                    daysOfWeek.push(date.toLocaleDateString('fr-FR', { weekday: 'short' }));
                }
                newLabels = daysOfWeek;
                newData = [
                    @for($i = 6; $i >= 0; $i--)
                        {{ App\Models\test::whereDate('created_at', today()->subDays($i))->avg('pourcentage') ?? 0 }}{{ $i > 0 ? ',' : '' }}
                    @endfor
                ];
                break;
            case 'month':
                newLabels = ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4'];
                newData = [
                    {{ App\Models\test::whereBetween('created_at', [now()->startOfMonth(), now()->startOfMonth()->addDays(6)])->avg('pourcentage') ?? 0 }},
                    {{ App\Models\test::whereBetween('created_at', [now()->startOfMonth()->addDays(7), now()->startOfMonth()->addDays(13)])->avg('pourcentage') ?? 0 }},
                    {{ App\Models\test::whereBetween('created_at', [now()->startOfMonth()->addDays(14), now()->startOfMonth()->addDays(20)])->avg('pourcentage') ?? 0 }},
                    {{ App\Models\test::whereBetween('created_at', [now()->startOfMonth()->addDays(21), now()->endOfMonth()])->avg('pourcentage') ?? 0 }}
                ];
                break;
            case 'year':
            default:
                newLabels = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun'];
                newData = [
                    {{ App\Models\test::whereMonth('created_at', 1)->whereYear('created_at', date('Y'))->avg('pourcentage') ?? 0 }},
                    {{ App\Models\test::whereMonth('created_at', 2)->whereYear('created_at', date('Y'))->avg('pourcentage') ?? 0 }},
                    {{ App\Models\test::whereMonth('created_at', 3)->whereYear('created_at', date('Y'))->avg('pourcentage') ?? 0 }},
                    {{ App\Models\test::whereMonth('created_at', 4)->whereYear('created_at', date('Y'))->avg('pourcentage') ?? 0 }},
                    {{ App\Models\test::whereMonth('created_at', 5)->whereYear('created_at', date('Y'))->avg('pourcentage') ?? 0 }},
                    {{ App\Models\test::whereMonth('created_at', 6)->whereYear('created_at', date('Y'))->avg('pourcentage') ?? 0 }}
                ];
                break;
        }
        
        window.resultsChart.data.labels = newLabels;
        window.resultsChart.data.datasets[0].data = newData;
        window.resultsChart.update('active');
    }
}

function updateActivityChart(period) {
    if (window.activityChart) {
        let newData = [];
        let newLabels = [];
        
        switch(period) {
            case 'today':
                newLabels = ['00h-06h', '06h-12h', '12h-18h', '18h-24h'];
                newData = [
                    {{ App\Models\User::whereDate('created_at', today())->whereBetween(DB::raw('HOUR(created_at)'), [0, 5])->count() }},
                    {{ App\Models\User::whereDate('created_at', today())->whereBetween(DB::raw('HOUR(created_at)'), [6, 11])->count() }},
                    {{ App\Models\User::whereDate('created_at', today())->whereBetween(DB::raw('HOUR(created_at)'), [12, 17])->count() }},
                    {{ App\Models\User::whereDate('created_at', today())->whereBetween(DB::raw('HOUR(created_at)'), [18, 23])->count() }}
                ];
                break;
            case 'week':
                newLabels = ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'];
                newData = [
                    @for($i = 6; $i >= 0; $i--)
                        {{ App\Models\User::whereDate('created_at', today()->subDays($i))->count() }}{{ $i > 0 ? ',' : '' }}
                    @endfor
                ];
                break;
            case 'month':
                newLabels = ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4'];
                newData = [
                    {{ App\Models\User::whereBetween('created_at', [now()->startOfMonth(), now()->startOfMonth()->addDays(6)])->count() }},
                    {{ App\Models\User::whereBetween('created_at', [now()->startOfMonth()->addDays(7), now()->startOfMonth()->addDays(13)])->count() }},
                    {{ App\Models\User::whereBetween('created_at', [now()->startOfMonth()->addDays(14), now()->startOfMonth()->addDays(20)])->count() }},
                    {{ App\Models\User::whereBetween('created_at', [now()->startOfMonth()->addDays(21), now()->endOfMonth()])->count() }}
                ];
                break;
            case 'year':
            default:
                newLabels = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun'];
                newData = [
                    {{ App\Models\User::whereMonth('created_at', 1)->whereYear('created_at', date('Y'))->count() }},
                    {{ App\Models\User::whereMonth('created_at', 2)->whereYear('created_at', date('Y'))->count() }},
                    {{ App\Models\User::whereMonth('created_at', 3)->whereYear('created_at', date('Y'))->count() }},
                    {{ App\Models\User::whereMonth('created_at', 4)->whereYear('created_at', date('Y'))->count() }},
                    {{ App\Models\User::whereMonth('created_at', 5)->whereYear('created_at', date('Y'))->count() }},
                    {{ App\Models\User::whereMonth('created_at', 6)->whereYear('created_at', date('Y'))->count() }}
                ];
                break;
        }
        
        window.activityChart.data.labels = newLabels;
        window.activityChart.data.datasets[0].data = newData;
        window.activityChart.update('active');
    }
}

function updateStatsCards(period) {
    // Update the time period indicator in chart titles
    const periodText = {
        'today': "Aujourd'hui",
        'week': 'Cette semaine',
        'month': 'Ce mois',
        'year': 'Cette année'
    };
    
    // Update chart subtitles if they exist
    const resultsPeriod = document.querySelector('#resultsChart').closest('.bg-white').querySelector('.text-sm.text-gray-600');
    if (resultsPeriod) {
        resultsPeriod.textContent = periodText[period];
    }
}

function showFilterMessage(period) {
    const periodText = {
        'today': "Données d'aujourd'hui",
        'week': 'Données de cette semaine',
        'month': 'Données de ce mois',
        'year': 'Données de cette année'
    };
    
    // Create and show toast notification
    const toast = document.createElement('div');
    toast.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50 transition-opacity';
    toast.innerHTML = `
        <div class="flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <span>${periodText[period]} chargées</span>
        </div>
    `;
    
    document.body.appendChild(toast);
    
    // Remove toast after 3 seconds
    setTimeout(() => {
        toast.style.opacity = '0';
        setTimeout(() => {
            document.body.removeChild(toast);
        }, 300);
    }, 3000);
}

// Export Charts Function
window.exportCharts = function() {
    // Create a temporary canvas to combine all charts
    const canvas = document.createElement('canvas');
    const ctx = canvas.getContext('2d');
    
    // This is a simplified version - you might want to use a library like html2canvas
    console.log('Exporting charts...');
    alert('Fonctionnalité d\'export en cours de développement');
};

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