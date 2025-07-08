<!-- Dashboard Statistics Section -->
<div class="space-y-6">
    <!-- Enhanced Header -->
    <div class="bg-gradient-to-r from-white via-blue-50 to-purple-50 rounded-2xl shadow-lg border border-gray-200 p-6">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
            <div class="text-center lg:text-left">
                <div class="flex items-center justify-center lg:justify-start gap-3 mb-2">
                    <div class="p-2 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl lg:text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                        Dashboard
                    </h2>
                </div>
                <p class="text-gray-600 text-sm lg:text-base">Real-time system metrics overview</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <div class="relative">
                    <select id="time-filter" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-aptiv-orange-500 focus:border-transparent text-sm">
                        <option value="today">Today</option>
                        <option value="week">This Week</option>
                        <option value="month">This Month</option>
                        <option value="year" selected>This Year</option>
                    </select>
                </div>
                <button onclick="exportToPowerPoint()" class="px-4 py-2 text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 rounded-lg transition-colors btn-touch">
                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Export PPT
                </button>
                <button onclick="refreshDashboard()" class="px-4 py-2 text-sm font-medium text-white bg-aptiv-orange-600 hover:bg-aptiv-orange-700 rounded-lg transition-colors btn-touch">
                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Refresh
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
                <p class="text-sm font-medium text-gray-600">Users</p>
                <p class="text-2xl font-bold text-gray-900 mb-1" data-stat="users">{{ $dashboardData['counts']['users'] }}</p>
                <p class="text-xs text-gray-500">Total accounts</p>
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
                <p class="text-sm font-medium text-gray-600">Processes</p>
                <p class="text-2xl font-bold text-gray-900 mb-1" data-stat="processes">{{ $dashboardData['counts']['processes'] }}</p>
                <p class="text-xs text-gray-500">Total processes</p>
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
                <p class="text-sm font-medium text-gray-600">Categories</p>
                <p class="text-2xl font-bold text-gray-900 mb-1" data-stat="categories">{{ $dashboardData['counts']['categories'] }}</p>
                <p class="text-xs text-gray-500">Total categories</p>
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
                <p class="text-2xl font-bold text-gray-900 mb-1" data-stat="tests">{{ $dashboardData['counts']['tests'] }}</p>
                <p class="text-xs text-gray-500">Total tests</p>
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
                <p class="text-sm font-medium text-gray-600">Trainers</p>
                <p class="text-2xl font-bold text-gray-900 mb-1" data-stat="formateurs">{{ $dashboardData['counts']['formateurs'] }}</p>
                <p class="text-xs text-gray-500">Total trainers</p>
            </div>
        </div>
    </div>

    <!-- Interactive Charts Section -->
    <div class="space-y-6">
        <!-- Charts Header -->
        <div class="flex items-center justify-between">
            <h3 class="text-xl font-bold text-gray-900">Visual Analytics</h3>
            <div class="flex gap-2">

            </div>
        </div>

        <!-- Charts Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Users Distribution Chart -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h4 class="text-lg font-semibold text-gray-900">User Distribution</h4>
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 bg-blue-500 rounded-full"></span>
                        <span class="text-sm text-gray-600">By Role</span>
                    </div>
                </div>
                <div class="relative h-64">
                    <canvas id="usersChart"></canvas>
                </div>
                <div class="mt-4 flex justify-center">
                    <div class="grid grid-cols-2 gap-4 text-sm" id="userRoleLegend">
                        @php
                            $colors = ['from-blue-500 to-blue-600', 'from-green-500 to-green-600', 'from-purple-500 to-purple-600', 'from-orange-500 to-orange-600', 'from-pink-500 to-pink-600'];
                            $colorIndex = 0;
                        @endphp
                        
                        @foreach($dashboardData['userRoles'] as $role)
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 bg-gradient-to-r {{ $colors[$colorIndex % count($colors)] }} rounded-full"></span>
                                <span class="text-gray-600">{{ $role['name'] }} ({{ $role['count'] }})</span>
                            </div>
                            @php $colorIndex++; @endphp
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Test Results Trend -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h4 class="text-lg font-semibold text-gray-900">Results Trend</h4>
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                        <span class="text-sm text-gray-600">This Year</span>
                    </div>
                </div>
                <div class="relative h-64">
                    <canvas id="resultsChart"></canvas>
                </div>
                <div class="mt-4 grid grid-cols-3 gap-4 text-center">
                    <div>
                        <p class="text-2xl font-bold text-green-600" data-metric="excellent">{{ $dashboardData['testMetrics']['excellent'] }}%</p>
                        <p class="text-xs text-gray-600">Excellent</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-yellow-600" data-metric="good">{{ $dashboardData['testMetrics']['good'] }}%</p>
                        <p class="text-xs text-gray-600">Good</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-red-600" data-metric="needsImprovement">{{ $dashboardData['testMetrics']['needsImprovement'] }}%</p>
                        <p class="text-xs text-gray-600">Needs Improvement</p>
                    </div>
                </div>
            </div>

            <!-- Top 5 Formateur Performance -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h4 class="text-lg font-semibold text-gray-900">Top 5 Trainer Performance</h4>
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 bg-purple-500 rounded-full"></span>
                        <span class="text-sm text-gray-600">Average Score</span>
                    </div>
                </div>
                <div class="relative h-64">
                    <canvas id="formateurChart"></canvas>
                </div>
                <div class="mt-4 text-center">
                    <p class="text-sm text-gray-600">
                        <span class="font-semibold">{{ $dashboardData['counts']['formateurs'] }}</span> formateurs actifs
                    </p>
                </div>
            </div>

            <!-- Monthly Activity -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h4 class="text-lg font-semibold text-gray-900">Monthly Activity</h4>
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 bg-aptiv-orange-500 rounded-full"></span>
                        <span class="text-sm text-gray-600">Registrations</span>
                    </div>
                </div>
                <div class="relative h-64">
                    <canvas id="activityChart"></canvas>
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
                        <p class="text-lg font-bold text-gray-900">{{ $dashboardData['counts']['questions'] }}</p>
                        <p class="text-sm text-gray-600">Questions</p>
                    </div>
                </div>
                <div class="mt-2 text-xs text-gray-500">
                    +{{ $dashboardData['additionalStats']['todayQuestions'] }} aujourd'hui
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
                        <p class="text-lg font-bold text-gray-900">{{ $dashboardData['counts']['processes'] }}</p>
                        <p class="text-sm text-gray-600">Processus</p>
                    </div>
                </div>
                <div class="mt-2 text-xs text-gray-500">
                    {{ $dashboardData['counts']['categories'] }} catégories liées
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
                        <p class="text-lg font-bold text-gray-900" data-activity="testsToday">{{ $dashboardData['additionalStats']['todayTests'] }}</p>
                        <p class="text-sm text-gray-600">Tests Today</p>
                    </div>
                </div>
                <div class="mt-2 text-xs text-gray-500">
                    Average: <span data-activity="averageScore">{{ number_format($dashboardData['additionalStats']['todayTestsAvg'], 1) }}</span>%
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
                        @if($dashboardData['additionalStats']['topPerformer'])
                            <p class="text-lg font-bold text-gray-900">{{ $dashboardData['additionalStats']['topPerformer']['score'] }}%</p>
                            <p class="text-sm text-gray-600">Meilleur Score</p>
                        @else
                            <p class="text-lg font-bold text-gray-900">-</p>
                            <p class="text-sm text-gray-600">Meilleur Score</p>
                        @endif
                    </div>
                </div>
                <div class="mt-2 text-xs text-gray-500">
                    @if($dashboardData['additionalStats']['topPerformer'])
                        {{ $dashboardData['additionalStats']['topPerformer']['user'] }}
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
            @if($dashboardData['recentActivity']['tests']->count() > 0 || $dashboardData['recentActivity']['users']->count() > 0)
                <div class="space-y-4">
                    @if($dashboardData['recentActivity']['tests']->count() > 0)
                        <div>
                            <h4 class="text-sm font-semibold text-gray-900 mb-3">Tests Récents</h4>
                            <div class="space-y-3">
                                @foreach($dashboardData['recentActivity']['tests'] as $test)
                                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 bg-{{ $test->pourcentage >= 75 ? 'green' : ($test->pourcentage >= 50 ? 'yellow' : 'red') }}-100 rounded-full flex items-center justify-center">
                                                <svg class="w-4 h-4 text-{{ $test->pourcentage >= 75 ? 'green' : ($test->pourcentage >= 50 ? 'yellow' : 'red') }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">{{ $test->user->name ?? 'Utilisateur' }} {{ $test->user->last_name ?? '' }}</p>
                                                <p class="text-xs text-gray-500">{{ $test->description ?? 'Test' }} • {{ $test->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-sm font-bold text-{{ $test->pourcentage >= 75 ? 'green' : ($test->pourcentage >= 50 ? 'yellow' : 'red') }}-600">{{ $test->pourcentage }}%</p>
                                            <p class="text-xs text-gray-500">{{ $test->resultat }}/{{ $test->resultat + ($test->pourcentage > 0 ? intval((100 - $test->pourcentage) * $test->resultat / $test->pourcentage) : 0) }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    
                    @if($dashboardData['recentActivity']['users']->count() > 0)
                        <div>
                            <h4 class="text-sm font-semibold text-gray-900 mb-3">Nouveaux Utilisateurs</h4>
                            <div class="space-y-3">
                                @foreach($dashboardData['recentActivity']['users'] as $user)
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
    
    // Get real user role data from controller
    const userRoleData = {
        labels: {!! json_encode(array_column($dashboardData['userRoles'], 'name')) !!},
        counts: {!! json_encode(array_column($dashboardData['userRoles'], 'count')) !!}
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
            labels: {!! json_encode($dashboardData['timeBasedData']['labels']) !!},
            datasets: [{
                label: 'Score Moyen',
                data: {!! json_encode($dashboardData['timeBasedData']['testResults']) !!},
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
    
    // Get real formateur performance data from controller
    const formateurData = {
        labels: {!! json_encode(array_column($dashboardData['topFormateurs'], 'name')) !!},
        scores: {!! json_encode(array_column($dashboardData['topFormateurs'], 'avgScore')) !!},
        testCounts: {!! json_encode(array_column($dashboardData['topFormateurs'], 'testCount')) !!}
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
            labels: {!! json_encode($dashboardData['timeBasedData']['labels']) !!},
            datasets: [{
                label: 'Inscriptions',
                data: {!! json_encode($dashboardData['timeBasedData']['userActivity']) !!},
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

    // Time filter functionality with AJAX
    const timeFilter = document.getElementById('time-filter');
    if (timeFilter) {
        timeFilter.addEventListener('change', function() {
            const selectedPeriod = this.value;
            console.log('Time filter changed to:', selectedPeriod);
            
            // Show loading state
            showLoadingState();
            
            // Fetch new data from controller
            fetch(`{{ route('admin.dashboard.data') }}?period=${selectedPeriod}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        applyTimeFilterWithData(selectedPeriod, data.data);
                        hideLoadingState();
                        showFilterMessage(selectedPeriod);
                    } else {
                        console.error('Failed to fetch dashboard data');
                        hideLoadingState();
                    }
                })
                .catch(error => {
                    console.error('Error fetching dashboard data:', error);
                    hideLoadingState();
                });
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

function applyTimeFilterWithData(period, data) {
    // Update Test Results Trend Chart
    updateResultsChartWithData(data.timeBasedData);
    
    // Update Monthly Activity Chart
    updateActivityChartWithData(data.timeBasedData);
    
    // Update stats cards
    updateStatsCards(period);
}

function updateResultsChartWithData(timeBasedData) {
    if (window.resultsChart) {
        window.resultsChart.data.labels = timeBasedData.labels;
        window.resultsChart.data.datasets[0].data = timeBasedData.testResults;
        window.resultsChart.update('active');
    }
}

function updateActivityChartWithData(timeBasedData) {
    if (window.activityChart) {
        window.activityChart.data.labels = timeBasedData.labels;
        window.activityChart.data.datasets[0].data = timeBasedData.userActivity;
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
    alert('Chart export functionality in development');
};

// PowerPoint Export Function
window.exportToPowerPoint = function() {
    // Show loading state
    showExportLoadingState();
    
    // Import PptxGenJS library dynamically
    if (typeof PptxGenJS === 'undefined') {
        const script = document.createElement('script');
        script.src = 'https://cdn.jsdelivr.net/npm/pptxgenjs@3.12.0/dist/pptxgen.bundle.js';
        script.onload = function() {
            generatePowerPointPresentation();
        };
        script.onerror = function() {
            hideExportLoadingState();
            alert('Error loading PowerPoint export library. Please try again.');
        };
        document.head.appendChild(script);
    } else {
        generatePowerPointPresentation();
    }
};

function generatePowerPointPresentation() {
    try {
        // Create new PowerPoint presentation
        const pptx = new PptxGenJS();
        
        // Set presentation properties
        pptx.author = 'APTIV Dashboard System';
        pptx.company = 'APTIV';
        pptx.title = 'Dashboard Analytics Report';
        pptx.subject = 'System Performance Analytics';
        
        // Define theme colors
        const colors = {
            primary: '3B82F6',
            secondary: '10B981',
            accent: 'F97316',
            purple: '8B5CF6',
            dark: '1F2937',
            light: 'F9FAFB'
        };
        
        // Get current date
        const currentDate = new Date().toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        
        // Slide 1: Title Slide
        const titleSlide = pptx.addSlide();
        titleSlide.background = { color: colors.light };
        
        // Add title
        titleSlide.addText('APTIV Dashboard Report', {
            x: 1,
            y: 2,
            w: 8,
            h: 1.5,
            fontSize: 36,
            bold: true,
            color: colors.dark,
            align: 'center'
        });
        
        // Add subtitle
        titleSlide.addText('System Performance Analytics', {
            x: 1,
            y: 3.5,
            w: 8,
            h: 0.8,
            fontSize: 20,
            color: colors.primary,
            align: 'center'
        });
        
        // Add date
        titleSlide.addText(currentDate, {
            x: 1,
            y: 4.5,
            w: 8,
            h: 0.5,
            fontSize: 14,
            color: colors.dark,
            align: 'center'
        });
        
        // Add logo or icon (text-based)
        titleSlide.addText('📊', {
            x: 4.5,
            y: 1,
            w: 1,
            h: 1,
            fontSize: 48,
            align: 'center'
        });
        
        // Slide 2: System Overview
        const overviewSlide = pptx.addSlide();
        overviewSlide.background = { color: colors.light };
        
        overviewSlide.addText('System Overview', {
            x: 0.5,
            y: 0.5,
            w: 9,
            h: 0.8,
            fontSize: 28,
            bold: true,
            color: colors.dark
        });
        
        // Get dashboard data from the page
        const statsData = extractDashboardStats();
        
        // Add statistics cards
        const cardData = [
            { title: 'Users', value: statsData.users, color: colors.primary, icon: '👥' },
            { title: 'Processes', value: statsData.processes, color: colors.secondary, icon: '📋' },
            { title: 'Categories', value: statsData.categories, color: colors.accent, icon: '🏷️' },
            { title: 'Tests', value: statsData.tests, color: colors.purple, icon: '🧪' },
            { title: 'Trainers', value: statsData.formateurs, color: colors.primary, icon: '👨‍🏫' }
        ];
        
        cardData.forEach((card, index) => {
            const x = 0.5 + (index % 3) * 3;
            const y = 2 + Math.floor(index / 3) * 2;
            
            // Add card background
            overviewSlide.addShape('rect', {
                x: x,
                y: y,
                w: 2.5,
                h: 1.5,
                fill: { color: 'FFFFFF' },
                line: { color: card.color, width: 2 }
            });
            
            // Add icon
            overviewSlide.addText(card.icon, {
                x: x + 0.2,
                y: y + 0.1,
                w: 0.6,
                h: 0.6,
                fontSize: 20,
                align: 'center'
            });
            
            // Add value
            overviewSlide.addText(card.value.toString(), {
                x: x + 0.8,
                y: y + 0.1,
                w: 1.5,
                h: 0.6,
                fontSize: 24,
                bold: true,
                color: card.color,
                align: 'center'
            });
            
            // Add title
            overviewSlide.addText(card.title, {
                x: x + 0.2,
                y: y + 0.8,
                w: 2.1,
                h: 0.5,
                fontSize: 12,
                color: colors.dark,
                align: 'center'
            });
        });
        
        // Slide 3: User Distribution
        const userSlide = pptx.addSlide();
        userSlide.background = { color: colors.light };
        
        userSlide.addText('User Distribution by Role', {
            x: 0.5,
            y: 0.5,
            w: 9,
            h: 0.8,
            fontSize: 28,
            bold: true,
            color: colors.dark
        });
        
        // Add user roles data
        const userRoles = extractUserRolesData();
        if (userRoles.length > 0) {
            userRoles.forEach((role, index) => {
                const y = 2 + index * 0.8;
                
                // Add role name
                userSlide.addText(role.name, {
                    x: 1,
                    y: y,
                    w: 3,
                    h: 0.5,
                    fontSize: 16,
                    color: colors.dark
                });
                
                // Add count
                userSlide.addText(role.count.toString(), {
                    x: 4,
                    y: y,
                    w: 1,
                    h: 0.5,
                    fontSize: 16,
                    bold: true,
                    color: colors.primary
                });
                
                // Add progress bar
                const percentage = (role.count / statsData.users) * 100;
                userSlide.addShape('rect', {
                    x: 5.5,
                    y: y + 0.1,
                    w: 3,
                    h: 0.3,
                    fill: { color: 'E5E7EB' }
                });
                
                userSlide.addShape('rect', {
                    x: 5.5,
                    y: y + 0.1,
                    w: (percentage / 100) * 3,
                    h: 0.3,
                    fill: { color: colors.primary }
                });
            });
        }
        
        // Slide 4: Performance Metrics
        const performanceSlide = pptx.addSlide();
        performanceSlide.background = { color: colors.light };
        
        performanceSlide.addText('Performance Metrics', {
            x: 0.5,
            y: 0.5,
            w: 9,
            h: 0.8,
            fontSize: 28,
            bold: true,
            color: colors.dark
        });
        
        // Add performance data
        const testMetrics = extractTestMetrics();
        
        const performanceData = [
            { label: 'Excellent Performance', value: testMetrics.excellent, color: colors.secondary },
            { label: 'Good Performance', value: testMetrics.good, color: colors.accent },
            { label: 'Needs Improvement', value: testMetrics.needsImprovement, color: 'DC2626' }
        ];
        
        performanceData.forEach((metric, index) => {
            const y = 2 + index * 1.2;
            
            // Add metric label
            performanceSlide.addText(metric.label, {
                x: 1,
                y: y,
                w: 4,
                h: 0.6,
                fontSize: 18,
                color: colors.dark
            });
            
            // Add percentage
            performanceSlide.addText(metric.value + '%', {
                x: 5,
                y: y,
                w: 1.5,
                h: 0.6,
                fontSize: 24,
                bold: true,
                color: metric.color
            });
            
            // Add progress bar
            performanceSlide.addShape('rect', {
                x: 6.5,
                y: y + 0.15,
                w: 2,
                h: 0.3,
                fill: { color: 'E5E7EB' }
            });
            
            performanceSlide.addShape('rect', {
                x: 6.5,
                y: y + 0.15,
                w: (metric.value / 100) * 2,
                h: 0.3,
                fill: { color: metric.color }
            });
        });
        
        // Slide 5: Recent Activity Summary
        const activitySlide = pptx.addSlide();
        activitySlide.background = { color: colors.light };
        
        activitySlide.addText('Recent Activity Summary', {
            x: 0.5,
            y: 0.5,
            w: 9,
            h: 0.8,
            fontSize: 28,
            bold: true,
            color: colors.dark
        });
        
        // Add recent activity data
        const recentActivity = extractRecentActivity();
        
        activitySlide.addText('Recent Tests Completed', {
            x: 1,
            y: 2,
            w: 8,
            h: 0.5,
            fontSize: 20,
            bold: true,
            color: colors.primary
        });
        
        activitySlide.addText(`• ${recentActivity.testsToday} tests completed today`, {
            x: 1.5,
            y: 2.8,
            w: 7,
            h: 0.4,
            fontSize: 16,
            color: colors.dark
        });
        
        activitySlide.addText(`• Average score: ${recentActivity.averageScore}%`, {
            x: 1.5,
            y: 3.2,
            w: 7,
            h: 0.4,
            fontSize: 16,
            color: colors.dark
        });
        
        activitySlide.addText('New User Registrations', {
            x: 1,
            y: 4,
            w: 8,
            h: 0.5,
            fontSize: 20,
            bold: true,
            color: colors.secondary
        });
        
        activitySlide.addText(`• ${recentActivity.newUsers} new users registered`, {
            x: 1.5,
            y: 4.8,
            w: 7,
            h: 0.4,
            fontSize: 16,
            color: colors.dark
        });
        
        // Generate and download the presentation
        const fileName = `APTIV_Dashboard_Report_${new Date().toISOString().split('T')[0]}.pptx`;
        
        pptx.writeFile({ fileName: fileName }).then(() => {
            hideExportLoadingState();
            showSuccessMessage('PowerPoint presentation exported successfully!');
        }).catch((error) => {
            hideExportLoadingState();
            console.error('Error generating PowerPoint:', error);
            alert('Error generating PowerPoint presentation. Please try again.');
        });
        
    } catch (error) {
        hideExportLoadingState();
        console.error('Error in PowerPoint generation:', error);
        alert('Error generating PowerPoint presentation. Please try again.');
    }
}

// Helper functions to extract data from the dashboard
function extractDashboardStats() {
    return {
        users: parseInt(document.querySelector('[data-stat="users"]')?.textContent || '0'),
        processes: parseInt(document.querySelector('[data-stat="processes"]')?.textContent || '0'),
        categories: parseInt(document.querySelector('[data-stat="categories"]')?.textContent || '0'),
        tests: parseInt(document.querySelector('[data-stat="tests"]')?.textContent || '0'),
        formateurs: parseInt(document.querySelector('[data-stat="formateurs"]')?.textContent || '0')
    };
}

function extractUserRolesData() {
    const roles = [];
    document.querySelectorAll('#userRoleLegend .flex.items-center').forEach(item => {
        const text = item.textContent.trim();
        const match = text.match(/(.+) \((\d+)\)/);
        if (match) {
            roles.push({
                name: match[1],
                count: parseInt(match[2])
            });
        }
    });
    return roles;
}

function extractTestMetrics() {
    const excellent = document.querySelector('[data-metric="excellent"]')?.textContent?.replace('%', '') || '0';
    const good = document.querySelector('[data-metric="good"]')?.textContent?.replace('%', '') || '0';
    const needsImprovement = document.querySelector('[data-metric="needsImprovement"]')?.textContent?.replace('%', '') || '0';
    
    return {
        excellent: parseInt(excellent),
        good: parseInt(good),
        needsImprovement: parseInt(needsImprovement)
    };
}

function extractRecentActivity() {
    const testsToday = document.querySelector('[data-activity="testsToday"]')?.textContent || '0';
    const averageScore = document.querySelector('[data-activity="averageScore"]')?.textContent || '0';
    const newUsers = document.querySelector('[data-activity="newUsers"]')?.textContent || '0';
    
    return {
        testsToday: parseInt(testsToday),
        averageScore: parseFloat(averageScore),
        newUsers: parseInt(newUsers)
    };
}

function showExportLoadingState() {
    // Create overlay
    const overlay = document.createElement('div');
    overlay.id = 'export-overlay';
    overlay.className = 'fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50';
    overlay.innerHTML = `
        <div class="bg-white rounded-lg p-6 max-w-sm w-full mx-4">
            <div class="flex items-center justify-center mb-4">
                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-purple-600"></div>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 text-center mb-2">Exporting to PowerPoint</h3>
            <p class="text-gray-600 text-center text-sm">Please wait while we generate your presentation...</p>
        </div>
    `;
    document.body.appendChild(overlay);
}

function hideExportLoadingState() {
    const overlay = document.getElementById('export-overlay');
    if (overlay) {
        overlay.remove();
    }
}

function showSuccessMessage(message) {
    const toast = document.createElement('div');
    toast.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transition-opacity';
    toast.innerHTML = `
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(toast);
    
    // Remove toast after 5 seconds
    setTimeout(() => {
        toast.style.opacity = '0';
        setTimeout(() => {
            document.body.removeChild(toast);
        }, 300);
    }, 5000);
}

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