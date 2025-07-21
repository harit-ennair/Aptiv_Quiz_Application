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
        $sertissageId = DB::table('categories')->where('title', 'Sertissage')->value('id');
        $kabatecId = DB::table('categories')->where('title', 'Kabatec')->value('id');
        $beriCoCutId = DB::table('categories')->where('title', 'Beri.Co.Cut')->value('id');
        $beriCoCutV3Id = DB::table('categories')->where('title', 'Beri.Co.Cut.V3')->value('id');
        $bt752bt722Id = DB::table('categories')->where('title', 'BT 752/BT 722')->value('id');
        $contentionId = DB::table('categories')->where('title', 'C. Contention')->value('id');
        $coupeTuyauxId = DB::table('categories')->where('title', 'Coupe.des.Tuyaux')->value('id');
        $kappa350Id = DB::table('categories')->where('title', 'Kappa 350')->value('id');
        $manguerasId = DB::table('categories')->where('title', 'Mangueras')->value('id');
        $schleunigerId = DB::table('categories')->where('title', 'Schleuniger Dénudage')->value('id');
        $sCrimpingId = DB::table('categories')->where('title', 'S. Crimping')->value('id');
        $torsadoBt188Id = DB::table('categories')->where('title', 'Torsado/BT 188')->value('id');
        $workmanMachineId = DB::table('categories')->where('title', 'Workman Machine')->value('id');
        $expanderMachineId = DB::table('categories')->where('title', 'Expander Machine')->value('id');
        
        if (!$komax433Id || !$komax477Id || !$komax550Id || !$sealPaoumatId || 
            !$sertissageId || !$kabatecId || !$beriCoCutId || !$beriCoCutV3Id || !$bt752bt722Id ||
            !$contentionId || !$coupeTuyauxId || !$kappa350Id || !$manguerasId || !$schleunigerId ||
            !$sCrimpingId || !$torsadoBt188Id || !$workmanMachineId || !$expanderMachineId) {
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

        // Seed Sertissage questions
        $sertissageQuestions = [
            'Combien de brins peuvent être laissés en dehors d\'un sertissage ?',
            'Est-il obligatoire dans le double sertissage que le fil ci-dessous ait également la fenêtre ?',
            'Le pli, à l\'arrière du terminal...',
            'Dans un sertissage, la cloche doit être placée sur...',
            'Comment la hauteur de sertissage doit-elle être mesurée par rapport à la figure 1 ?',
            'Dans un double sertissage avec des fils de différentes sections transversales, quelle devrait être la position des fils ?',
            'Comment devraient être les ailes de cuivre ?',
            'Quelle est la distance maximale des extrémités des brins par rapport à la griffe de cuivre (accw/figure2) ?',
            'La fenêtre à sertir acc avec la figure 3 ...',
            'Conformément à la figure 4, le joint-nek du joint serti devrait-il être visible entre l\'aile de cuivre et l\'aile de PVC ?',
            'Le fil serti doit-il être rejeté si le joint est endommagé ?',
            'Les ailes en PVC...',
            'Quelle est la dimension maximale de la coupe de l\'onglet du terminal à la figure 5 ?',
            'Peut-il réparer une borne endommagée ou mal serti ?',
            'Lorsque vous mesurez la hauteur de sertissage, vous vérifiez qu\'elle n\'est pas conforme aux spécifications, que faire ?',
            'Si le PVC n\'est pas visible dans la fenêtre, que devez-vous faire avec les pièces produites ?',
            'Si les brins ne sont pas visibles dans la fenêtre, le fil est-il rejeté ?',
            'Si la borne a des rainures à côté du pli, le sertissage doit-il être décollé et réparé ?',
            'Combien de fois un sertissage peut-il être réparé à l\'aide du même fil ?',
            'Selon la figure 6, lequel des sertissages a de grandes ailes en PVC ?',
            'Selon la figure 6, laquelle des sertissages a des ailes d\'isolation perçant l\'isolation ?',
            'Selon la figure 6, laquelle des sertissages a des brins à l\'extérieur des ailes de cuivre ?',
            'Selon la figure 6, laquelle des sertissages à des brins excessifs à l\'avant ?',
            'Selon la figure 6, laquelle des sertissages a un corps terminal endommagé ?',
            'Le plan de contrôle est :',
            'Quand devriez-vous enregistrer la valeur cpk sur le rapport de production ?',
            'Que dois-je faire si la valeur cpk est inférieure à 1 ?',
            'Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?'
        ];
        
        foreach ($sertissageQuestions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $sertissageId,
            ]);
        }
        
        $this->command->info('Created ' . count($sertissageQuestions) . ' questions for Sertissage');
        
        // Seed Kabatec questions
        $kabatecQuestions = [
            'Quel est le rôle de la machine kabatec  :',
            'Quel est le rôle de la machine Teknomatik :',
            'la mauvaise manipulation du torsadé peut causer :',
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
        
        foreach ($kabatecQuestions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $kabatecId,
            ]);
        }
        
        $this->command->info('Created ' . count($kabatecQuestions) . ' questions for Kabatec');
        
        // Seed Beri.Co.Cut questions
        $beriCoCutQuestions = [
            'BERI Co Cut est une machine semi-automatique qui permet de :',
            'Si les brins de la tresse sont répartis on doit:',
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
        
        foreach ($beriCoCutQuestions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $beriCoCutId,
            ]);
        }
        
        $this->command->info('Created ' . count($beriCoCutQuestions) . ' questions for Beri.Co.Cut');
        
        // Seed Beri.Co.Cut.V3 questions
        $beriCoCutV3Questions = [
            'BERI Co Cut V3 est une machine semi-automatique qui permet de :',
            'Selon la figure 1 La lettre A c\'est :',
            'Selon la figure 1 La lettre B c\'est',
            'Selon la figure 1 La lettre C c\'est:',
            'Selon la figure 1 La lettre D c\'est :',
            'Cocher les opérations de BERI Co Cut V3 :',
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
        
        foreach ($beriCoCutV3Questions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $beriCoCutV3Id,
            ]);
        }
        
        $this->command->info('Created ' . count($beriCoCutV3Questions) . ' questions for Beri.Co.Cut.V3');
        
        // Seed BT 752/BT 722 questions
        $bt752bt722Questions = [
            'La KOMAX BT752 /BT722 est une presses de :',
            'Selon la figure 1 La lettre A c\'est :',
            'Selon la figure 1 La lettre B c\'est',
            'Selon la figure 1 La lettre C c\'est:',
            'Selon la figure 1 La lettre D c\'est :',
            'Selon la figure 1 La lettre E c\'est :',
            'Selon la figure 1 La lettre F c\'est :',
            'Selon la figure 1 La lettre G c\'est :',
            'Selon la figure 1 La lettre H c\'est :',
            'Selon la figure 1 La lettre I c\'est :',
            'Cocher les normes de qualité d\'un sertissage:',
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
        
        foreach ($bt752bt722Questions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $bt752bt722Id,
            ]);
        }
        
        $this->command->info('Created ' . count($bt752bt722Questions) . ' questions for BT 752/BT 722');
        
        // Seed Contention questions
        $contentionQuestions = [
            'Qu\'est-ce qu\'un contrôle de contention?',
            'Après chaque vérification le contrôle de contention il doit mettre :',
            'Cocher les étapes du plan de réaction de contrôle  contention  :',
            'L\'opérateur de contention est une personne:',
            'Quelle est la documentation utilisée dans votre poste de travail?',
            'Quels sont les systèmes utilisés dans notre organisation?',
            'C\'est quoi le systéme FIFO?',
            'Choisir la définition exacte du <<Mode Opératoire>> :',
            'Choisir la définition exacte du <<Aide Visuelle>> :',
            'La définition exacte de la politique de qualité est :',
            'La définition exacte de la politique d\'environnement:',
            'Cocher les trois consignes de sécurité:',
            'Citer les 5S?',
            'Cocher les Valeurs d\'APTIV:'
        ];
        
        foreach ($contentionQuestions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $contentionId,
            ]);
        }
        
        $this->command->info('Created ' . count($contentionQuestions) . ' questions for Contention');

        // Seed Coupe des Tuyaux questions
        $coupeTuyauxQuestions = [
            'Quels sont les principes groupes de protection des fils ?',
            'Quelles est la zone dédiée pour couper les tubes :',
            'Le tuyau est une pièce :',
            'Pour assurer une qualité de coupe des tuyaux on doit :',
            'Quels sont les types des systèmes de guidage dédiés pour la coupe des tubes :',
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
        
        foreach ($coupeTuyauxQuestions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $coupeTuyauxId,
            ]);
        }
        
        $this->command->info('Created ' . count($coupeTuyauxQuestions) . ' questions for Coupe des Tuyaux');

        // Seed Kappa 350 questions
        $kappa350Questions = [
            'La machine kappa 350 est machine de :',
            'Cocher les étapes de validation de réglage sur Kappa 350:',
            'Quelles sont les caractéristiques qu\'ont doit messurer:',
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
        
        foreach ($kappa350Questions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $kappa350Id,
            ]);
        }
        
        $this->command->info('Created ' . count($kappa350Questions) . ' questions for Kappa 350');

        // Seed Mangueras questions
        $manguerasQuestions = [
            'Quelles sont les opérations qui comportes la prépartion de mangueras?',
            'On doit découper la maille protectrice avec:',
            'Est-ce que on peut découper la maille protectrice avec la pointe de coupe-ongle?',
            'L\'application du seal est : ?',
            'On assure Le dénudage des deux extrémités de fil selon :',
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
        
        foreach ($manguerasQuestions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $manguerasId,
            ]);
        }
        
        $this->command->info('Created ' . count($manguerasQuestions) . ' questions for Mangueras');

        // Seed Schleuniger Dénudage questions
        $schleunigerId = DB::table('categories')->where('title', 'Schleuniger Dénudage')->value('id');
        $schleunigerQuestions = [
            'La machine schleuniger dénudage est une machine :',
            'Donner la définition d\'un conducteur électrique:',
            'Quand faire Si la longueur mesurée n\'est pas correcte :',
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
        
        foreach ($schleunigerQuestions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $schleunigerId,
            ]);
        }
        
        $this->command->info('Created ' . count($schleunigerQuestions) . ' questions for Schleuniger Dénudage');
        
        // Seed S. Crimping questions
        $sCrimpingQuestions = [
            'Quelle est la définition de sertissage ?',
            'Quels sont les types de sertissage dans les presses pawomat :',
            'La machine Pawomat est une presse de sertissage équipée  :',
            'Quels sont les types de presses Stripper-crimper   :',
            'Quand l\'opération du réglage de sertissage est nécessaire :',
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
        
        foreach ($sCrimpingQuestions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $sCrimpingId,
            ]);
        }
        
        $this->command->info('Created ' . count($sCrimpingQuestions) . ' questions for S. Crimping');
        
        // Seed Torsado/BT 188 questions
        $torsadoBt188Questions = [
            'Quel est la définition du torsadage ? :',
            'La torsade permet d\'éliminé :',
            'Quelles sont les caractaristiques des fils torsadés',
            'Quelle est la direction des pas de torsadage :',
            'Comment on doit ajuster la pression des pinces de fixation et la pression cylindrique selon:',
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
        
        foreach ($torsadoBt188Questions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $torsadoBt188Id,
            ]);
        }
        
        $this->command->info('Created ' . count($torsadoBt188Questions) . ' questions for Torsado/BT 188');
        
        // Seed Workman Machine questions
        $workmanMachineQuestions = [
            'Quel est le rôle de test workmane machine? :',
            'La configuration de la machine est spéciale :',
            'Dans quel document je dois vérifier le APN terminal, le temps et la température de chauffage :',
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
        
        foreach ($workmanMachineQuestions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $workmanMachineId,
            ]);
        }
        
        $this->command->info('Created ' . count($workmanMachineQuestions) . ' questions for Workman Machine');
        
        // Seed Expander Machine questions
        $expanderMachineQuestions = [
            'Quel est le rôle de l\'expander machine:',
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
        
        foreach ($expanderMachineQuestions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $expanderMachineId,
            ]);
        }
        
        $this->command->info('Created ' . count($expanderMachineQuestions) . ' questions for Expander Machine');
    }
}