<?php
require_once 'vendor/autoload.php';

// Test image display functionality
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

use App\Models\quz;
use Illuminate\Support\Facades\Storage;

echo "<h2>Testing Image Display Functionality</h2>\n";

try {
    // Get questions with images
    $questionsWithImages = quz::whereNotNull('image_path')->get();
    
    echo "<p>Found " . $questionsWithImages->count() . " questions with images</p>\n";
    
    foreach ($questionsWithImages as $question) {
        echo "<div style='border: 1px solid #ccc; margin: 10px; padding: 10px;'>\n";
        echo "<h3>Question ID: " . $question->id . "</h3>\n";
        echo "<p><strong>Text:</strong> " . htmlspecialchars($question->question_text) . "</p>\n";
        echo "<p><strong>Image Path:</strong> " . $question->image_path . "</p>\n";
        
        // Check if file exists in storage
        $imagePath = storage_path('app/public/questions/' . $question->image_path);
        $exists = file_exists($imagePath);
        
        echo "<p><strong>File exists:</strong> " . ($exists ? 'YES' : 'NO') . "</p>\n";
        
        if ($exists) {
            $fileSize = filesize($imagePath);
            echo "<p><strong>File size:</strong> " . number_format($fileSize) . " bytes</p>\n";
            
            // Display the image
            $assetUrl = asset('storage/questions/' . $question->image_path);
            echo "<p><strong>Asset URL:</strong> " . $assetUrl . "</p>\n";
            echo "<img src='" . $assetUrl . "' alt='Question Image' style='max-width: 300px; max-height: 200px; object-fit: contain; border: 1px solid #ddd;'>\n";
        } else {
            echo "<p style='color: red;'><strong>ERROR:</strong> Image file not found at: " . $imagePath . "</p>\n";
            
            // Check alternative paths
            $altPath1 = storage_path('app/public/' . $question->image_path);
            $altPath2 = public_path('storage/' . $question->image_path);
            echo "<p><strong>Alternative path 1:</strong> " . $altPath1 . " - " . (file_exists($altPath1) ? 'EXISTS' : 'NOT FOUND') . "</p>\n";
            echo "<p><strong>Alternative path 2:</strong> " . $altPath2 . " - " . (file_exists($altPath2) ? 'EXISTS' : 'NOT FOUND') . "</p>\n";
        }
        
        echo "</div>\n";
    }
    
    // Check storage directory permissions
    $storagePath = storage_path('app/public');
    echo "<h3>Storage Directory Info:</h3>\n";
    echo "<p><strong>Storage path:</strong> " . $storagePath . "</p>\n";
    echo "<p><strong>Directory exists:</strong> " . (is_dir($storagePath) ? 'YES' : 'NO') . "</p>\n";
    echo "<p><strong>Is readable:</strong> " . (is_readable($storagePath) ? 'YES' : 'NO') . "</p>\n";
    echo "<p><strong>Is writable:</strong> " . (is_writable($storagePath) ? 'YES' : 'NO') . "</p>\n";
    
    // Check questions directory
    $questionsPath = storage_path('app/public/questions');
    echo "<p><strong>Questions directory:</strong> " . $questionsPath . "</p>\n";
    echo "<p><strong>Directory exists:</strong> " . (is_dir($questionsPath) ? 'YES' : 'NO') . "</p>\n";
    
    // Check public storage link
    $publicStoragePath = public_path('storage');
    echo "<p><strong>Public storage link:</strong> " . $publicStoragePath . "</p>\n";
    echo "<p><strong>Link exists:</strong> " . (file_exists($publicStoragePath) ? 'YES' : 'NO') . "</p>\n";
    echo "<p><strong>Is link:</strong> " . (is_link($publicStoragePath) ? 'YES' : 'NO') . "</p>\n";
    
} catch (Exception $e) {
    echo "<p style='color: red;'><strong>ERROR:</strong> " . $e->getMessage() . "</p>\n";
}
?>
