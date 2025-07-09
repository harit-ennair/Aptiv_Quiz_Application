<?php
require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;

try {
    $columns = DB::select('DESCRIBE tests');
    echo "Tests table columns:\n";
    foreach($columns as $column) {
        echo "- " . $column->Field . " (" . $column->Type . ")\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
