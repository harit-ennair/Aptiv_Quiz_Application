<?php

require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\repo;
use App\Models\quz;
use App\Models\categories;

echo "=== Questions vs Answers per Category ===\n";

$categories = categories::all();
foreach($categories as $category) {
    $questionCount = quz::where('categories_id', $category->id)->count();
    if ($questionCount > 0) {
        $answers = repo::whereHas('quz', function($query) use ($category) {
            $query->where('categories_id', $category->id);
        })->get();
        
        $optionACount = $answers->where('answer_text', 'Option A')->count();
        $optionBCount = $answers->where('answer_text', 'Option B')->count();
        $optionCCount = $answers->where('answer_text', 'Option C')->count();
        $genericCount = $optionACount + $optionBCount + $optionCCount;
        
        echo $category->title . ": " . $questionCount . " questions, " . $answers->count() . " answers";
        if ($genericCount > 0) {
            echo " ($genericCount generic)";
        }
        echo "\n";
    }
}
