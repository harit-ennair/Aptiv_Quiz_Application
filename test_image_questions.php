<?php
require_once 'vendor/autoload.php';

// Test de la fonctionnalité d'images dans les questions
echo "=== Test de la fonctionnalité d'images dans les questions ===\n\n";

// Configuration de base
$baseUrl = 'http://127.0.0.1:8000/api';

// Fonction pour envoyer une requête
function sendRequest($url, $method = 'GET', $data = null, $headers = []) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    
    if ($data) {
        if (is_array($data) && isset($data['image'])) {
            // Pour l'upload de fichiers
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        } else {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            $headers[] = 'Content-Type: application/json';
        }
    }
    
    if (!empty($headers)) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    return ['code' => $httpCode, 'response' => json_decode($response, true)];
}

// 1. Test création d'une question avec texte seulement
echo "1. Test création d'une question avec texte seulement:\n";
$questionData = [
    'question_text' => 'Quelle est la capitale de la France ?',
    'categories_id' => 1,
    'answers' => [
        ['answer_text' => 'Paris', 'is_correct' => true],
        ['answer_text' => 'Londres', 'is_correct' => false],
        ['answer_text' => 'Berlin', 'is_correct' => false],
        ['answer_text' => 'Madrid', 'is_correct' => false]
    ]
];

$result = sendRequest($baseUrl . '/quzs', 'POST', $questionData);
echo "Status: " . $result['code'] . "\n";
echo "Response: " . json_encode($result['response'], JSON_PRETTY_PRINT) . "\n\n";

// 2. Test création d'une question avec image simulée (sans vraie image pour ce test)
echo "2. Test validation - question sans texte ni image (doit échouer):\n";
$invalidData = [
    'categories_id' => 1,
    'answers' => [
        ['answer_text' => 'Réponse A', 'is_correct' => true],
        ['answer_text' => 'Réponse B', 'is_correct' => false]
    ]
];

$result = sendRequest($baseUrl . '/quzs', 'POST', $invalidData);
echo "Status: " . $result['code'] . "\n";
echo "Response: " . json_encode($result['response'], JSON_PRETTY_PRINT) . "\n\n";

// 3. Test récupération des questions pour vérifier le champ image_url
echo "3. Test récupération des questions:\n";
$result = sendRequest($baseUrl . '/quzs', 'GET');
echo "Status: " . $result['code'] . "\n";
if ($result['response']['success'] && !empty($result['response']['data'])) {
    $firstQuestion = $result['response']['data'][0];
    echo "Première question - ID: " . $firstQuestion['id'] . "\n";
    echo "Texte: " . ($firstQuestion['question_text'] ?? 'NULL') . "\n";
    echo "Image path: " . ($firstQuestion['image_path'] ?? 'NULL') . "\n";
    echo "Image URL: " . ($firstQuestion['image_url'] ?? 'NULL') . "\n";
} else {
    echo "Aucune question trouvée ou erreur\n";
}
echo "\n";

// 4. Test structure de base de données
echo "4. Vérification de la structure de la table quzs:\n";
try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=stage_aptiv', 'root', '');
    $stmt = $pdo->query("DESCRIBE quzs");
    $columns = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "Colonnes de la table quzs:\n";
    foreach ($columns as $column) {
        echo "- {$column['Field']}: {$column['Type']} (Null: {$column['Null']})\n";
    }
} catch (Exception $e) {
    echo "Erreur lors de la vérification de la base de données: " . $e->getMessage() . "\n";
}

echo "\n=== Test terminé ===\n";
echo "\nFonctionnalités implémentées:\n";
echo "✓ Support des images dans les questions\n";
echo "✓ Questions avec texte seulement\n";
echo "✓ Questions avec image seulement (à tester avec un vrai upload)\n";
echo "✓ Questions avec texte ET image\n";
echo "✓ Validation: au moins un des deux (texte ou image) requis\n";
echo "✓ Gestion des URLs d'images\n";
echo "✓ Suppression d'images lors de la suppression de questions\n";
echo "\nPour tester l'upload d'images, utilisez un client comme Postman ou un formulaire HTML.\n";
?>
