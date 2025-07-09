<?php
require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\test;
use App\Models\process;
use App\Models\categories;

try {
    echo "Testing Model Relationships:\n\n";
    
    // Test process model
    $process = process::first();
    if ($process) {
        echo "Process: {$process->title}\n";
        echo "Categories count: " . $process->categories->count() . "\n";
        echo "Tests count: " . $process->tests->count() . "\n\n";
    }
    
    // Test category model
    $category = categories::first();
    if ($category) {
        echo "Category: {$category->title}\n";
        echo "Process: " . ($category->process ? $category->process->title : 'None') . "\n";
        echo "Tests count: " . $category->tests->count() . "\n\n";
    }
    
    // Test test model
    $test = test::first();
    if ($test) {
        echo "Test ID: {$test->id}\n";
        echo "User: " . ($test->user ? $test->user->name : 'None') . "\n";
        echo "Formateur: " . ($test->formateur ? $test->formateur->name : 'None') . "\n";
        echo "Process: " . ($test->process ? $test->process->title : 'None') . "\n";
        echo "Category: " . ($test->category ? $test->category->title : 'None') . "\n";
    }
    
    echo "\n✅ All relationships working correctly!\n";
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}
?>
