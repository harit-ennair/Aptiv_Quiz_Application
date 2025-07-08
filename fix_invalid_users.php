<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    // Delete users with invalid role_ids
    $deletedCount = DB::table('users')->where('role_id', 99999)->delete();
    echo "Deleted {$deletedCount} users with invalid role_id 99999\n";
    
    // Verify no more invalid users exist
    $invalidUsers = DB::table('users')
        ->whereNotIn('role_id', function($query) {
            $query->select('id')->from('roles');
        })
        ->count();
    
    if ($invalidUsers == 0) {
        echo "✓ All users now have valid role_ids\n";
    } else {
        echo "✗ Still {$invalidUsers} users with invalid role_ids\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
