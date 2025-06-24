<?php
require_once 'vendor/autoload.php';

// Simple test to debug the edit functionality
echo "<h1>Test Edit Functionality Debug</h1>";

// Test 1: Check if the route exists
echo "<h2>1. Testing Route Configuration</h2>";
echo "<p>Admin API route for updating tests should be: <code>/admin/api/tests/{id}</code></p>";

// Test 2: Check database connection and test data
echo "<h2>2. Testing Database Connection</h2>";

try {
    $pdo = new PDO('mysql:host=localhost;dbname=stage_aptiv', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p style='color: green;'>✓ Database connection successful</p>";
    
    // Check if tests table exists and has data
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM tests");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<p>Total tests in database: <strong>" . $result['count'] . "</strong></p>";
    
    if ($result['count'] > 0) {
        // Get a sample test
        $stmt = $pdo->query("SELECT * FROM tests LIMIT 1");
        $test = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "<h3>Sample Test Data:</h3>";
        echo "<pre>" . print_r($test, true) . "</pre>";
    }
    
} catch (PDOException $e) {
    echo "<p style='color: red;'>✗ Database connection failed: " . $e->getMessage() . "</p>";
}

// Test 3: Check if Laravel application is working
echo "<h2>3. Testing Laravel Application</h2>";

// Simple curl test to the API endpoint (if Laravel server is running)
if (function_exists('curl_init')) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://localhost:8000/admin/api/tests');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($httpCode === 200 || $httpCode === 302) {
        echo "<p style='color: green;'>✓ Laravel application is responding (HTTP $httpCode)</p>";
    } else {
        echo "<p style='color: orange;'>⚠ Laravel application response (HTTP $httpCode) - May need authentication</p>";
    }
} else {
    echo "<p>cURL not available for testing Laravel application</p>";
}

echo "<h2>4. JavaScript Console Check</h2>";
echo "<p>Make sure to check the browser console for JavaScript errors when testing the edit functionality.</p>";
echo "<p>Look for these messages:</p>";
echo "<ul>";
echo "<li>'Saving test changes:' - Confirms form submission</li>";
echo "<li>'CSRF Token found: Yes' - Confirms CSRF token is present</li>";
echo "<li>'Response status:' - Shows HTTP response code</li>";
echo "<li>'Response data:' - Shows server response</li>";
echo "</ul>";

echo "<h2>5. Expected Workflow</h2>";
echo "<ol>";
echo "<li>Click Edit button on a test</li>";
echo "<li>Modal opens with edit form</li>";
echo "<li>Change score or description</li>";
echo "<li>Click 'Sauvegarder' button</li>";
echo "<li>Check browser console for debug messages</li>";
echo "<li>Verify data is updated in the database</li>";
echo "</ol>";

?>
