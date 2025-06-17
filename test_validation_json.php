<?php
require_once 'vendor/autoload.php';

// Test avec headers JSON appropriés
echo "=== Test de validation avec headers JSON ===\n\n";

$baseUrl = 'http://127.0.0.1:8000/api/test';

function sendRequest($url, $method = 'GET', $data = null, $forceJson = true) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    
    $headers = [];
    if ($forceJson) {
        $headers[] = 'Accept: application/json';
        $headers[] = 'X-Requested-With: XMLHttpRequest';
    }
    
    if ($data) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $headers[] = 'Content-Type: application/json';
    }
    
    if (!empty($headers)) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    return [
        'code' => $httpCode, 
        'response' => json_decode($response, true),
        'raw_response' => $response
    ];
}

// Test de validation: question sans texte ni image
echo "1. Test validation - question sans texte ni image (avec headers JSON):\n";
$invalidData = [
    'categories_id' => 1,
    'answers' => [
        ['answer_text' => 'Réponse A', 'is_correct' => true],
        ['answer_text' => 'Réponse B', 'is_correct' => false]
    ]
];

$result = sendRequest($baseUrl . '/questions', 'POST', $invalidData, true);
echo "Status: " . $result['code'] . "\n";
if ($result['response']) {
    echo "Response: " . json_encode($result['response'], JSON_PRETTY_PRINT) . "\n";
} else {
    echo "Raw response (premiers 300 chars): " . substr($result['raw_response'], 0, 300) . "...\n";
}
echo "\n";

// Test de création valide d'une question avec image simulée
echo "2. Test création question avec image simulée (texte vide, image présente):\n";
$imageOnlyData = [
    'question_text' => '', // Texte vide
    'categories_id' => 1,
    'answers' => [
        ['answer_text' => 'Réponse A', 'is_correct' => true],
        ['answer_text' => 'Réponse B', 'is_correct' => false]
    ]
];

// Pour simuler une image, nous ajoutons un champ image dans les données
// En réalité, ceci ne fonctionnera pas pour un vrai upload, mais teste la logique
$result = sendRequest($baseUrl . '/questions', 'POST', $imageOnlyData, true);
echo "Status: " . $result['code'] . "\n";
if ($result['response']) {
    echo "Response: " . json_encode($result['response'], JSON_PRETTY_PRINT) . "\n";
} else {
    echo "Raw response (premiers 300 chars): " . substr($result['raw_response'], 0, 300) . "...\n";
}
echo "\n";

// Test de création valide d'une question avec texte seulement
echo "3. Test création question avec texte seulement:\n";
$textOnlyData = [
    'question_text' => 'Question avec texte seulement - test de validation',
    'categories_id' => 1,
    'answers' => [
        ['answer_text' => 'Réponse correcte', 'is_correct' => true],
        ['answer_text' => 'Réponse incorrecte', 'is_correct' => false]
    ]
];

$result = sendRequest($baseUrl . '/questions', 'POST', $textOnlyData, true);
echo "Status: " . $result['code'] . "\n";
if ($result['response']) {
    echo "Success: " . ($result['response']['success'] ? 'true' : 'false') . "\n";
    echo "Message: " . ($result['response']['message'] ?? 'N/A') . "\n";
    if (isset($result['response']['data'])) {
        echo "Question ID: " . $result['response']['data']['id'] . "\n";
        echo "Question Text: " . $result['response']['data']['question_text'] . "\n";
        echo "Image Path: " . ($result['response']['data']['image_path'] ?? 'NULL') . "\n";
        echo "Image URL: " . ($result['response']['data']['image_url'] ?? 'NULL') . "\n";
    }
}

echo "\n=== Test terminé ===\n";
echo "\nRésultats attendus:\n";
echo "- Test 1: Devrait échouer (422) car ni texte ni image fournis\n";
echo "- Test 2: Devrait échouer (422) car texte vide et pas d'image réelle\n";
echo "- Test 3: Devrait réussir (200) car texte fourni\n";
?>
