<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    // Check what roles exist
    echo "=== ROLES TABLE ===\n";
    $roles = DB::table('roles')->get();
    foreach ($roles as $role) {
        echo "ID: {$role->id}, Name: {$role->name}\n";
    }
    
    echo "\n=== USERS WITH INVALID ROLE_IDS ===\n";
    // Check for users with invalid role_ids
    $invalidUsers = DB::table('users')
        ->whereNotIn('role_id', function($query) {
            $query->select('id')->from('roles');
        })
        ->get(['id', 'name', 'last_name', 'role_id']);
    
    if ($invalidUsers->isEmpty()) {
        echo "No users with invalid role_ids found.\n";
    } else {
        echo "Found " . $invalidUsers->count() . " users with invalid role_ids:\n";
        foreach ($invalidUsers as $user) {
            echo "User ID: {$user->id}, Name: {$user->name} {$user->last_name}, Invalid role_id: {$user->role_id}\n";
        }
    }
    
    echo "\n=== ROLE_ID DISTRIBUTION ===\n";
    $roleDistribution = DB::table('users')
        ->select('role_id', DB::raw('COUNT(*) as count'))
        ->groupBy('role_id')
        ->orderBy('role_id')
        ->get();
    
    foreach ($roleDistribution as $dist) {
        $roleExists = DB::table('roles')->where('id', $dist->role_id)->exists();
        $status = $roleExists ? "✓ Valid" : "✗ Invalid";
        echo "role_id: {$dist->role_id}, Count: {$dist->count} {$status}\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
