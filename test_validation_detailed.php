<?php
require_once 'vendor/autoload.php';

// Test spécifique pour la validation des images
echo "=== Test de validation spécifique ===\n\n";

$baseUrl = 'http://127.0.0.1:8000/api/test';

function sendRequest($url, $method = 'GET', $data = null, $headers = []) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false); // Ne pas suivre les redirections
    
    if ($data) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $headers[] = 'Content-Type: application/json';
    }
    
    if (!empty($headers)) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $redirectUrl = curl_getinfo($ch, CURLINFO_REDIRECT_URL);
    curl_close($ch);
    
    return [
        'code' => $httpCode, 
        'response' => json_decode($response, true),
        'redirect_url' => $redirectUrl,
        'raw_response' => $response
    ];
}

// Test 1: Question valide avec texte seulement
echo "1. Test question valide avec texte seulement:\n";
$validData = [
    'question_text' => 'Test question avec texte seulement',
    'categories_id' => 1,
    'answers' => [
        ['answer_text' => 'Réponse A', 'is_correct' => true],
        ['answer_text' => 'Réponse B', 'is_correct' => false]
    ]
];

$result = sendRequest($baseUrl . '/questions', 'POST', $validData);
echo "Status: " . $result['code'] . "\n";
if ($result['response']) {
    echo "Success: " . ($result['response']['success'] ? 'true' : 'false') . "\n";
    echo "Message: " . ($result['response']['message'] ?? 'N/A') . "\n";
} else {
    echo "Raw response: " . substr($result['raw_response'], 0, 200) . "...\n";
}
echo "\n";

// Test 2: Question invalide sans texte ni image
echo "2. Test question invalide - sans texte ni image:\n";
$invalidData = [
    'categories_id' => 1,
    'answers' => [
        ['answer_text' => 'Réponse A', 'is_correct' => true],
        ['answer_text' => 'Réponse B', 'is_correct' => false]
    ]
];

$result = sendRequest($baseUrl . '/questions', 'POST', $invalidData);
echo "Status: " . $result['code'] . "\n";
if ($result['code'] == 302) {
    echo "Redirection vers: " . ($result['redirect_url'] ?? 'N/A') . "\n";
}
if ($result['response']) {
    echo "Response: " . json_encode($result['response'], JSON_PRETTY_PRINT) . "\n";
} else {
    echo "Raw response: " . substr($result['raw_response'], 0, 200) . "...\n";
}
echo "\n";

// Test 3: Question sans réponse correcte
echo "3. Test question sans réponse correcte (doit échouer):\n";
$noCorrectAnswer = [
    'question_text' => 'Question test',
    'categories_id' => 1,
    'answers' => [
        ['answer_text' => 'Réponse A', 'is_correct' => false],
        ['answer_text' => 'Réponse B', 'is_correct' => false]
    ]
];

$result = sendRequest($baseUrl . '/questions', 'POST', $noCorrectAnswer);
echo "Status: " . $result['code'] . "\n";
if ($result['response']) {
    echo "Success: " . ($result['response']['success'] ? 'true' : 'false') . "\n";
    echo "Message: " . ($result['response']['message'] ?? 'N/A') . "\n";
} else {
    echo "Raw response: " . substr($result['raw_response'], 0, 200) . "...\n";
}
echo "\n";

// Test 4: Question avec plusieurs réponses correctes
echo "4. Test question avec plusieurs réponses correctes (doit échouer):\n";
$multipleCorrect = [
    'question_text' => 'Question test',
    'categories_id' => 1,
    'answers' => [
        ['answer_text' => 'Réponse A', 'is_correct' => true],
        ['answer_text' => 'Réponse B', 'is_correct' => true]
    ]
];

$result = sendRequest($baseUrl . '/questions', 'POST', $multipleCorrect);
echo "Status: " . $result['code'] . "\n";
if ($result['response']) {
    echo "Success: " . ($result['response']['success'] ? 'true' : 'false') . "\n";
    echo "Message: " . ($result['response']['message'] ?? 'N/A') . "\n";
} else {
    echo "Raw response: " . substr($result['raw_response'], 0, 200) . "...\n";
}

echo "\n=== Test de validation terminé ===\n";
?>
