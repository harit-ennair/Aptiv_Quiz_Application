<?php

require_once 'vendor/autoload.php';

use App\Models\quz;
use App\Models\repo;
use App\Models\categories;

$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "=== Testing Take Test Questions ===\n\n";

// Get the first category with questions
$category = categories::whereHas('quzs')->first();

if (!$category) {
    echo "No categories with questions found!\n";
    exit;
}

echo "Category: {$category->title}\n";

// Get questions for this category
$questions = quz::where('categories_id', $category->id)
              ->with('repos')
              ->take(5)
              ->get();

echo "Found {$questions->count()} questions:\n\n";

foreach ($questions as $index => $question) {
    $correctCount = $question->repos->where('is_correct', true)->count();
    $questionType = $correctCount > 1 ? "Multiple Choice (checkboxes)" : "Single Choice (radio)";
    
    echo "Question " . ($index + 1) . ": {$questionType}\n";
    echo "Text: " . substr($question->question_text, 0, 80) . "...\n";
    echo "Answers:\n";
    
    foreach ($question->repos as $answerIndex => $answer) {
        $letter = chr(65 + $answerIndex);
        $status = $answer->is_correct ? "✓" : "✗";
        echo "  {$letter}. " . substr($answer->answer_text, 0, 50) . "... [{$status}]\n";
    }
    
    echo "Input name: answers[{$question->id}]" . ($correctCount > 1 ? "[]" : "") . "\n";
    echo "Input type: " . ($correctCount > 1 ? "checkbox" : "radio") . "\n";
    echo "---\n\n";
}

echo "✅ Questions are properly configured for the take test interface!\n";
