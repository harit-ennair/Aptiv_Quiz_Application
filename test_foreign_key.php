<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    // Test database connection
    $pdo = DB::connection()->getPdo();
    echo "✓ Database connected successfully\n";
    
    // Check if roles table exists and has data
    $rolesCount = DB::table('roles')->count();
    echo "✓ Roles table has {$rolesCount} records\n";
    
    // Check if users table exists
    $usersCount = DB::table('users')->count();
    echo "✓ Users table has {$usersCount} records\n";
    
    // Check foreign key constraint by describing the users table
    $foreignKeys = DB::select("
        SELECT 
            COLUMN_NAME,
            CONSTRAINT_NAME,
            REFERENCED_TABLE_NAME,
            REFERENCED_COLUMN_NAME
        FROM information_schema.KEY_COLUMN_USAGE 
        WHERE TABLE_SCHEMA = DATABASE() 
        AND TABLE_NAME = 'users' 
        AND REFERENCED_TABLE_NAME IS NOT NULL
    ");
    
    if (empty($foreignKeys)) {
        echo "✗ No foreign key constraints found on users table\n";
    } else {
        echo "✓ Foreign key constraints found:\n";
        foreach ($foreignKeys as $fk) {
            echo "  - {$fk->COLUMN_NAME} -> {$fk->REFERENCED_TABLE_NAME}.{$fk->REFERENCED_COLUMN_NAME}\n";
        }
    }
    
    // Test if we can create a user with valid role_id
    $firstRole = DB::table('roles')->first();
    if ($firstRole) {
        echo "✓ Found role with ID: {$firstRole->id}\n";
        
        // Try to insert a test user
        try {
            DB::table('users')->insert([
                'name' => 'Test User',
                'last_name' => 'Test',
                'identification' => 999999999,
                'password' => bcrypt('password'),
                'role_id' => $firstRole->id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            echo "✓ Successfully created user with role_id {$firstRole->id}\n";
            
            // Clean up
            DB::table('users')->where('identification', 999999999)->delete();
            echo "✓ Test user cleaned up\n";
            
        } catch (Exception $e) {
            echo "✗ Failed to create user: " . $e->getMessage() . "\n";
        }
    } else {
        echo "✗ No roles found in database\n";
    }
    
    // Test foreign key constraint by trying to insert user with invalid role_id
    try {
        DB::table('users')->insert([
            'name' => 'Invalid User',
            'last_name' => 'Test',
            'identification' => 888888888,
            'password' => bcrypt('password'),
            'role_id' => 99999, // Invalid role_id
            'created_at' => now(),
            'updated_at' => now()
        ]);
        echo "✗ Foreign key constraint is NOT working - invalid role_id was accepted\n";
    } catch (Exception $e) {
        echo "✓ Foreign key constraint is working - invalid role_id rejected: " . $e->getMessage() . "\n";
    }
    
} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
}
