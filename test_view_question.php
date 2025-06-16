<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Testing question view functionality...\n";

// Get a question with all relationships
$question = App\Models\quz::with(['category.process', 'repos'])->first();

if ($question) {
    echo "Question found: " . $question->question_text . "\n";
    echo "Category: " . ($question->category ? $question->category->title : 'No category') . "\n";
    echo "Process: " . ($question->category && $question->category->process ? $question->category->process->title : 'No process') . "\n";
    echo "Answers: " . $question->repos->count() . "\n";
    
    // Show the data structure as it would be returned by the API
    $apiResponse = [
        'success' => true,
        'data' => $question->load(['category.process', 'repos'])
    ];
    
    echo "\nAPI Response structure:\n";
    echo json_encode($apiResponse, JSON_PRETTY_PRINT);
} else {
    echo "No questions found in database!\n";
}
