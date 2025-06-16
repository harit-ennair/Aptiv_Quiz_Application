<?php

require_once 'vendor/autoload.php';

use App\Models\quz;

// Initialize Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Testing questions API...\n";

// Get questions with relationships
$questions = quz::with(['category.process', 'repos'])->get();

echo "Found " . $questions->count() . " questions:\n";

foreach ($questions as $question) {
    echo "- Question: " . $question->question_text . "\n";
    echo "  Category: " . $question->category->title . " (" . $question->category->process->title . ")\n";
    echo "  Answers: " . $question->repos->count() . "\n";
    $correctAnswer = $question->repos->where('is_correct', true)->first();
    if ($correctAnswer) {
        echo "  Correct: " . $correctAnswer->answer_text . "\n";
    }
    echo "\n";
}

echo "API structure test passed!\n";
