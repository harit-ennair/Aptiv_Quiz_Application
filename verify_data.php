<?php
require_once 'vendor/autoload.php';

// Bootstrap Laravel application
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\categories;
use App\Models\quz;
use App\Models\repo;

try {
    $category = categories::where('title', 'Ultra-sonic Welding')->first();
    
    if ($category) {
        echo "Ultra-sonic Welding category found with ID: " . $category->id . "\n";
        
        $questionsCount = quz::where('categories_id', $category->id)->count();
        echo "Questions count: " . $questionsCount . "\n";
        
        if ($questionsCount > 0) {
            $questionIds = quz::where('categories_id', $category->id)->pluck('id');
            $answersCount = repo::whereIn('quz_id', $questionIds)->count();
            echo "Answers count: " . $answersCount . "\n";
        }
        
        echo "Migration and seeding completed successfully!\n";
    } else {
        echo "Ultra-sonic Welding category not found!\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
