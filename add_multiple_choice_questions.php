<?php

require_once 'vendor/autoload.php';

use App\Models\categories;
use App\Models\quz;
use App\Models\repo;

// Initialize Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Adding sample questions with multiple correct answers...\n";

// Get first category
$category = categories::first();

if (!$category) {
    echo "No categories found. Please run the seeders first.\n";
    exit;
}

echo "Adding questions for category: {$category->title}\n";

// Question 1: Multiple correct answers
$question1 = quz::create([
    'question_text' => "Quelles sont les mesures de sécurité importantes dans l'atelier? (Choisissez toutes les bonnes réponses)",
    'categories_id' => $category->id,
]);

$answers1 = [
    ['text' => 'Porter des équipements de protection individuelle', 'correct' => true],
    ['text' => 'Maintenir un espace de travail propre', 'correct' => true],
    ['text' => 'Suivre les procédures de sécurité', 'correct' => true],
    ['text' => 'Ignorer les panneaux de sécurité', 'correct' => false],
];

foreach ($answers1 as $answer) {
    repo::create([
        'answer_text' => $answer['text'],
        'quz_id' => $question1->id,
        'is_correct' => $answer['correct'],
    ]);
}

// Question 2: Single correct answer
$question2 = quz::create([
    'question_text' => "Quelle est la température recommandée pour le soudage?",
    'categories_id' => $category->id,
]);

$answers2 = [
    ['text' => '150°C', 'correct' => false],
    ['text' => '200°C', 'correct' => true],
    ['text' => '300°C', 'correct' => false],
    ['text' => '400°C', 'correct' => false],
];

foreach ($answers2 as $answer) {
    repo::create([
        'answer_text' => $answer['text'],
        'quz_id' => $question2->id,
        'is_correct' => $answer['correct'],
    ]);
}

// Question 3: Multiple correct answers
$question3 = quz::create([
    'question_text' => "Quels outils sont nécessaires pour le contrôle qualité? (Plusieurs réponses possibles)",
    'categories_id' => $category->id,
]);

$answers3 = [
    ['text' => 'Multimètre', 'correct' => true],
    ['text' => 'Calibreur', 'correct' => true],
    ['text' => 'Marteau', 'correct' => false],
    ['text' => 'Loupe', 'correct' => true],
];

foreach ($answers3 as $answer) {
    repo::create([
        'answer_text' => $answer['text'],
        'quz_id' => $question3->id,
        'is_correct' => $answer['correct'],
    ]);
}

echo "Sample questions with multiple correct answers added successfully!\n";
echo "Question 1: 3 correct answers out of 4\n";
echo "Question 2: 1 correct answer out of 4\n";
echo "Question 3: 3 correct answers out of 4\n";
