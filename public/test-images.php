<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Images Display</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        .question-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .question-image {
            max-width: 100%;
            height: auto;
            max-height: 300px;
            object-fit: contain;
            border: 1px solid #ddd;
            border-radius: 4px;
            display: block;
            margin: 10px auto;
        }
        .error-message {
            color: red;
            font-style: italic;
            text-align: center;
            padding: 20px;
            background: #fee;
            border: 1px solid #fcc;
            border-radius: 4px;
        }
        .success-message {
            color: green;
            text-align: center;
            padding: 10px;
            background: #efe;
            border: 1px solid #cfc;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <h1>Image Display Test</h1>
    
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "stage_aptiv";

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $pdo->prepare("SELECT id, question_text, image_path FROM quzs WHERE image_path IS NOT NULL AND image_path != '' LIMIT 5");
        $stmt->execute();
        $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<div class='success-message'>Found " . count($questions) . " questions with images</div>";
        
        foreach ($questions as $question) {
            echo "<div class='question-card'>";
            echo "<h3>Question " . $question['id'] . "</h3>";
            echo "<p><strong>Text:</strong> " . htmlspecialchars($question['question_text']) . "</p>";
            echo "<p><strong>Image Path:</strong> " . $question['image_path'] . "</p>";
            
            // Handle different image path formats
            $imagePath = $question['image_path'];
            if (strpos($imagePath, 'images/') === 0) {
                // Full path starting with images/
                $assetPath = 'storage/' . $imagePath;
            } else {
                // Just filename - should be in questions folder
                $assetPath = 'storage/questions/' . $imagePath;
            }
            
            echo "<p><strong>Asset Path:</strong> " . $assetPath . "</p>";
            echo "<img src='" . $assetPath . "' alt='Question Image' class='question-image' 
                       onerror=\"this.style.display='none'; this.nextElementSibling.style.display='block';\">";
            echo "<div style='display: none;' class='error-message'>Image could not be loaded</div>";
            echo "</div>";
        }
        
    } catch(PDOException $e) {
        echo "<div class='error-message'>Database Error: " . $e->getMessage() . "</div>";
    }
    ?>
    
    <script>
        // Log any image loading errors
        document.querySelectorAll('.question-image').forEach(img => {
            img.addEventListener('load', function() {
                console.log('Image loaded successfully:', this.src);
            });
            
            img.addEventListener('error', function() {
                console.error('Failed to load image:', this.src);
            });
        });
    </script>
</body>
</html>
