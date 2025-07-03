<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\test;
use App\Models\formateur;
use App\Models\categories;
use App\Models\process;
use App\Models\quz;
use App\Models\roles;

class AdminController extends Controller
{
    /**
     * Show the admin login form
     */
    public function showLogin()
    {
        return view('admin.login');
    }    /**
     * Handle admin login attempt
     */
    public function login(Request $request)
    {
        $request->validate([
            'identification' => 'required|numeric',
            'password' => 'required|string|min:2',
        ]);

        // Attempt to find user by identification
        $user = User::where('identification', $request->identification)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Check if user has admin or super admin role
            if ($user->role_id == 1 || $user->role_id == 2) { // Assuming 1 = super admin, 2 = admin
                Auth::login($user, $request->filled('remember'));
                $request->session()->regenerate();
                return redirect()->intended(route('admin.dashboard'));
            } else {
                return back()->withErrors([
                    'identification' => 'Vous n\'avez pas les autorisations nécessaires pour accéder à l\'administration.',
                ]);
            }
        }

        return back()->withErrors([
            'identification' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
        ]);
    }    /**
     * Show the admin dashboard
     */
    public function dashboard()
    {
        $user = Auth::user();
        
        // Additional security check
        if (!$user || ($user->role_id != 1 && $user->role_id != 2)) {
            return redirect()->route('admin.login');
        }

        $dashboardData = $this->getDashboardData();

        return view('admin.enhanced-dashboard', compact('user', 'dashboardData'));
    }

    /**
     * Get dashboard statistics data
     */
    public function getDashboardData($period = 'year')
    {
        $data = [];

        // Basic counts
        $data['counts'] = [
            'users' => User::count(),
            'processes' => process::count(),
            'categories' => categories::count(),
            'tests' => test::count(),
            'formateurs' => formateur::count(),
            'questions' => quz::count(),
        ];

        // User role distribution
        $data['userRoles'] = $this->getUserRoleDistribution();

        // Test performance metrics
        $data['testMetrics'] = $this->getTestMetrics();

        // Top 5 formateur performance
        $data['topFormateurs'] = $this->getTopFormateurs();

        // Time-based data based on period
        $data['timeBasedData'] = $this->getTimeBasedData($period);

        // Recent activity
        $data['recentActivity'] = $this->getRecentActivity();

        // Additional statistics
        $data['additionalStats'] = $this->getAdditionalStats();
        
        // Retake statistics
        $data['retakeStats'] = $this->getRetakeStats();

        // Retake test statistics
        $data['retakeStats'] = $this->getRetakeStats();

        return $data;
    }

    /**
     * Get user role distribution
     */
    private function getUserRoleDistribution()
    {
        $roles = roles::with('users')->get();
        $roleData = [];
        $formateursCount = formateur::count();

        foreach ($roles as $role) {
            if ($role->users->count() > 0) {
                $roleData[] = [
                    'name' => $role->name,
                    'count' => $role->users->count()
                ];
            }
        }

        // Add formateurs as separate category
        if ($formateursCount > 0) {
            $roleData[] = [
                'name' => 'Formateurs',
                'count' => $formateursCount
            ];
        }

        return $roleData;
    }

    /**
     * Get test performance metrics
     */
    private function getTestMetrics()
    {
        $totalTests = test::count();
        
        if ($totalTests === 0) {
            return [
                'successRate' => 0,
                'averageScore' => 0,
                'excellent' => 0,
                'good' => 0,
                'needsImprovement' => 0,
                'totalTests' => 0
            ];
        }

        $excellentCount = test::where('pourcentage', '>=', 80)->count();
        $goodCount = test::whereBetween('pourcentage', [60, 79])->count();
        $needsImprovementCount = test::where('pourcentage', '<', 60)->count();
        $successfulTests = test::where('pourcentage', '>=', 60)->count();

        return [
            'successRate' => round(($successfulTests / $totalTests) * 100, 1),
            'averageScore' => round(test::avg('pourcentage') ?? 0, 1),
            'excellent' => round(($excellentCount / $totalTests) * 100, 1),
            'good' => round(($goodCount / $totalTests) * 100, 1),
            'needsImprovement' => round(($needsImprovementCount / $totalTests) * 100, 1),
            'totalTests' => $totalTests
        ];
    }

    /**
     * Get top 5 formateur performance
     */
    private function getTopFormateurs()
    {
        return formateur::with(['tests' => function($query) {
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
        ->values()
        ->toArray();
    }

    /**
     * Get time-based data for charts
     */
    private function getTimeBasedData($period = 'year')
    {
        switch ($period) {
            case 'today':
                return [
                    'labels' => ['00h-06h', '06h-12h', '12h-18h', '18h-24h'],
                    'testResults' => [
                        test::whereDate('created_at', today())->whereBetween(DB::raw('HOUR(created_at)'), [0, 5])->avg('pourcentage') ?? 0,
                        test::whereDate('created_at', today())->whereBetween(DB::raw('HOUR(created_at)'), [6, 11])->avg('pourcentage') ?? 0,
                        test::whereDate('created_at', today())->whereBetween(DB::raw('HOUR(created_at)'), [12, 17])->avg('pourcentage') ?? 0,
                        test::whereDate('created_at', today())->whereBetween(DB::raw('HOUR(created_at)'), [18, 23])->avg('pourcentage') ?? 0
                    ],
                    'userActivity' => [
                        User::whereDate('created_at', today())->whereBetween(DB::raw('HOUR(created_at)'), [0, 5])->count(),
                        User::whereDate('created_at', today())->whereBetween(DB::raw('HOUR(created_at)'), [6, 11])->count(),
                        User::whereDate('created_at', today())->whereBetween(DB::raw('HOUR(created_at)'), [12, 17])->count(),
                        User::whereDate('created_at', today())->whereBetween(DB::raw('HOUR(created_at)'), [18, 23])->count()
                    ]
                ];

            case 'week':
                $labels = [];
                $testResults = [];
                $userActivity = [];
                
                for ($i = 6; $i >= 0; $i--) {
                    $date = today()->subDays($i);
                    $labels[] = $date->format('D');
                    $testResults[] = test::whereDate('created_at', $date)->avg('pourcentage') ?? 0;
                    $userActivity[] = User::whereDate('created_at', $date)->count();
                }
                
                return [
                    'labels' => $labels,
                    'testResults' => $testResults,
                    'userActivity' => $userActivity
                ];

            case 'month':
                return [
                    'labels' => ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4'],
                    'testResults' => [
                        test::whereBetween('created_at', [now()->startOfMonth(), now()->startOfMonth()->addDays(6)])->avg('pourcentage') ?? 0,
                        test::whereBetween('created_at', [now()->startOfMonth()->addDays(7), now()->startOfMonth()->addDays(13)])->avg('pourcentage') ?? 0,
                        test::whereBetween('created_at', [now()->startOfMonth()->addDays(14), now()->startOfMonth()->addDays(20)])->avg('pourcentage') ?? 0,
                        test::whereBetween('created_at', [now()->startOfMonth()->addDays(21), now()->endOfMonth()])->avg('pourcentage') ?? 0
                    ],
                    'userActivity' => [
                        User::whereBetween('created_at', [now()->startOfMonth(), now()->startOfMonth()->addDays(6)])->count(),
                        User::whereBetween('created_at', [now()->startOfMonth()->addDays(7), now()->startOfMonth()->addDays(13)])->count(),
                        User::whereBetween('created_at', [now()->startOfMonth()->addDays(14), now()->startOfMonth()->addDays(20)])->count(),
                        User::whereBetween('created_at', [now()->startOfMonth()->addDays(21), now()->endOfMonth()])->count()
                    ]
                ];

            case 'year':
            default:
                return [
                    'labels' => ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun'],
                    'testResults' => [
                        test::whereMonth('created_at', 1)->whereYear('created_at', date('Y'))->avg('pourcentage') ?? 0,
                        test::whereMonth('created_at', 2)->whereYear('created_at', date('Y'))->avg('pourcentage') ?? 0,
                        test::whereMonth('created_at', 3)->whereYear('created_at', date('Y'))->avg('pourcentage') ?? 0,
                        test::whereMonth('created_at', 4)->whereYear('created_at', date('Y'))->avg('pourcentage') ?? 0,
                        test::whereMonth('created_at', 5)->whereYear('created_at', date('Y'))->avg('pourcentage') ?? 0,
                        test::whereMonth('created_at', 6)->whereYear('created_at', date('Y'))->avg('pourcentage') ?? 0
                    ],
                    'userActivity' => [
                        User::whereMonth('created_at', 1)->whereYear('created_at', date('Y'))->count(),
                        User::whereMonth('created_at', 2)->whereYear('created_at', date('Y'))->count(),
                        User::whereMonth('created_at', 3)->whereYear('created_at', date('Y'))->count(),
                        User::whereMonth('created_at', 4)->whereYear('created_at', date('Y'))->count(),
                        User::whereMonth('created_at', 5)->whereYear('created_at', date('Y'))->count(),
                        User::whereMonth('created_at', 6)->whereYear('created_at', date('Y'))->count()
                    ]
                ];
        }
    }

    /**
     * Get recent activity
     */
    private function getRecentActivity()
    {
        $recentTests = test::with(['user', 'formateur'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $recentUsers = User::with('role')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return [
            'tests' => $recentTests,
            'users' => $recentUsers
        ];
    }

    /**
     * Get additional statistics
     */
    private function getAdditionalStats()
    {
        $topTest = test::with('user')->orderBy('pourcentage', 'desc')->first();
        
        return [
            'todayTests' => test::whereDate('created_at', today())->count(),
            'todayTestsAvg' => test::whereDate('created_at', today())->avg('pourcentage') ?? 0,
            'todayQuestions' => quz::whereDate('created_at', today())->count(),
            'topPerformer' => $topTest ? [
                'score' => $topTest->pourcentage,
                'user' => $topTest->user ? $topTest->user->name . ' ' . $topTest->user->last_name : 'Utilisateur inconnu'
            ] : null
        ];
    }

    /**
     * Get retake test statistics
     */
    private function getRetakeStats()
    {
        // Get all test descriptions to identify potential retakes
        $testsByUser = test::select('user_id', 'description', DB::raw('COUNT(*) as count'))
                          ->groupBy('user_id', 'description')
                          ->having(DB::raw('COUNT(*)'), '>', 1)
                          ->get();
        
        $retakeCount = $testsByUser->sum('count') - $testsByUser->count();
        $usersWithRetakes = $testsByUser->groupBy('user_id')->count();
        
        return [
            'total_retakes' => $retakeCount,
            'users_with_retakes' => $usersWithRetakes,
            'retake_rate' => test::count() > 0 ? round(($retakeCount / test::count()) * 100, 1) : 0
        ];
    }

    /**
     * AJAX endpoint for filtered dashboard data
     */
    public function getDashboardDataAjax(Request $request)
    {
        $period = $request->get('period', 'year');
        $data = $this->getDashboardData($period);
        
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }/**
     * Handle admin logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('admin.login')->with('success', 'Vous avez été déconnecté avec succès.');    }    /**
     * Show admin profile
     */
    public function profile()
    {
        $user = Auth::user();
        
        // Additional security check
        if (!$user || ($user->role_id != 1 && $user->role_id != 2)) {
            return redirect()->route('admin.login');
        }
        
        return view('admin.enhanced-dashboard', compact('user'))->with('activeSection', 'profile');
    }

    /**
     * Update admin profile
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'identification' => 'required|numeric|unique:users,identification,' . $user->id,
            'current_password' => 'nullable|string',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        // Check current password if new password is provided
        if ($validated['password']) {
            if (!$validated['current_password'] || !Hash::check($validated['current_password'], $user->password)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Le mot de passe actuel est incorrect.'
                ], 400);
            }
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        unset($validated['current_password'], $validated['password_confirmation']);
        
        $user->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Profil mis à jour avec succès',
            'data' => $user
        ]);
    }

    /**
     * Get users for AJAX requests (for dropdowns)
     */
    public function ajaxUsers()
    {
        try {
            $users = User::select('id', 'name', 'last_name', 'identification')
                ->orderBy('name')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $users,
                'message' => 'Utilisateurs récupérés avec succès'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la récupération des utilisateurs'
            ], 500);
        }
    }

    /**
     * Show user test history page in admin dashboard
     */
    public function showUserHistory()
    {
        return view('admin.user-history');
    }

    /**
     * Get user test history via AJAX
     */
    public function getUserHistory(Request $request)
    {
        $request->validate([
            'identification' => 'required|numeric'
        ]);

        $user = User::where('identification', $request->identification)
                   ->with('role')
                   ->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Aucun utilisateur trouvé avec ce numéro d\'identification.'
            ]);
        }

        $tests = \App\Models\test::where('user_id', $user->id)
                    ->with(['formateur', 'quzs'])
                    ->orderBy('created_at', 'desc')
                    ->get();

        // Get category names for tests
        $testsWithCategories = $tests->map(function($test) {
            $category = null;
            if ($test->quzs->isNotEmpty()) {
                $firstQuestion = $test->quzs->first();
                $category = \App\Models\categories::find($firstQuestion->categories_id);
            }
            
            $test->category_name = $category ? $category->title : 'Catégorie inconnue';
            $test->process_name = $category && $category->process ? $category->process->title : 'Processus inconnu';
            return $test;
        });

        return response()->json([
            'success' => true,
            'user' => $user,
            'tests' => $testsWithCategories
        ]);
    }

    /**
     * Get all users with roles for management (Super Admin only)
     */
    public function getAllUsers()
    {
        // Check if user is super admin
        if (Auth::user()->role_id != 1) {
            return response()->json([
                'success' => false,
                'message' => 'Accès non autorisé'
            ], 403);
        }

        try {
            $users = User::with('role')
                ->orderBy('created_at', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $users,
                'message' => 'Utilisateurs récupérés avec succès'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la récupération des utilisateurs'
            ], 500);
        }
    }

    /**
     * Update user role (Super Admin only)
     */
    public function updateUserRole(Request $request, User $user)
    {
        // Check if user is super admin
        if (Auth::user()->role_id != 1) {
            return response()->json([
                'success' => false,
                'message' => 'Accès non autorisé'
            ], 403);
        }

        $request->validate([
            'role_id' => 'required|exists:roles,id|in:1,2,3'
        ]);

        try {
            // Prevent super admin from demoting themselves
            if ($user->id === Auth::user()->id && $request->role_id != 1) {
                return response()->json([
                    'success' => false,
                    'message' => 'Vous ne pouvez pas modifier votre propre rôle'
                ], 400);
            }

            $user->update(['role_id' => $request->role_id]);

            return response()->json([
                'success' => true,
                'message' => 'Rôle utilisateur mis à jour avec succès',
                'data' => $user->load('role')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la mise à jour du rôle'
            ], 500);
        }
    }
    
    /**
     * Create a new user (Super Admin only)
     */
    public function createUser(Request $request)
    {
        // Check if user is super admin
        if (Auth::user()->role_id != 1) {
            return response()->json([
                'success' => false,
                'message' => 'Accès non autorisé'
            ], 403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'identification' => 'required|numeric|unique:users,identification',
            'password' => 'required|string|min:1',
            'role_id' => 'required|exists:roles,id|in:1,2,3'
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'identification' => $request->identification,
                'password' => Hash::make($request->password),
                'role_id' => $request->role_id,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Utilisateur créé avec succès',
                'data' => $user->load('role')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la création de l\'utilisateur: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete a user (Super Admin only)
     */
    public function deleteUser(User $user)
    {
        // Check if user is super admin
        if (Auth::user()->role_id != 1) {
            return response()->json([
                'success' => false,
                'message' => 'Accès non autorisé'
            ], 403);
        }

        try {
            // Prevent super admin from deleting themselves
            if ($user->id === Auth::user()->id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Vous ne pouvez pas supprimer votre propre compte'
                ], 400);
            }

            // Prevent deletion of super admin users
            if ($user->role_id == 1) {
                return response()->json([
                    'success' => false,
                    'message' => 'Les comptes Super Admin ne peuvent pas être supprimés'
                ], 400);
            }

            // Store user info for response
            $userName = $user->name . ' ' . $user->last_name;
            
            // Delete the user
            $user->delete();

            return response()->json([
                'success' => true,
                'message' => "L'utilisateur {$userName} a été supprimé avec succès"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression de l\'utilisateur: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get all employees with their test statistics
     */
    public function getAllEmployees()
    {
        try {
            $employees = User::with(['role', 'tests' => function($query) {
                $query->latest()->take(5); // Get latest 5 tests
            }, 'tests.formateur'])
            ->withCount('tests')
            ->where('role_id', 3) // Only employees (role_id = 3)
            ->selectRaw('users.*, (SELECT MAX(created_at) FROM tests WHERE tests.user_id = users.id) as last_test_date')
            ->orderBy('name')
            ->get();

            return response()->json([
                'success' => true,
                'data' => $employees
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors du chargement des employés: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get detailed information about an employee including test history
     */
    public function getEmployeeDetails(User $user)
    {
        try {
            // Get employee with role
            $employee = $user->load('role');
            
            // Get all tests with detailed information
            $tests = test::where('user_id', $user->id)
                        ->with(['formateur', 'quzs'])
                        ->orderBy('created_at', 'desc')
                        ->get();

            // Get category names and process names for tests
            $testsWithCategories = $tests->map(function($test) {
                $category = null;
                $process = null;
                
                if ($test->quzs->isNotEmpty()) {
                    $firstQuestion = $test->quzs->first();
                    $category = categories::find($firstQuestion->categories_id);
                    if ($category && $category->process_id) {
                        $process = process::find($category->process_id);
                    }
                }
                
                $test->category_name = $category ? $category->title : 'Catégorie inconnue';
                $test->process_name = $process ? $process->title : 'Processus inconnu';
                return $test;
            });

            // Calculate statistics
            $totalTests = $tests->count();
            $averageScore = $tests->avg('pourcentage') ?? 0;
            $categoriesTested = $testsWithCategories->pluck('category_name')->unique()->count();

            return response()->json([
                'success' => true,
                'data' => [
                    'employee' => $employee,
                    'tests' => $testsWithCategories,
                    'statistics' => [
                        'total_tests' => $totalTests,
                        'average_score' => round($averageScore, 1),
                        'categories_tested' => $categoriesTested
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors du chargement des détails de l\'employé: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete an employee and all associated tests
     */
    public function deleteEmployee(User $user)
    {
        try {
            // Check if user is actually an employee
            if ($user->role_id != 3) {
                return response()->json([
                    'success' => false,
                    'message' => 'Seuls les employés peuvent être supprimés via cette méthode'
                ], 400);
            }

            // Get employee name for response
            $employeeName = $user->name;

            // Delete all tests associated with this employee
            $testsDeleted = test::where('user_id', $user->id)->delete();

            // Delete the employee
            $user->delete();

            return response()->json([
                'success' => true,
                'message' => "Employé '$employeeName' supprimé avec succès ($testsDeleted tests supprimés)"
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression de l\'employé: ' . $e->getMessage()
            ], 500);
        }
    }
}
