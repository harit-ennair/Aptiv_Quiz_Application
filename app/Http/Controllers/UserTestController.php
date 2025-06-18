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
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'identification' => 'required|integer|unique:users,identification',
            'password' => 'required|string|min:6',
            'category_id' => 'required|exists:categories,id',
            'formateur_id' => 'required|exists:formateurs,id',
        ]);        // Get employee role (assuming role_id 2 is for employees)
        $employeeRole = roles::where('name', 'employee')->first();
        if (!$employeeRole) {
            // Create employee role if it doesn't exist
            $employeeRole = roles::create(['name' => 'employee']);
        }

        // Create user
        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'identification' => $request->identification,
            'password' => Hash::make($request->password),
            'role_id' => $employeeRole->id,
        ]);

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
    }

    /**
     * Submit quiz answers and calculate results
     */
    public function submitQuiz(Request $request)
    {
        $testId = $request->test_id;
        $answers = $request->answers; // Array of question_id => answer_id
        
        $test = test::findOrFail($testId);
        
        $totalQuestions = count($answers);
        $correctAnswers = 0;
        
        // Calculate score
        foreach ($answers as $questionId => $selectedAnswerId) {
            $correctAnswer = repo::where('quz_id', $questionId)
                                ->where('is_correct', true)
                                ->first();
            
            if ($correctAnswer && $correctAnswer->id == $selectedAnswerId) {
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
}
