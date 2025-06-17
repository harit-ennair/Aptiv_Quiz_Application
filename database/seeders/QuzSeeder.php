<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\quz;
use App\Models\categories;

class QuzSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find the Contrôle Molettes category
        $molettesCategory = categories::where('title', 'Contrôle Molettes')->first();
        
        if (!$molettesCategory) {
            $this->command->error('Contrôle Molettes category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Find the Contrôle Électrique category
        $controleElectriqueCategory = categories::where('title', 'Contrôle Eléctrique')->first();
        
        if (!$controleElectriqueCategory) {
            $this->command->error('Contrôle Eléctrique category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Questions for Contrôle Molettes
        $molettesQuestions = [
            'Quelle est le rôle de Molettes dans le cablage?',
            'Quelles sont les déférents type de Molettes:',
            'Quelles sont les matériels et les moyens utilisée dans le poste de Molettes :',
            'Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?',
            'Quelle est la documentation utilisée dans votre poste de travail?',
            'Choisir la définition exacte du <<Mode Opératoire>> :',
            'Choisir la définition exacte du <<Aide Visuelle>> :',
            'La définition exacte de la politique de qualité est :',
            'La définition exacte de la politique d\'environnement:',
            'Cocher les trois consignes de sécurité:',
            'Citer les 5S?',
            'Cocher les Valeurs d\'APTIV:',
        ];

        foreach ($molettesQuestions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $molettesCategory->id,
                'image_path' => null,
            ]);
        }

        $this->command->info('Created ' . count($molettesQuestions) . ' questions for Contrôle Molettes');

        // Find the Contrôle Électrique category
        $controleElectriqueCategory = categories::where('title', 'Contrôle Électrique')->first();
        
        if (!$controleElectriqueCategory) {
            $this->command->error('Contrôle Électrique category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Questions for Contrôle Électrique
        $electriqueQuestions = [
            'Qu\'il est le rôle de contrôle électrique',
            'L\'opérateur de contrôle électrique a le droit de réparer:',
            'La lecture de l\'étiquette de manifeste est :',
            'La garantie du bon fonctionnement du cablâge est:',
            'Au moment de la lecture de l\'étiquette de contrôle électrique, celle-ci doit être:',
            'Le nettoyage des bancs électrique est:',
            'Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?',
            'Quelle est la documentation utilisée dans votre poste de travail?',
            'Choisir la définition exacte du <<Mode Opératoire>> :',
            'Choisir la définition exacte du <<Aide Visuelle>> :',
            'La définition exacte de la politique de qualité est :',
            'La définition exacte de la politique d\'environnement:',
            'Cocher les trois consignes de sécurité:',
            'Citer les 5S?',
            'Cocher les Valeurs d\'APTIV:',
        ];

        foreach ($electriqueQuestions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $controleElectriqueCategory->id,
                'image_path' => null,
            ]);
        }

        $this->command->info('Created ' . count($electriqueQuestions) . ' questions for Contrôle Électrique');

        // Find the Contrôle Goulotte category
        $gouloTteCategory = categories::where('title', 'Contrôle Goulotte')->first();
        
        if (!$gouloTteCategory) {
            $this->command->error('Contrôle Goulotte category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Questions for Contrôle Goulotte
        $gouloTteQuestions = [
            'Le rôle de la goulotte est:',
            'L\'étiquette de contrôle goulotte garanti?',
            'La table de montage de goulotte assure:',
            'La garantie du bon fonctionnement du cablâge est:',
            'L\'étiquette de contrôle de goulotte contient les informations suivantes:',
            'Quelle est la documentation utilisée dans votre poste de travail?',
            'Choisir la définition exacte du <<Mode Opératoire>> :',
            'Choisir la définition exacte du <<Aide Visuelle>> :',
            'La définition exacte de la politique de qualité est :',
            'La définition exacte de la politique d\'environnement:',
            'Cocher les trois consignes de sécurité:',
            'Citer les 5S?',
            'Cocher les Valeurs d\'APTIV:',
        ];

        foreach ($gouloTteQuestions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $gouloTteCategory->id,
                'image_path' => null,
            ]);
        }

        $this->command->info('Created ' . count($gouloTteQuestions) . ' questions for Contrôle Goulotte');

        // Find the Emballage category
        $emballageCategory = categories::where('title', 'Emballage')->first();
        
        if (!$emballageCategory) {
            $this->command->error('Emballage category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Questions for Emballage
        $emballageQuestions = [
            'Quel est le rôle d\'emballage?',
            'Quelle est l\'utilité du Label Management ?',
            'Pour placer une palette "in wait" l\'opérateur doit lire :',
            'Quelles sont les types des etiquettes utilisés dans le poste d\'emballage:',
            'Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?',
            'Quelle est la documentation utilisée dans votre poste de travail?',
            'Choisir la définition exacte du <<Mode Opératoire>> :',
            'Choisir la définition exacte du <<Aide Visuelle>> :',
            'La définition exacte de la politique de qualité est :',
            'La définition exacte de la politique d\'environnement:',
            'Cocher les trois consignes de sécurité:',
            'Citer les 5S?',
            'Cocher les Valeurs d\'APTIV:',
        ];

        foreach ($emballageQuestions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $emballageCategory->id,
                'image_path' => null,
            ]);
        }

        $this->command->info('Created ' . count($emballageQuestions) . ' questions for Emballage');

        // Find the Epissure UCAB category
        $epissureUCABCategory = categories::where('title', 'Epissure UCAB')->first();
        
        if (!$epissureUCABCategory) {
            $this->command->error('Epissure UCAB category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Questions for Epissure UCAB
        $epissureUCABQuestions = [
            'Donner la définition d\'une épissure UCAB:',
            'Quels sont les composants nécessaires pour réaliser une épissure?',
            'Citer les caractéristique de la qualité d\'une épissure:',
            'Pourquoi on isole l\'épissure?',
            'Quelle sont les types d\'isolation d\'une épissure?',
            'Le rôle du splice contrôleur est?',
            'Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?',
            'Quelle est la documentation utilisée dans votre poste de travail?',
            'Choisir la définition exacte du <<Mode Opératoire>> :',
            'Choisir la définition exacte du <<Aide Visuelle>> :',
            'La définition exacte de la politique de qualité est :',
            'La définition exacte de la politique d\'environnement:',
            'Cocher les trois consignes de sécurité:',
            'Citer les 5S?',
            'Cocher les Valeurs d\'APTIV:',
        ];

        foreach ($epissureUCABQuestions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $epissureUCABCategory->id,
                'image_path' => null,
            ]);
        }

        $this->command->info('Created ' . count($epissureUCABQuestions) . ' questions for Epissure UCAB');

        // Find the Expander Machine category
        $expanderMachineCategory = categories::where('title', 'Expander Machine')->first();
        
        if (!$expanderMachineCategory) {
            $this->command->error('Expander Machine category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Questions for Expander Machine
        $expanderMachineQuestions = [
            'Qu\'il est le rôle de l\'expander machine',
            'Classer les étapes des opértions effectuer sur l\'expander machine:',
            'Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?',
            'Quelle est la documentation utilisée dans votre poste de travail?',
            'Choisir la définition exacte du <<Mode Opératoire>> :',
            'Choisir la définition exacte du <<Aide Visuelle>> :',
            'La définition exacte de la politique de qualité est :',
            'La définition exacte de la politique d\'environnement:',
            'Cocher les trois consignes de sécurité:',
            'Citer les 5S?',
            'Cocher les Valeurs d\'APTIV:',
        ];

        foreach ($expanderMachineQuestions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $expanderMachineCategory->id,
                'image_path' => null,
            ]);
        }

        $this->command->info('Created ' . count($expanderMachineQuestions) . ' questions for Expander Machine');

        // Find the Sysème Led category (note the specific spelling in the categories)
        $ledSystemCategory = categories::where('title', 'Sysème Led')->first();
        
        if (!$ledSystemCategory) {
            $this->command->error('Sysème Led category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Questions for Led System
        $ledSystemQuestions = [
            'Quelle est l\'utilité Du Led System?',
            'Classer les étapes des opérations Led System:',
            'Quels sont les fonctions du Led System?',
            'Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?',
            'Quelle est la documentation utilisée dans votre poste de travail?',
            'Choisir la définition exacte du <<Mode Opératoire>> :',
            'Choisir la définition exacte du <<Aide Visuelle>> :',
            'La définition exacte de la politique de qualité est :',
            'La définition exacte de la politique d\'environnement:',
            'Cocher les trois consignes de sécurité:',
            'Citer les 5S?',
            'Cocher les Valeurs d\'APTIV:',
        ];

        foreach ($ledSystemQuestions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $ledSystemCategory->id,
                'image_path' => null,
            ]);
        }

        $this->command->info('Created ' . count($ledSystemQuestions) . ' questions for Sysème Led');

        // Find the Outpining Machine category
        $outpiningMachineCategory = categories::where('title', 'Outpining Machine')->first();
        
        if (!$outpiningMachineCategory) {
            $this->command->error('Outpining Machine category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Questions for Outpining Machine
        $outpiningMachineQuestions = [
            'Quel est le rôle de processus outpining:',
            'Classer les étapes de processus outpining:',
            'Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?',
            'Quelle est la documentation utilisée dans votre poste de travail?',
            'Choisir la définition exacte du <<Mode Opératoire>> :',
            'Choisir la définition exacte du <<Aide Visuelle>> :',
            'La définition exacte de la politique de qualité est :',
            'La définition exacte de la politique d\'environnement:',
            'Cocher les trois consignes de sécurité:',
            'Citer les 5S?',
            'Cocher les Valeurs d\'APTIV:',
        ];

        foreach ($outpiningMachineQuestions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $outpiningMachineCategory->id,
                'image_path' => null,
            ]);
        }

        $this->command->info('Created ' . count($outpiningMachineQuestions) . ' questions for Outpining Machine');

        // Find the Réparation category
        $reparationCategory = categories::where('title', 'Réparation')->first();
        
        if (!$reparationCategory) {
            $this->command->error('Réparation category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Questions for Réparation
        $reparationQuestions = [
            'Donner la définition de la"Réparation":',
            'La Réparation est:',
            'Que Répare-t-on?',
            'L\'opérateur de réparation doit être?',
            'Comment répare-t-on?',
            'Comment se fait le choix et la manipulation des outils de retouche?',
            'Le cablâge à réparer doit être identifié par:',
            'Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?',
            'Quelle est la documentation utilisée dans votre poste de travail?',
            'Choisir la définition exacte du <<Mode Opératoire>> :',
            'Choisir la définition exacte du <<Aide Visuelle>> :',
            'La définition exacte de la politique de qualité est :',
            'La définition exacte de la politique d\'environnement:',
            'Cocher les trois consignes de sécurité:',
            'Citer les 5S?',
            'Cocher les Valeurs d\'APTIV:',
        ];

        foreach ($reparationQuestions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $reparationCategory->id,
                'image_path' => null,
            ]);
        }

        $this->command->info('Created ' . count($reparationQuestions) . ' questions for Réparation');

        // Find the Réparation ROB category
        $reparationROBCategory = categories::where('title', 'Réparation ROB')->first();
        
        if (!$reparationROBCategory) {
            $this->command->error('Réparation ROB category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Questions for Réparation ROB
        $reparationROBQuestions = [
            'Cocher la définition exacte de la réparation:',
            'La réparation est une forme :',
            'L\'opérateur de répartion de ROB a le droit de réparer:',
            'Les Outils de Retouche sont définis par :',
            'A chaque retouche effectuée sur les connecteurs SIGMA il faut :',
            'L\'étiquette d\'auto refus doit être complétée par :',
            'Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?',
            'Quelle est la documentation utilisée dans votre poste de travail?',
            'Choisir la définition exacte du <<Mode Opératoire>> :',
            'Choisir la définition exacte du <<Aide Visuelle>> :',
            'La définition exacte de la politique de qualité est :',
            'La définition exacte de la politique d\'environnement:',
            'Cocher les trois consignes de sécurité:',
            'Citer les 5S?',
            'Cocher les Valeurs d\'APTIV:',
        ];

        foreach ($reparationROBQuestions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $reparationROBCategory->id,
                'image_path' => null,
            ]);
        }

        $this->command->info('Created ' . count($reparationROBQuestions) . ' questions for Réparation ROB');

        // Find the Ring terminal category
        $ringTerminalCategory = categories::where('title', 'Ring terminal')->first();
        
        if (!$ringTerminalCategory) {
            $this->command->error('Ring terminal category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Questions for Ring Terminal
        $ringTerminalQuestions = [
            'Donner la définition d\'un Ring Terminal ?',
            'Quels sont les composants nécessaires pour réaliser un Ring Terminal?',
            'Citer les caractéristiques de qualité d\'un Ring Terminal ?',
            'Classer les étapes de soudage Ring Terminal:',
            'Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?',
            'Quelle est la documentation utilisée dans votre poste de travail?',
            'Choisir la définition exacte du <<Mode Opératoire>> :',
            'Choisir la définition exacte du <<Aide Visuelle>> :',
            'La définition exacte de la politique de qualité est :',
            'La définition exacte de la politique d\'environnement:',
            'Cocher les trois consignes de sécurité:',
            'Citer les 5S?',
            'Cocher les Valeurs d\'APTIV:',
        ];

        foreach ($ringTerminalQuestions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $ringTerminalCategory->id,
                'image_path' => null,
            ]);
        }

        $this->command->info('Created ' . count($ringTerminalQuestions) . ' questions for Ring terminal');

        // Find the Sealing category
        $sealingCategory = categories::where('title', 'Sealing')->first();
        
        if (!$sealingCategory) {
            $this->command->error('Sealing category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Questions for Sealing
        $sealingQuestions = [
            [
                'text' => 'Quel est le rôle de l\'isolation par tube rétractable ?',
                'image_path' => null
            ],
            [
                'text' => 'Quel type d\'appareil pouvons-nous utiliser pour l\'isolation des épissures ?',
                'image_path' => null
            ],
            [
                'text' => 'Avant d\'isoler une épissure, nous devons :',
                'image_path' => null
            ],
            [
                'text' => 'En quoi consiste le contrôle d\'une épissure ?',
                'image_path' => null
            ],
            [
                'text' => 'Quel type d\'isolation devons-nous réaliser pour chaque épissure ?',
                'image_path' => null
            ],
            [
                'text' => 'Le tube d\'isolement doit être :',
                'image_path' => null
            ],
            [
                'text' => 'Quelles peuvent être les conséquences d\'une épissure mal isolée ?',
                'image_path' => null
            ],
            [
                'text' => 'Si l\'isolation des fils est brûlée pendant le temps de rétraction, nous devons :',
                'image_path' => null
            ],
            [
                'text' => 'L\'utilisation de gants dans le processus de rétraction est :',
                'image_path' => null
            ],
            [
                'text' => 'Que devons-nous faire avant d\'allumer l\'appareil Shrinking ?',
                'image_path' => null
            ],
            [
                'text' => 'Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et',
                'image_path' => null
            ],
            [
                'text' => 'Quel type de machine représente la figure',
                'image_path' => 'images/questions/sealing/raychem_machine.jpg'
            ],
            [
                'text' => 'D\'après la figure 1, quel type d\'informations collectons-nous sur les compteurs A et B ?',
                'image_path' => 'images/questions/sealing/counters_ab_figure.jpg'
            ],
            [
                'text' => 'Selon le Non Conformance Board, veuillez identifier le problème de l\'isolation A ?',
                'image_path' => 'images/questions/sealing/isolation_problem_a.jpg'
            ],
            [
                'text' => 'Conformément au Comité de non-conformité, veuillez identifier le problème de l\'isolation B ?',
                'image_path' => 'images/questions/sealing/isolation_problem_b.jpg'
            ],
            [
                'text' => 'Selon le Non Conformance Board, veuillez identifier le problème de l\'isolation C ?',
                'image_path' => 'images/questions/sealing/isolation_problem_c.jpg'
            ],
            [
                'text' => 'Conformément au Non Conformance Board, veuillez identifier le problème de l\'isolation D ?',
                'image_path' => 'images/questions/sealing/isolation_problem_d.jpg'
            ],
            [
                'text' => 'Selon le Non Conformance Board, veuillez identifier le problème de l\'isolation E ?',
                'image_path' => 'images/questions/sealing/isolation_problem_e.jpg'
            ],
            [
                'text' => 'Selon le Non Conformance Board, veuillez identifier le problème de l\'isolation F ?',
                'image_path' => 'images/questions/sealing/isolation_problem_f.jpg'
            ],
        ];

        foreach ($sealingQuestions as $questionData) {
            quz::create([
                'question_text' => $questionData['text'],
                'categories_id' => $sealingCategory->id,
                'image_path' => $questionData['image_path'],
            ]);
        }

        $this->command->info('Created ' . count($sealingQuestions) . ' questions for Sealing');

        // Find the Térostat category
        $terostateCategory = categories::where('title', 'Térostat')->first();
        
        if (!$terostateCategory) {
            $this->command->error('Térostat category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Questions for Térostat
        $terostateQuestions = [
            [
                'text' => 'Quel est le rôle de Térostat?',
                'image_path' => null
            ],
            [
                'text' => 'Quelles sont les conséquences de l\'omission ou la mauvaise application du térostat?',
                'image_path' => null
            ],
            [
                'text' => 'Quelles sont Les critères de qualité de l\'application du Térostat ?',
                'image_path' => null
            ],
            [
                'text' => 'Classer les étapes d\'application du térostat',
                'image_path' => null
            ],
            [
                'text' => 'Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?',
                'image_path' => null
            ],
            [
                'text' => 'Quelle est la documentation utilisée dans votre poste de travail?',
                'image_path' => null
            ],
            [
                'text' => 'Choisir la définition exacte du <<Mode Opératoire>> :',
                'image_path' => null
            ],
            [
                'text' => 'Choisir la définition exacte du <<Aide Visuelle>> :',
                'image_path' => null
            ],
            [
                'text' => 'La définition exacte de la politique de qualité est :',
                'image_path' => null
            ],
            [
                'text' => 'La définition exacte de la politique d\'environnement:',
                'image_path' => null
            ],
            [
                'text' => 'Cocher les trois consignes de sécurité:',
                'image_path' => null
            ],
            [
                'text' => 'Citer les 5S?',
                'image_path' => null
            ],
            [
                'text' => 'Cocher les Valeurs d\'APTIV:',
                'image_path' => null
            ],
        ];

        foreach ($terostateQuestions as $questionData) {
            quz::create([
                'question_text' => $questionData['text'],
                'categories_id' => $terostateCategory->id,
                'image_path' => $questionData['image_path'],
            ]);
        }

        $this->command->info('Created ' . count($terostateQuestions) . ' questions for Térostat');

        // Find the Vision Machine category
        $visionMachineCategory = categories::where('title', 'Vision Machine')->first();
        
        if (!$visionMachineCategory) {
            $this->command->error('Vision Machine category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Questions for Vision Machine
        $visionMachineQuestions = [
            [
                'text' => 'Choisir le rôle exacte d\'un relais est:',
                'image_path' => null
            ],
            [
                'text' => 'Choisir le rôle exacte d\'un fusible:',
                'image_path' => null
            ],
            [
                'text' => 'La garantie de l\'existence et la conformité des relais et des fusibles c\'est:',
                'image_path' => null
            ],
            [
                'text' => 'Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?',
                'image_path' => null
            ],
            [
                'text' => 'Quelle est la documentation utilisée dans votre poste de travail?',
                'image_path' => null
            ],
            [
                'text' => 'Choisir la définition exacte du <<Mode Opératoire>> :',
                'image_path' => null
            ],
            [
                'text' => 'Choisir la définition exacte du <<Aide Visuelle>> :',
                'image_path' => null
            ],
            [
                'text' => 'La définition exacte de la politique de qualité est :',
                'image_path' => null
            ],
            [
                'text' => 'La définition exacte de la politique d\'environnement:',
                'image_path' => null
            ],
            [
                'text' => 'Cocher les trois consignes de sécurité:',
                'image_path' => null
            ],
            [
                'text' => 'Citer les 5S?',
                'image_path' => null
            ],
            [
                'text' => 'Cocher les Valeurs d\'APTIV:',
                'image_path' => null
            ],
        ];

        foreach ($visionMachineQuestions as $questionData) {
            quz::create([
                'question_text' => $questionData['text'],
                'categories_id' => $visionMachineCategory->id,
                'image_path' => $questionData['image_path'],
            ]);
        }

        $this->command->info('Created ' . count($visionMachineQuestions) . ' questions for Vision Machine');

        // Find the Vissage category
        $vissageCategory = categories::where('title', 'Vissage')->first();
        
        if (!$vissageCategory) {
            $this->command->error('Vissage category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Questions for Vissage
        $vissageQuestions = [
            [
                'text' => 'Donner la définition de vissage ?',
                'image_path' => null
            ],
            [
                'text' => 'Quels sont les composants nécessaires pour réaliser un vissage?',
                'image_path' => null
            ],
            [
                'text' => 'Citer les caractéristiques de qualité de vissage?',
                'image_path' => null
            ],
            [
                'text' => 'Quels sont les types des outils utiliser pour le vissage',
                'image_path' => null
            ],
            [
                'text' => 'Qu\'il est le rôle de clavier POSCO:',
                'image_path' => null
            ],
            [
                'text' => 'Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?',
                'image_path' => null
            ],
            [
                'text' => 'Quelle est la documentation utilisée dans votre poste de travail?',
                'image_path' => null
            ],
            [
                'text' => 'Choisir la définition exacte du <<Mode Opératoire>> :',
                'image_path' => null
            ],
            [
                'text' => 'Choisir la définition exacte du <<Aide Visuelle>> :',
                'image_path' => null
            ],
            [
                'text' => 'La définition exacte de la politique de qualité est :',
                'image_path' => null
            ],
            [
                'text' => 'La définition exacte de la politique d\'environnement:',
                'image_path' => null
            ],
            [
                'text' => 'Cocher les trois consignes de sécurité:',
                'image_path' => null
            ],
            [
                'text' => 'Citer les 5S?',
                'image_path' => null
            ],
            [
                'text' => 'Cocher les Valeurs d\'APTIV:',
                'image_path' => null
            ],
        ];

        foreach ($vissageQuestions as $questionData) {
            quz::create([
                'question_text' => $questionData['text'],
                'categories_id' => $vissageCategory->id,
                'image_path' => $questionData['image_path'],
            ]);
        }

        $this->command->info('Created ' . count($vissageQuestions) . ' questions for Vissage');

        // Find the Workman Machine category
        $workmanMachineCategory = categories::where('title', 'Workman Machine')->first();
        
        if (!$workmanMachineCategory) {
            $this->command->error('Workman Machine category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Questions for Workman Machine
        $workmanMachineQuestions = [
            [
                'text' => 'Quel est le rôle de test workmane machine?',
                'image_path' => null
            ],
            [
                'text' => 'Quelle est la spécialité de la configuration de la machine workmane ?',
                'image_path' => null
            ],
            [
                'text' => 'Cocher les critères de la qualité de la housse :',
                'image_path' => null
            ],
            [
                'text' => 'Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?',
                'image_path' => null
            ],
            [
                'text' => 'Quelle est la documentation utilisée dans votre poste de travail?',
                'image_path' => null
            ],
            [
                'text' => 'Choisir la définition exacte du <<Mode Opératoire>> :',
                'image_path' => null
            ],
            [
                'text' => 'Choisir la définition exacte du <<Aide Visuelle>> :',
                'image_path' => null
            ],
            [
                'text' => 'La définition exacte de la politique de qualité est :',
                'image_path' => null
            ],
            [
                'text' => 'La définition exacte de la politique d\'environnement:',
                'image_path' => null
            ],
            [
                'text' => 'Cocher les trois consignes de sécurité:',
                'image_path' => null
            ],
            [
                'text' => 'Citer les 5S?',
                'image_path' => null
            ],
            [
                'text' => 'Cocher les Valeurs d\'APTIV:',
                'image_path' => null
            ],
        ];

        foreach ($workmanMachineQuestions as $questionData) {
            quz::create([
                'question_text' => $questionData['text'],
                'categories_id' => $workmanMachineCategory->id,
                'image_path' => $questionData['image_path'],
            ]);
        }

        $this->command->info('Created ' . count($workmanMachineQuestions) . ' questions for Workman Machine');

        // Find the Rework category
        $reworkCategory = categories::where('title', 'Rework')->first();
        
        if (!$reworkCategory) {
            $this->command->error('Rework category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Questions for Rework
        $reworkQuestions = [
            [
                'text' => 'Quels sont les différents types de contrôle?',
                'image_path' => null
            ],
            [
                'text' => 'Qui ce que représente les différents types de contrôle effectués sur le câblage :',
                'image_path' => null
            ],
            [
                'text' => 'Qui assure le super contôle:',
                'image_path' => null
            ],
            [
                'text' => 'Qui assure Le contrôle de contention :',
                'image_path' => null
            ],
            [
                'text' => 'Qui assure Le Firewall :',
                'image_path' => null
            ],
            [
                'text' => 'Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?',
                'image_path' => null
            ],
            [
                'text' => 'Quelle est la documentation utilisée dans votre poste de travail?',
                'image_path' => null
            ],
            [
                'text' => 'Choisir la définition exacte du <<Mode Opératoire>> :',
                'image_path' => null
            ],
            [
                'text' => 'Choisir la définition exacte du <<Aide Visuelle>> :',
                'image_path' => null
            ],
            [
                'text' => 'La définition exacte de la politique de qualité est :',
                'image_path' => null
            ],
            [
                'text' => 'La définition exacte de la politique d\'environnement:',
                'image_path' => null
            ],
            [
                'text' => 'Cocher les trois consignes de sécurité:',
                'image_path' => null
            ],
            [
                'text' => 'Citer les 5S?',
                'image_path' => null
            ],
            [
                'text' => 'Cocher les Valeurs d\'APTIV:',
                'image_path' => null
            ],
        ];

        foreach ($reworkQuestions as $questionData) {
            quz::create([
                'question_text' => $questionData['text'],
                'categories_id' => $reworkCategory->id,
                'image_path' => $questionData['image_path'],
            ]);
        }

        $this->command->info('Created ' . count($reworkQuestions) . ' questions for Rework');

        // Find the Ultra-sonic Welding category
        $ultrasonicWeldingCategory = categories::where('title', 'Ultra-sonic Welding')->first();
        
        if (!$ultrasonicWeldingCategory) {
            $this->command->error('Ultra-sonic Welding category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Questions for Ultra-sonic Welding
        $ultrasonicWeldingQuestions = [
            'Qu\'est-ce qu\'une épissure USW ?',
            'La longueur dépouillée des fils pour cette épissure doit :',
            'Quelles précautions devez-vous prendre avec les parties dépouillées de ces fils ?',
            'Comment les pièces dépouillées doivent-elles être placées dans la machine ?',
            'Le chevauchement des parties dépouillées des fils doit :',
            'Dans la figure 1 (B), quelle est la distance entre une isolation ?',
            'La zone de soudage Splice doit :',
            'L\'épissure de la figure 2 est :',
            'L\'épissure de la figure 3 est :',
            'Selon la figure 4, quelle est la fonctionnalité de la commande F2 ?',
            'Selon la figure 4, quelle est la fonctionnalité de la commande F4 ?',
            'Selon la figure 4, quelle est la fonctionnalité de la commande F5 ?',
            'Quand devriez-vous régler les compteurs sur "0" ?',
            'Selon la figure 5, quelle est l\'interprétation de l\'erreur ?',
            'Quelles sont les causes possibles de cette erreur ?',
            'Selon la figure 6, quelle est l\'interprétation de l\'erreur ?',
            'Selon la figure 7, quelle est l\'interprétation de l\'erreur ?',
            'Pourquoi l\'utilisation de gants est-elle obligatoire lors de la production d\'épissures à ultrasons ?',
            'Selon la figure 8, de combien de fils avons-nous besoin dans cette configuration ?',
            'Selon la figure 8, quelle est la section transversale du fil abc-1 ?',
            'Selon la figure 8, quel est le nom de l\'épissure en cours de production ?',
            'Que doit-on faire au cas d\'une épissure défectueuse ?',
            'Avant d\'isoler une épissure, vous devez :',
            'Que signifie « vérification de l\'épissure » ?',
            'Quel type d\'isolation doit être placé sur chaque épissure ?',
            'Décrivez la légende de la figure 9 :',
            'Combien de fois pouvez-vous refaire l\'épissure en utilisant les mêmes fils ?',
            'Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?',
        ];

        foreach ($ultrasonicWeldingQuestions as $questionText) {
            quz::create([
                'question_text' => $questionText,
                'categories_id' => $ultrasonicWeldingCategory->id,
                'image_path' => null,
            ]);
        }

        $this->command->info('Created ' . count($ultrasonicWeldingQuestions) . ' questions for Ultra-sonic Welding');
    }
}