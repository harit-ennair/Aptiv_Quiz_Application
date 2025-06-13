<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\categories;
use App\Models\process;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find the Process d'assemblage
        $assemblyProcess = process::where('title', 'Process d\'assemblage')->first();
        
        if (!$assemblyProcess) {
            $this->command->error('Process d\'assemblage not found! Please run ProcessSeeder first.');
            return;
        }

        // Categories for Process d'assemblage
        $assemblyCategories = [
            'Contrôle Eléctrique',
            'Contrôle Goulotte',
            'Contrôle Molettes',
            'Emballage',
            'Ultra-sonic Welding',
            'Sealing',
            'Workman Machine',
            'Vision Machine',
            'Epissure UCAB',
            'Ring terminal',
            'Expander Machine',
            'Sysème Led',
            'Térostat',
            'Rework',
            'Vissage',
            'Contention',
            'Réparation ROB',
            'Outpining Machine',
        ];

        foreach ($assemblyCategories as $categoryTitle) {
            categories::create([
                'title' => $categoryTitle,
                'process_id' => $assemblyProcess->id,
                'create_at' => now(),
            ]);
        }

        $this->command->info('Created ' . count($assemblyCategories) . ' categories for Process d\'assemblage');

        // Find the Process de coupe
        $cuttingProcess = process::where('title', 'Process de coupe')->first();
        
        if (!$cuttingProcess) {
            $this->command->error('Process de coupe not found! Please run ProcessSeeder first.');
            return;
        }

        // Categories for Process de coupe
        $cuttingCategories = [
            'Komax 355',
            'Komax 433',
            'Komax 477',
            'Komax 488',
            'Komax 550',
            'Seal Paoumat / Komax',
            'Ink-jet',
            'Section 0,13',
        ];

        foreach ($cuttingCategories as $categoryTitle) {
            categories::create([
                'title' => $categoryTitle,
                'process_id' => $cuttingProcess->id,
                'create_at' => now(),
            ]);
        }

        $this->command->info('Created ' . count($cuttingCategories) . ' categories for Process de coupe');

        // Find the Process de LP
        $lpProcess = process::where('title', 'Process de LP')->first();
        
        if (!$lpProcess) {
            $this->command->error('Process de LP not found! Please run ProcessSeeder first.');
            return;
        }

        // Categories for Process de LP
        $lpCategories = [
            'kabatec',
            'C. Contention',
            'Sertissage',
            'Etamage Manuel',
            'Mangueras',
            'Torsado/BT 188',
            'Hunk',
            'Seal Crimping',
            'S. Crimping',
            'Ulmer',
            'Sealing',
            'Beri.Co.Cut',
            'SVM',
            'BT 188 T',
            'BT 288',
            'BT 752/BT 722',
            'Jaket strpper 8400',
            'Achaud HSG',
            'Kappa 350',
            'Workman machine',
            'Schleuniger Dénudage',
            'Rework',
            'Torsade',
        ];

        foreach ($lpCategories as $categoryTitle) {
            categories::create([
                'title' => $categoryTitle,
                'process_id' => $lpProcess->id,
                'create_at' => now(),
            ]);
        }

        $this->command->info('Created ' . count($lpCategories) . ' categories for Process de LP');
    }
}
