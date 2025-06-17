<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use App\Models\roles;

echo "Users count: " . User::count() . "\n";
echo "Users list:\n";

foreach (User::with('role')->get() as $user) {
    echo $user->identification . " - " . $user->name . " " . $user->last_name . " (Role: " . $user->role->name . ")\n";
}
