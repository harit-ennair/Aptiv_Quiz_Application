<?php

require_once 'vendor/autoload.php';

use App\Models\categories;
use App\Models\quz;
use App\Models\repo;

// Initialize Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Adding sample questions...\n";

// Get first few categories
$categories = categories::with('process')->limit(3)->get();

if ($categories->isEmpty()) {
    echo "No categories found. Please run the seeders first.\n";
    exit;
}

foreach ($categories as $category) {
    echo "Adding questions for category: {$category->title}\n";
    
    // Create 2-3 questions per category
    for ($i = 1; $i <= 3; $i++) {
        $question = quz::create([
            'question_text' => "Question {$i} pour {$category->title}: Quelle est la bonne procédure?",
            'categories_id' => $category->id,
        ]);
        
        // Add 4 answers per question
        $answers = [
            ['text' => 'Première option', 'is_correct' => true],
            ['text' => 'Deuxième option', 'is_correct' => false],
            ['text' => 'Troisième option', 'is_correct' => false],
            ['text' => 'Quatrième option', 'is_correct' => false],
        ];
        
        foreach ($answers as $answer) {
            repo::create([
                'answer_text' => $answer['text'],
                'quz_id' => $question->id,
                'is_correct' => $answer['is_correct'],
            ]);
        }
        
        echo "  - Added question {$i} with 4 answers\n";
    }
}

echo "Sample questions added successfully!\n";
