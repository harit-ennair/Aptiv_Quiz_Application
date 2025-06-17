<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\formateur;

echo "Formateurs count: " . formateur::count() . "\n";
echo "Formateurs list:\n";

foreach (formateur::all() as $f) {
    echo $f->identification . " - " . $f->name . " " . $f->last_name . "\n";
}
