<?php
// Simple image path check
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stage_aptiv";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<h2>Questions with Images</h2>\n";
    
    $stmt = $pdo->prepare("SELECT id, question_text, image_path FROM quzs WHERE image_path IS NOT NULL AND image_path != ''");
    $stmt->execute();
    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<p>Found " . count($questions) . " questions with images</p>\n";
    
    foreach ($questions as $question) {
        echo "<div style='border: 1px solid #ccc; margin: 10px; padding: 10px;'>\n";
        echo "<h3>Question ID: " . $question['id'] . "</h3>\n";
        echo "<p><strong>Text:</strong> " . htmlspecialchars($question['question_text']) . "</p>\n";
        echo "<p><strong>Image Path:</strong> " . $question['image_path'] . "</p>\n";
        
        // Check file paths
        $imagePath1 = __DIR__ . '/storage/app/public/questions/' . $question['image_path'];
        $imagePath2 = __DIR__ . '/public/storage/questions/' . $question['image_path'];
        $imagePath3 = __DIR__ . '/storage/app/public/' . $question['image_path'];
        
        echo "<p><strong>Path 1:</strong> " . $imagePath1 . " - " . (file_exists($imagePath1) ? 'EXISTS' : 'NOT FOUND') . "</p>\n";
        echo "<p><strong>Path 2:</strong> " . $imagePath2 . " - " . (file_exists($imagePath2) ? 'EXISTS' : 'NOT FOUND') . "</p>\n";
        echo "<p><strong>Path 3:</strong> " . $imagePath3 . " - " . (file_exists($imagePath3) ? 'EXISTS' : 'NOT FOUND') . "</p>\n";
        
        // Display the image if found
        if (file_exists($imagePath2)) {
            $webPath = 'public/storage/questions/' . $question['image_path'];
            echo "<img src='" . $webPath . "' alt='Question Image' style='max-width: 300px; max-height: 200px; object-fit: contain; border: 1px solid #ddd;'>\n";
        }
        
        echo "</div>\n";
    }
    
    // Check directory structure
    echo "<h3>Directory Structure:</h3>\n";
    $dirs = [
        'storage/app/public',
        'storage/app/public/questions',
        'public/storage',
        'public/storage/questions'
    ];
    
    foreach ($dirs as $dir) {
        $fullPath = __DIR__ . '/' . $dir;
        echo "<p><strong>$dir:</strong> " . (is_dir($fullPath) ? 'EXISTS' : 'NOT FOUND') . "</p>\n";
        
        if (is_dir($fullPath)) {
            $files = scandir($fullPath);
            $fileCount = count($files) - 2; // Remove . and ..
            echo "<p>&nbsp;&nbsp;Files: $fileCount</p>\n";
        }
    }
    
} catch(PDOException $e) {
    echo "<p style='color: red;'><strong>ERROR:</strong> " . $e->getMessage() . "</p>\n";
}
?>
