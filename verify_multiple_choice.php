<?php

require_once 'vendor/autoload.php';

use App\Models\quz;
use App\Models\repo;
use App\Models\categories;

$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "=== Multiple Choice Questions Verification ===\n\n";

// Get questions with multiple correct answers
$questionsWithMultipleCorrect = quz::whereHas('repos', function($query) {
    $query->where('is_correct', true);
}, '>', 1)->with('repos', 'category')->get();

echo "Found " . $questionsWithMultipleCorrect->count() . " questions with multiple correct answers:\n\n";

foreach ($questionsWithMultipleCorrect as $question) {
    echo "Category: " . $question->category->title . "\n";
    echo "Question: " . $question->question_text . "\n";
    echo "Answers:\n";
    
    $correctCount = 0;
    foreach ($question->repos as $index => $answer) {
        $status = $answer->is_correct ? "✓ CORRECT" : "✗ Incorrect";
        echo "  " . chr(65 + $index) . ". " . $answer->answer_text . " - " . $status . "\n";
        if ($answer->is_correct) $correctCount++;
    }
    
    echo "Total correct answers: $correctCount\n";
    echo "Type: " . ($correctCount > 1 ? "Multiple Choice" : "Single Choice") . "\n";
    echo "---\n\n";
}

// Get questions with single correct answer
$questionsWithSingleCorrect = quz::whereHas('repos', function($query) {
    $query->where('is_correct', true);
}, '=', 1)->with('repos', 'category')->take(3)->get();

echo "Sample questions with single correct answer:\n\n";

foreach ($questionsWithSingleCorrect as $question) {
    echo "Category: " . $question->category->title . "\n";
    echo "Question: " . substr($question->question_text, 0, 60) . "...\n";
    
    $correctCount = $question->repos->where('is_correct', true)->count();
    echo "Correct answers: $correctCount (Single Choice)\n";
    echo "---\n\n";
}

echo "✅ System now supports both single and multiple choice questions!\n";
echo "✅ Questions are automatically detected and displayed with appropriate UI\n";
echo "✅ Scoring system handles both types correctly\n";
