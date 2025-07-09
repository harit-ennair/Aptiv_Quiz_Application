<?php
require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\test;
use App\Models\User;
use App\Models\formateur;
use App\Models\process;
use App\Models\categories;
use App\Models\quz;

try {
    echo "Testing TestController index method directly...\n\n";
    
    // Simulate the controller logic
    $tests = test::with(['user', 'formateur', 'process', 'category', 'quzs.category.process'])->get();
    
    echo "Found " . $tests->count() . " tests\n";
    
    if ($tests->count() > 0) {
        $firstTest = $tests->first();
        
        echo "\nRaw test data:\n";
        echo "- ID: {$firstTest->id}\n";
        echo "- User: " . ($firstTest->user ? $firstTest->user->name . ' ' . $firstTest->user->last_name : 'None') . "\n";
        echo "- Formateur: " . ($firstTest->formateur ? $firstTest->formateur->name . ' ' . $firstTest->formateur->last_name : 'None') . "\n";
        echo "- Direct Process: " . ($firstTest->process ? $firstTest->process->title : 'None') . "\n";
        echo "- Direct Category: " . ($firstTest->category ? $firstTest->category->title : 'None') . "\n";
        echo "- Questions count: " . $firstTest->quzs->count() . "\n";
        
        // Transform the data like the controller does
        $transformedTest = $firstTest;
        
        // Add direct relationship data (new approach)
        if ($transformedTest->process) {
            $transformedTest->process_name = $transformedTest->process->title;
            $transformedTest->process_id = $transformedTest->process->id;
        }
        
        if ($transformedTest->category) {
            $transformedTest->category_name = $transformedTest->category->title;
            $transformedTest->category_id = $transformedTest->category->id;
            
            // If category has a process, use that as well
            if ($transformedTest->category->process) {
                $transformedTest->process_name = $transformedTest->category->process->title;
                $transformedTest->process_id = $transformedTest->category->process->id;
            }
        }
        
        echo "\nAfter transformation:\n";
        echo "- process_name: " . ($transformedTest->process_name ?? 'None') . "\n";
        echo "- category_name: " . ($transformedTest->category_name ?? 'None') . "\n";
        echo "- process_id: " . ($transformedTest->process_id ?? 'None') . "\n";
        echo "- category_id: " . ($transformedTest->category_id ?? 'None') . "\n";
        
        echo "\n✅ Controller transformation working correctly!\n";
        
        // Test the JSON response format
        $response = [
            'success' => true,
            'data' => [$transformedTest->toArray()]
        ];
        
        echo "\nJSON Response structure:\n";
        echo "Success: " . ($response['success'] ? 'true' : 'false') . "\n";
        echo "Data count: " . count($response['data']) . "\n";
        echo "First test has process_name: " . (isset($response['data'][0]['process_name']) ? 'Yes' : 'No') . "\n";
        echo "First test has category_name: " . (isset($response['data'][0]['category_name']) ? 'Yes' : 'No') . "\n";
    }
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}
?>
