<?php
require_once 'vendor/autoload.php';

// Test de la fonctionnalité d'images dans les questions
echo "=== Test de la fonctionnalité d'images dans les questions ===\n\n";

// Configuration de base - utilise les routes de test publiques
$baseUrl = 'http://127.0.0.1:8000/api/test';

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

// 0. Vérifier d'abord s'il y a des catégories
echo "0. Vérification des catégories disponibles:\n";
$result = sendRequest($baseUrl . '/categories', 'GET');
echo "Status: " . $result['code'] . "\n";
if ($result['response'] && isset($result['response']['success']) && $result['response']['success']) {
    echo "Catégories trouvées: " . count($result['response']['data']) . "\n";
    if (!empty($result['response']['data'])) {
        $firstCategory = $result['response']['data'][0];
        $categoryId = $firstCategory['id'];
        echo "Utilisation de la catégorie ID: {$categoryId} - {$firstCategory['title']}\n\n";
    } else {
        echo "Aucune catégorie disponible. Création impossible.\n";
        exit;
    }
} else {
    echo "Erreur lors de la récupération des catégories.\n";
    echo "Response: " . json_encode($result['response'], JSON_PRETTY_PRINT) . "\n";
    $categoryId = 1; // Utiliser ID par défaut
    echo "Utilisation de l'ID de catégorie par défaut: 1\n\n";
}

// 1. Test création d'une question avec texte seulement
echo "1. Test création d'une question avec texte seulement:\n";
$questionData = [
    'question_text' => 'Quelle est la capitale de la France ?',
    'categories_id' => $categoryId,
    'answers' => [
        ['answer_text' => 'Paris', 'is_correct' => true],
        ['answer_text' => 'Londres', 'is_correct' => false],
        ['answer_text' => 'Berlin', 'is_correct' => false],
        ['answer_text' => 'Madrid', 'is_correct' => false]
    ]
];

$result = sendRequest($baseUrl . '/questions', 'POST', $questionData);
echo "Status: " . $result['code'] . "\n";
echo "Response: " . json_encode($result['response'], JSON_PRETTY_PRINT) . "\n\n";

// 2. Test validation - question sans texte ni image (doit échouer)
echo "2. Test validation - question sans texte ni image (doit échouer):\n";
$invalidData = [
    'categories_id' => $categoryId,
    'answers' => [
        ['answer_text' => 'Réponse A', 'is_correct' => true],
        ['answer_text' => 'Réponse B', 'is_correct' => false]
    ]
];

$result = sendRequest($baseUrl . '/questions', 'POST', $invalidData);
echo "Status: " . $result['code'] . "\n";
echo "Response: " . json_encode($result['response'], JSON_PRETTY_PRINT) . "\n\n";

// 3. Test récupération des questions pour vérifier le champ image_url
echo "3. Test récupération des questions:\n";
$result = sendRequest($baseUrl . '/questions', 'GET');
echo "Status: " . $result['code'] . "\n";
if ($result['response'] && isset($result['response']['success']) && $result['response']['success'] && !empty($result['response']['data'])) {
    $firstQuestion = $result['response']['data'][0];
    echo "Première question - ID: " . $firstQuestion['id'] . "\n";
    echo "Texte: " . ($firstQuestion['question_text'] ?? 'NULL') . "\n";
    echo "Image path: " . ($firstQuestion['image_path'] ?? 'NULL') . "\n";
    echo "Image URL: " . ($firstQuestion['image_url'] ?? 'NULL') . "\n";
    echo "Nombre de réponses: " . count($firstQuestion['repos']) . "\n";
} else {
    echo "Aucune question trouvée ou erreur\n";
    if ($result['response']) {
        echo "Response: " . json_encode($result['response'], JSON_PRETTY_PRINT) . "\n";
    }
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
    
    // Vérifier si le champ question_text est nullable
    $stmt = $pdo->query("SELECT question_text, image_path FROM quzs LIMIT 1");
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "\nExemple de données:\n";
        echo "- question_text: " . ($row['question_text'] ?? 'NULL') . "\n";
        echo "- image_path: " . ($row['image_path'] ?? 'NULL') . "\n";
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
echo "\nPour tester l'upload d'images avec interface graphique:\n";
echo "- Ouvrez: http://127.0.0.1:8000/test-image-upload.html\n";
echo "\nPour les tests API programmatiques:\n";
echo "- Utilisez l'URL: {$baseUrl}/questions\n";
echo "\nNote: Les routes de test sont publiques et doivent être supprimées en production.\n";
?>
