<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    // Check table engine
    $tableInfo = DB::select("SHOW CREATE TABLE users")[0];
    echo "Current users table structure:\n";
    echo $tableInfo->{'Create Table'} . "\n\n";
    
    // Check if the table is using InnoDB (required for foreign keys)
    if (strpos($tableInfo->{'Create Table'}, 'ENGINE=InnoDB') !== false) {
        echo "✓ Table is using InnoDB engine (supports foreign keys)\n";
    } else {
        echo "✗ Table is not using InnoDB engine\n";
    }
    
    // Check roles table structure
    $rolesInfo = DB::select("SHOW CREATE TABLE roles")[0];
    echo "\nRoles table structure:\n";
    echo $rolesInfo->{'Create Table'} . "\n\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
