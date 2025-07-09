<?php
// Simple PHP test for the API endpoint
$url = 'http://localhost:8000/admin/api/tests';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: application/json',
    'Content-Type: application/json'
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "HTTP Code: $httpCode\n";
echo "Response:\n";

if ($response) {
    $data = json_decode($response, true);
    if ($data) {
        echo "✅ JSON Response received\n";
        echo "Success: " . ($data['success'] ? 'true' : 'false') . "\n";
        echo "Data count: " . count($data['data'] ?? []) . "\n";
        
        if (isset($data['data'][0])) {
            $firstTest = $data['data'][0];
            echo "\nFirst test data:\n";
            echo "- ID: " . ($firstTest['id'] ?? 'N/A') . "\n";
            echo "- User: " . ($firstTest['user']['name'] ?? 'N/A') . " " . ($firstTest['user']['last_name'] ?? '') . "\n";
            echo "- Category Name: " . ($firstTest['category_name'] ?? 'N/A') . "\n";
            echo "- Process Name: " . ($firstTest['process_name'] ?? 'N/A') . "\n";
            echo "- Formateur: " . ($firstTest['formateur']['name'] ?? 'N/A') . " " . ($firstTest['formateur']['last_name'] ?? '') . "\n";
            echo "- Score: " . ($firstTest['pourcentage'] ?? 'N/A') . "%\n";
        }
    } else {
        echo "❌ Invalid JSON response\n";
        echo $response;
    }
} else {
    echo "❌ No response received\n";
}
?>
