<?php
require_once __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

// Set up Eloquent ORM
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'stage_aptiv',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

try {
    echo "=== CHECKING EMPLOYEES DATA ===\n";
    
    // Check total users
    $total_users = Capsule::table('users')->count();
    echo "Total users in database: $total_users\n";
    
    // Check employees (role_id = 3)
    $total_employees = Capsule::table('users')->where('role_id', 3)->count();
    echo "Total employees (role_id = 3): $total_employees\n";
    
    // Check users by role
    $roles = Capsule::table('users')
        ->leftJoin('roles', 'users.role_id', '=', 'roles.id')
        ->select('roles.name as role_name', Capsule::raw('COUNT(users.id) as count'))
        ->groupBy('roles.name', 'users.role_id')
        ->get();
    
    echo "\nUsers by role:\n";
    foreach ($roles as $role) {
        echo "- {$role->role_name}: {$role->count}\n";
    }
    
    // Show first 5 employees
    echo "\nFirst 5 employees:\n";
    $employees = Capsule::table('users')
        ->leftJoin('roles', 'users.role_id', '=', 'roles.id')
        ->select('users.*', 'roles.name as role_name')
        ->where('users.role_id', 3)
        ->limit(5)
        ->get();
    
    foreach ($employees as $emp) {
        echo "- ID: {$emp->id}, Name: {$emp->name}, Employee ID: {$emp->employee_id}, Role: {$emp->role_name}\n";
    }
    
    // Check available columns
    echo "\nUser table structure:\n";
    $columns = Capsule::select("SHOW COLUMNS FROM users");
    foreach ($columns as $column) {
        echo "- {$column->Field} ({$column->Type})\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
