<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\process;

class ProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $processes = [
            [
                'title' => 'Process d\'assemblage',
                'description' => 'Processus d\'assemblage des composants',
                'create_at' => now(),
            ],
            [
                'title' => 'Process de coupe',
                'description' => 'Processus de coupe des matériaux',
                'create_at' => now(),
            ],
            [
                'title' => 'Process de LP',
                'description' => 'Processus de LP (Line Production)',
                'create_at' => now(),
            ],
        ];

        foreach ($processes as $processData) {
            process::create($processData);
        }
    }
}
