<?php
require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\quz;
use App\Models\repo;
use App\Models\categories;

try {
    echo "=== Komax 433 Test Verification ===\n\n";
    
    // Find Komax 433 category
    $komaxCategory = categories::where('title', 'Komax 433')->first();
    
    if (!$komaxCategory) {
        echo "ERROR: Komax 433 category not found!\n";
        exit(1);
    }
    
    echo "✓ Komax 433 category found (ID: {$komaxCategory->id})\n";
    
    // Get Komax 433 questions
    $komaxQuestions = quz::where('categories_id', $komaxCategory->id)->get();
    echo "✓ Komax 433 questions: " . $komaxQuestions->count() . "\n";
    
    // Get total answers for Komax 433 questions
    $totalAnswers = 0;
    $correctAnswers = 0;
    
    foreach ($komaxQuestions as $question) {
        $questionAnswers = repo::where('quz_id', $question->id)->get();
        $totalAnswers += $questionAnswers->count();
        $correctAnswers += $questionAnswers->where('is_correct', true)->count();
    }
    
    echo "✓ Total answers for Komax 433: {$totalAnswers}\n";
    echo "✓ Correct answers: {$correctAnswers}\n";
    
    // Show first few questions and their answers
    echo "\n=== Sample Questions ===\n";
    $firstThreeQuestions = $komaxQuestions->take(3);
    
    foreach ($firstThreeQuestions as $index => $question) {
        echo "\n" . ($index + 1) . ". {$question->question_text}\n";
        $answers = repo::where('quz_id', $question->id)->get();
        foreach ($answers as $answer) {
            $mark = $answer->is_correct ? "✓" : "✗";
            echo "   {$mark} {$answer->answer_text}\n";
        }
    }
    
    echo "\n=== Verification Complete ===\n";
    echo "✓ All Komax 433 test data has been successfully seeded!\n";
    
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    exit(1);
}
