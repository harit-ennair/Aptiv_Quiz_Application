<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\quz;
use App\Models\repo;
use App\Models\categories;

// Test data counts
echo "=== Database Statistics ===\n";
echo "Total questions: " . quz::count() . "\n";
echo "Total answers: " . repo::count() . "\n";
echo "Total categories: " . categories::count() . "\n\n";

// Test a sample question with answers
echo "=== Sample Question with Answers ===\n";
$question = quz::with('repos')->first();
if ($question) {
    echo "Question: " . $question->question_text . "\n";
    echo "Number of answers: " . $question->repos->count() . "\n";
    echo "Answers:\n";
    foreach($question->repos as $answer) {
        echo "- " . $answer->answer_text . " (" . ($answer->is_correct ? 'Correct' : 'Incorrect') . ")\n";
    }
}

// Test category distribution
echo "\n=== Questions by Category ===\n";
$categories = categories::all();
foreach($categories as $category) {
    $questionCount = quz::where('categories_id', $category->id)->count();
    if ($questionCount > 0) {
        echo $category->title . ": " . $questionCount . " questions\n";
    }
}

echo "\n=== Quiz System Setup Complete! ===\n";
