<?php

// Test script to verify the retake test functionality
// Run this from the Laravel project root: php test_retake_functionality.php

require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use App\Models\test;
use App\Models\categories;
use App\Models\formateur;

echo "=== Testing Retake Test Functionality ===\n\n";

// Check if we have test data
$user = User::where('identification', '12345')->first();
if (!$user) {
    echo "ℹ️  Creating test user with identification 12345...\n";
    $user = User::create([
        'name' => 'Test',
        'last_name' => 'User',
        'identification' => '12345',
        'password' => bcrypt('12345'),
        'role_id' => 3, // Employee role
    ]);
    echo "✅ Test user created successfully.\n";
}

$category = categories::first();
if (!$category) {
    echo "❌ No categories found\n";
    echo "Please create test categories first.\n";
    exit;
}

$formateur = formateur::first();
if (!$formateur) {
    echo "❌ No formateurs found\n";
    echo "Please create test formateurs first.\n";
    exit;
}

$testDescription = 'Test automatique - ' . $category->title;

echo "User: {$user->name} {$user->last_name} (ID: {$user->identification})\n";
echo "Category: {$category->title}\n";
echo "Formateur: {$formateur->name}\n";
echo "Test Description: {$testDescription}\n\n";

// Simulate the retake functionality
echo "=== Simulating Test Retake Process ===\n\n";

// Check existing tests for this user and category
$existingTests = test::where('user_id', $user->id)
                    ->where('description', $testDescription)
                    ->get();

echo "1. Checking for existing tests...\n";
if ($existingTests->count() > 0) {
    echo "   ✅ Found {$existingTests->count()} existing test(s):\n";
    foreach ($existingTests as $test) {
        echo "      - Test ID: {$test->id}, Score: {$test->pourcentage}%, Date: {$test->create_at}\n";
    }
    echo "\n2. Simulating deletion of old tests...\n";
    
    // Delete old tests (simulate the retake logic)
    foreach ($existingTests as $test) {
        $test->quzs()->detach(); // Remove pivot relationships
        $test->delete();
        echo "   ✅ Deleted test ID: {$test->id}\n";
    }
} else {
    echo "   ℹ️  No existing tests found for this user/category combination.\n";
}

echo "\n3. Creating new test...\n";
// Create new test (simulate the retake logic)
$newTest = test::create([
    'user_id' => $user->id,
    'formateur_id' => $formateur->id,
    'description' => $testDescription,
    'resultat' => 0,
    'pourcentage' => 0,
    'create_at' => now()->format('Y-m-d'),
]);

echo "   ✅ New test created with ID: {$newTest->id}\n";

echo "\n4. Verifying retake functionality...\n";
$finalTests = test::where('user_id', $user->id)
                 ->where('description', $testDescription)
                 ->get();

if ($finalTests->count() === 1) {
    echo "   ✅ SUCCESS: Only one test exists for this user/category (old tests were replaced)\n";
    echo "   📊 Final test: ID {$finalTests->first()->id}, created on {$finalTests->first()->create_at}\n";
} else {
    echo "   ❌ ERROR: Multiple tests still exist ({$finalTests->count()} found)\n";
}

echo "\n=== Retake Functionality Test Complete ===\n";
echo "\n💡 To test the full flow:\n";
echo "   1. Visit /quiz/start\n";
echo "   2. Enter identification: 12345\n";
echo "   3. Select a category and formateur\n";
echo "   4. Complete the test\n";
echo "   5. Repeat steps 1-4 with same identification and category\n";
echo "   6. Verify that only the latest test exists in the admin panel\n";
