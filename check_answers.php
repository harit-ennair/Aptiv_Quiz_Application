<?php

require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\repo;
use App\Models\quz;

echo "=== Sample Answers in Database ===\n";
$answers = repo::with('quz.category')->take(15)->get();

foreach($answers as $answer) {
    echo "Category: " . ($answer->quz->category->title ?? 'Unknown') . "\n";
    echo "Question: " . substr($answer->quz->question_text, 0, 50) . "...\n";
    echo "Answer: " . $answer->answer_text . "\n";
    echo "Correct: " . ($answer->is_correct ? 'Yes' : 'No') . "\n";
    echo "---\n";
}
