<?php
require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\test;
use App\Models\User;
use App\Models\formateur;
use App\Models\process;
use App\Models\categories;

try {
    echo "Creating sample test data...\n\n";
    
    // Get existing data
    $user = User::first();
    $formateur = formateur::first();
    $process = process::first();
    $category = categories::first();
    
    if (!$user || !$formateur || !$process || !$category) {
        echo "❌ Missing required data. Please ensure users, formateurs, processes, and categories exist.\n";
        echo "User: " . ($user ? "✅" : "❌") . "\n";
        echo "Formateur: " . ($formateur ? "✅" : "❌") . "\n";
        echo "Process: " . ($process ? "✅" : "❌") . "\n";
        echo "Category: " . ($category ? "✅" : "❌") . "\n";
        exit;
    }
    
    // Create sample test
    $sampleTest = test::create([
        'user_id' => $user->id,
        'formateur_id' => $formateur->id,
        'process_id' => $process->id,
        'category_id' => $category->id,
        'description' => 'Test avec nouvelles relations process et category',
        'resultat' => 15,
        'pourcentage' => 75,
        'create_at' => now()->format('Y-m-d')
    ]);
    
    echo "✅ Sample test created with ID: {$sampleTest->id}\n";
    echo "✅ User: {$user->name} {$user->last_name}\n";
    echo "✅ Formateur: {$formateur->name} {$formateur->last_name}\n";
    echo "✅ Process: {$process->title}\n";
    echo "✅ Category: {$category->title}\n";
    echo "✅ Score: {$sampleTest->pourcentage}%\n";
    
    // Test the fetch with relationships
    echo "\nTesting API fetch with relationships...\n";
    $testWithRelations = test::with(['user', 'formateur', 'process', 'category'])->find($sampleTest->id);
    
    if ($testWithRelations) {
        echo "✅ Test loaded with all relationships:\n";
        echo "  - User: " . $testWithRelations->user->name . " " . $testWithRelations->user->last_name . "\n";
        echo "  - Formateur: " . $testWithRelations->formateur->name . " " . $testWithRelations->formateur->last_name . "\n";
        echo "  - Process: " . $testWithRelations->process->title . "\n";
        echo "  - Category: " . $testWithRelations->category->title . "\n";
    }
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}
?>
