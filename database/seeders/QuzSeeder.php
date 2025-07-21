<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\quz;
use App\Models\categories;
use Illuminate\Support\Facades\DB;

class QuzSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get category IDs
        $komax433Id = DB::table('categories')->where('title', 'Komax 433')->value('id');
        $komax477Id = DB::table('categories')->where('title', 'Komax 477')->value('id');
        $komax550Id = DB::table('categories')->where('title', 'Komax 550')->value('id');
        $sealPaoumatId = DB::table('categories')->where('title', 'Seal Paoumat / Komax')->value('id');
        
        if (!$komax433Id || !$komax477Id || !$komax550Id || !$sealPaoumatId) {
            $this->command->error('One or more required categories not found! Please run CategoriesSeeder first.');
            return;
        }
        
        // Seed Komax 433 questions
        $komax433Questions = [
            'La komax 433 est une machine de :',
            'La Komax 433 est destinée aux applications suivantes dans le domaine de câbles:',
            'Combien de station d\'usinage dans la machine Komax 433',
            'Cocher les normes de qualité d\'un sertissage:',
            'Selon la figure 1 la lettre A c\'est :',
            'Selon la figure 1 la lettre B c\'est :',
            'Selon la figure 1 la lettre C c\'est :',
            'Selon la figure 2 c\'est :',
            'Coche les moyens de mesure et de contrôle utilisés pour assurer la qualité de sertissage :',
            'Quelle est la longueur defini sur la plage de longeur de la machine komax 433?',
            'Quelle est la section des fils defini sur la machine komax 433?',
            'Quelle est la section des fils defini sur la machine komax 433?',
            'Selon la figure 3 le n° A c\'est :',
            'Selon la figure 3 le n° B c\'est :',
            'Selon la figure 3 le n° C c\'est :',
            'Selon la figure 3 le n° D c\'est :',
            'L\'opération du réglage de sertissage est nécessaire lorsqu\'i l y a un des changements qui suivent :',
            'Selon la figure 4 quelle est la valeur nominal de la hauteur Alma :',
            'Si MC<1 (Monitoring Capacity) quelle est l\'action qu\'on doit faire :',
            'Tubes de guidage (Boukia) Utilisés pour :',
            'Quels sont les systèmes utilisés dans notre organisation?',
            'C\'est quoi le systéme FIFO?',
            'Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?',
            'Quelle est la documentation utilisée dans votre poste de travail?',
            'Choisir la définition exacte du <<Mode Opératoire>> :',
            'Choisir la définition exacte du <<Aide Visuelle>> :',
            'La définition exacte de la politique de qualité est :',
            'La définition exacte de la politique d\'environnement:',
            'Cocher les trois consignes de sécurité:',
            'Citer les 5S?',
            'Cocher les Valeurs d\'APTIV:'
        ];
        
        foreach ($komax433Questions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $komax433Id,
            ]);
        }

        $this->command->info('Created ' . count($komax433Questions) . ' questions for Komax 433');
        
        // Seed Komax 477 questions
        $komax477Questions = [
            'La komax 477 est une machine de :',
            'La Komax 477 est destinée aux applications suivantes dans le domaine de câbles:',
            'Combien de station d\'usinage dans la machine Komax 477',
            'Cocher les normes de qualité d\'un sertissage:',
            'Selon la figure 1 la lettre A c\'est :',
            'Selon la figure 1 la lettre B c\'est :',
            'Selon la figure 1 la lettre C c\'est :',
            'Quelle est la longueur défini dans la machine komax 477:',
            'Tubes de guidage (Boukia) Utilisés pour :',
            'L\'unité double pince a pour rôle de :',
            'Quels sont les systèmes utilisés dans notre organisation?',
            'C\'est quoi le systéme FIFO?',
            'Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?',
            'Quelle est la documentation utilisée dans votre poste de travail?',
            'Choisir la définition exacte du <<Mode Opératoire>> :',
            'Choisir la définition exacte du <<Aide Visuelle>> :',
            'La définition exacte de la politique de qualité est :',
            'La définition exacte de la politique d\'environnement:',
            'Cocher les trois consignes de sécurité:',
            'Citer les 5S?',
            'Cocher les Valeurs d\'APTIV:'
        ];
        
        foreach ($komax477Questions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $komax477Id,
            ]);
        }
        
        $this->command->info('Created ' . count($komax477Questions) . ' questions for Komax 477');
        
        // Seed Komax 550 questions
        $komax550Questions = [
            'La komax 550 est une machine de :',
            'La Komax 550 est destinée aux applications suivantes dans le domaine de câbles:',
            'Combien de station d\'usinage dans la machine Komax 550',
            'Cocher les normes de qualité d\'un sertissage:',
            'Selon la figure 1 la lettre A c\'est :',
            'Selon la figure 1 la lettre B c\'est :',
            'Selon la figure 1 la lettre C c\'est :',
            'Selon la figure 2 c\'est :',
            'Coche les moyens de mesure et de contrôle utilisés pour assurer la qualité de sertissage :',
            'Selon la figure 3 le n° 10 c\'est pour :',
            'Selon la figure 3 le n° 11 c\'est pour :',
            'Selon la figure 3 le n° 4 c\'est pour :',
            'Selon la figure 3 le n°5 c\'est pour :',
            'L\'opération du réglage de sertissage est nécessaire lorsqu\'i l y a un des changements qui suivent :',
            'Selon la figure 4 quelle est la valeur nominal de la hauteur Alma :',
            'Si MC<1 (Monitoring Capacity) quelle est l\'action qu\'on doit faire :',
            'Tubes de guidage (Boukia) Utilisés pour :',
            'Quels sont les systèmes utilisés dans notre organisation?',
            'C\'est quoi le systéme FIFO?',
            'Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?',
            'Quelle est la documentation utilisée dans votre poste de travail?',
            'Choisir la définition exacte du <<Mode Opératoire>> :',
            'Choisir la définition exacte du <<Aide Visuelle>> :',
            'La définition exacte de la politique de qualité est :',
            'La définition exacte de la politique d\'environnement:',
            'Cocher les trois consignes de sécurité:',
            'Citer les 5S?',
            'Cocher les Valeurs d\'APTIV:'
        ];
        
        foreach ($komax550Questions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $komax550Id,
            ]);
        }
        
        $this->command->info('Created ' . count($komax550Questions) . ' questions for Komax 550');
        
        // Seed Seal Paoumat / Komax questions
        $sealPaoumatQuestions = [
            'Quel est le rôle de seal dans la câble :',
            'Les différents types du seal sont définis selon :',
            'Quels sont les types des applicateurs du seal utlisés dans la machine de coupe ?',
            'Selon la figure 1 N° 1 c\'est:',
            'Selon la figure 1 N° 2 c\'est:',
            'Selon la figure 1 N° 4 c\'est :',
            'Selon la figure 2 la lettre A c\'est :',
            'Selon la figure 2 la lettre B c\'est ::',
            'Selon la figure 2 la lettre C c\'est :',
            'Selon la figure 3 la lettre A c\'est :',
            'Selon la figure 3 la lettre B c\'est :',
            'Selon la figure 3 la lettre C c\'est :',
            'Selon la figure D la lettre A c\'est :',
            'Selon la figure 3 la lettre E c\'est :',
            'Cocher les critères de la non qualité du seal :',
            'Cocher les critères de qualité du seal :',
            'Quels sont les systèmes utilisés dans notre organisation?',
            'C\'est quoi le systéme FIFO?',
            'Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?',
            'Quelle est la documentation utilisée dans votre poste de travail?',
            'Choisir la définition exacte du <<Mode Opératoire>> :',
            'Choisir la définition exacte du <<Aide Visuelle>> :',
            'La définition exacte de la politique de qualité est :',
            'La définition exacte de la politique d\'environnement:',
            'Cocher les trois consignes de sécurité:',
            'Citer les 5S?',
            'Cocher les Valeurs d\'APTIV:'
        ];
        
        foreach ($sealPaoumatQuestions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $sealPaoumatId,
            ]);
        }
        
        $this->command->info('Created ' . count($sealPaoumatQuestions) . ' questions for Seal Paoumat / Komax');
        
        $this->command->info('Created ' . count($sealPaoumatQuestions) . ' questions for Seal Paoumat / Komax');
    }
}