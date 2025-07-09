<?php
require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\test;

try {
    echo "Testing updated API data structure:\n\n";
    
    // Test the updated query with relationships
    $tests = test::with(['user', 'formateur', 'process', 'category', 'quzs.category.process'])->first();
    
    if ($tests) {
        echo "Test ID: {$tests->id}\n";
        echo "User: " . ($tests->user ? $tests->user->name . ' ' . $tests->user->last_name : 'None') . "\n";
        echo "Formateur: " . ($tests->formateur ? $tests->formateur->name . ' ' . $tests->formateur->last_name : 'None') . "\n";
        
        // Check direct relationships
        echo "Direct Process: " . ($tests->process ? $tests->process->title : 'None') . "\n";
        echo "Direct Category: " . ($tests->category ? $tests->category->title : 'None') . "\n";
        
        // Check questions relationships
        echo "Questions count: " . $tests->quzs->count() . "\n";
        if ($tests->quzs->count() > 0) {
            $firstQuestion = $tests->quzs->first();
            echo "First Question Category: " . ($firstQuestion->category ? $firstQuestion->category->title : 'None') . "\n";
            echo "First Question Process: " . ($firstQuestion->category && $firstQuestion->category->process ? $firstQuestion->category->process->title : 'None') . "\n";
        }
        
        echo "\n✅ API data structure updated successfully!\n";
    } else {
        echo "❌ No tests found in database\n";
    }
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}
?>
