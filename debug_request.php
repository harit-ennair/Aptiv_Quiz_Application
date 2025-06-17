<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Testing question creation with image functionality...\n";

// Test what data structure we're expecting
$sampleData = [
    'question_text' => 'Test question with image',
    'categories_id' => 1,
    'answers' => [
        ['answer_text' => 'Answer 1', 'is_correct' => true],
        ['answer_text' => 'Answer 2', 'is_correct' => false],
    ]
];

echo "Sample data structure:\n";
print_r($sampleData);

// Test validation
$validator = \Illuminate\Support\Facades\Validator::make($sampleData, [
    'question_text' => 'nullable|string|max:1000|required_without:image',
    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|required_without:question_text',
    'categories_id' => 'required|exists:categories,id',
    'answers' => 'required|array|min:2|max:6',
    'answers.*.answer_text' => 'required|string|max:500',
    'answers.*.is_correct' => 'boolean',
]);

if ($validator->fails()) {
    echo "Validation failed:\n";
    print_r($validator->errors()->toArray());
} else {
    echo "Validation passed!\n";
}

echo "\nDone.\n";
