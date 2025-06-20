<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\categories;
use App\Models\formateur;
use App\Models\test;
use App\Models\quz;
use App\Models\repo;
use App\Models\roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserTestController extends Controller
{    /**
     * Show the test registration form
     */
    public function showTestForm(Request $request)
    {
        $categories = categories::with('process')->get();
        $formateurs = formateur::all();
        $selectedCategoryId = $request->get('category_id');
        
        return view('quiz.test-registration', compact('categories', 'formateurs', 'selectedCategoryId'));
    }

    /**
     * Register user and start test
     */
    public function registerAndStartTest(Request $request)
    {        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'identification' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'formateur_id' => 'required|exists:formateurs,id',
        ]);        // Get employee role (assuming role_id 3 is for employees)
        $employeeRole = roles::where('name', 'employee')->first();
        if (!$employeeRole) {
            // Create employee role if it doesn't exist
            $employeeRole = roles::create(['name' => 'employee']);
        }

        // Check if user already exists, if not create new user
        $user = User::where('identification', $request->identification)->first();
        
        if (!$user) {
            // Create new user if doesn't exist
            $user = User::create([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'identification' => $request->identification,
                'password' => Hash::make($request->identification), // Use identification as password
                'role_id' => $employeeRole->id,
            ]);
        } else {
            // Update existing user information if needed
            $user->update([
                'name' => $request->name,
                'last_name' => $request->last_name,
            ]);
        }

        // Create test record with automatic date
        $test = test::create([
            'user_id' => $user->id,
            'formateur_id' => $request->formateur_id,
            'description' => 'Test automatique - ' . categories::find($request->category_id)->title,
            'resultat' => 0, // Will be updated after test completion
            'pourcentage' => 0, // Will be calculated after test completion
            'create_at' => now()->format('Y-m-d'),
        ]);

        // Log in the user
        Auth::login($user);

        // Redirect to the test interface with the selected category
        return redirect()->route('quiz.take', [
            'test_id' => $test->id,
            'category_id' => $request->category_id
        ]);
    }

    /**
     * Show the quiz interface
     */
    public function takeQuiz(Request $request)
    {
        $testId = $request->test_id;
        $categoryId = $request->category_id;
        
        $test = test::with(['user', 'formateur'])->findOrFail($testId);
        $category = categories::with('process')->findOrFail($categoryId);
        
        // Get questions for this category
        $questions = quz::where('categories_id', $categoryId)
                       ->with('repos')
                       ->get();

        if ($questions->isEmpty()) {
            return redirect()->back()->with('error', 'Aucune question trouvée pour cette catégorie.');
        }

        return view('quiz.take-test', compact('test', 'category', 'questions'));
    }    /**
     * Submit quiz answers and calculate results
     */
    public function submitQuiz(Request $request)
    {
        $testId = $request->test_id;
        $answers = $request->answers; // Array of question_id => answer_id(s)
        
        $test = test::findOrFail($testId);
        
        $totalQuestions = count($answers);
        $correctAnswers = 0;
        
        // Calculate score
        foreach ($answers as $questionId => $selectedAnswers) {
            // Get all correct answers for this question
            $correctAnswerIds = repo::where('quz_id', $questionId)
                                   ->where('is_correct', true)
                                   ->pluck('id')
                                   ->toArray();
            
            // Ensure selectedAnswers is an array
            if (!is_array($selectedAnswers)) {
                $selectedAnswers = [$selectedAnswers];
            }
            
            // Convert to integers for comparison
            $selectedAnswers = array_map('intval', $selectedAnswers);
            $correctAnswerIds = array_map('intval', $correctAnswerIds);
            
            // Sort both arrays for comparison
            sort($selectedAnswers);
            sort($correctAnswerIds);
            
            // Check if the selected answers exactly match the correct answers
            if ($selectedAnswers === $correctAnswerIds) {
                $correctAnswers++;
            }
        }
        
        $percentage = $totalQuestions > 0 ? round(($correctAnswers / $totalQuestions) * 100) : 0;
        
        // Update test results
        $test->update([
            'resultat' => $correctAnswers,
            'pourcentage' => $percentage,
        ]);

        // Associate questions with test (many-to-many relationship)
        $questionIds = array_keys($answers);
        $test->quzs()->sync($questionIds);

        return redirect()->route('quiz.results', ['test_id' => $testId]);
    }

    /**
     * Show quiz results
     */
    public function showResults($testId)
    {
        $test = test::with(['user', 'formateur', 'quzs'])->findOrFail($testId);
        
        return view('quiz.results', compact('test'));
    }

    /**
     * Get questions by category (AJAX)
     */
    public function getQuestionsByCategory($categoryId)
    {
        $questions = quz::where('categories_id', $categoryId)
                       ->with('repos')
                       ->get();
        
        return response()->json([
            'success' => true,
            'questions' => $questions
        ]);
    }

    /**
     * Show user's test history
     */
    public function testHistory(Request $request)
    {
        $identification = $request->get('identification');
        
        if (!$identification) {
            return redirect()->route('quiz.start')->with('error', 'Veuillez entrer votre numéro d\'identification.');
        }
        
        $user = User::where('identification', $identification)->first();
        
        if (!$user) {
            return redirect()->route('quiz.start')->with('error', 'Aucun utilisateur trouvé avec ce numéro d\'identification.');
        }
        
        $tests = test::where('user_id', $user->id)
                    ->with(['formateur', 'quzs'])
                    ->orderBy('created_at', 'desc')
                    ->get();
        
        // Group tests by category
        $testsByCategory = $tests->groupBy(function($test) {
            return $test->description;
        });
        
        $categories = categories::with('process')->get();
        $formateurs = formateur::all();
        
        return view('quiz.test-history', compact('user', 'tests', 'testsByCategory', 'categories', 'formateurs'));
    }

    /**
     * Show form to check test history
     */
    public function showHistoryForm()
    {
        return view('quiz.check-history');
    }
}
