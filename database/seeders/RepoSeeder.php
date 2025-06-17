<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\repo;
use App\Models\quz;
use App\Models\categories;

class RepoSeeder extends Seeder
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

        // Find the Contrôle Goulotte category
        $gouloTteCategory = categories::where('title', 'Contrôle Goulotte')->first();
        
        if (!$gouloTteCategory) {
            $this->command->error('Contrôle Goulotte category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Find the Emballage category
        $emballageCategory = categories::where('title', 'Emballage')->first();
        
        if (!$emballageCategory) {
            $this->command->error('Emballage category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Find the Epissure UCAB category
        $epissureUCABCategory = categories::where('title', 'Epissure UCAB')->first();
        
        if (!$epissureUCABCategory) {
            $this->command->error('Epissure UCAB category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Find the Expander Machine category
        $expanderMachineCategory = categories::where('title', 'Expander Machine')->first();
        
        if (!$expanderMachineCategory) {
            $this->command->error('Expander Machine category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Find the Sysème Led category
        $ledSystemCategory = categories::where('title', 'Sysème Led')->first();
        
        if (!$ledSystemCategory) {
            $this->command->error('Sysème Led category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Find the Outpining Machine category
        $outpiningMachineCategory = categories::where('title', 'Outpining Machine')->first();
        
        if (!$outpiningMachineCategory) {
            $this->command->error('Outpining Machine category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Find the Réparation category
        $reparationCategory = categories::where('title', 'Réparation')->first();
        
        if (!$reparationCategory) {
            $this->command->error('Réparation category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Find the Réparation ROB category
        $reparationROBCategory = categories::where('title', 'Réparation ROB')->first();
        
        if (!$reparationROBCategory) {
            $this->command->error('Réparation ROB category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Find the Ring terminal category
        $ringTerminalCategory = categories::where('title', 'Ring terminal')->first();
        
        if (!$ringTerminalCategory) {
            $this->command->error('Ring terminal category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Find the Sealing category
        $sealingCategory = categories::where('title', 'Sealing')->first();
        
        if (!$sealingCategory) {
            $this->command->error('Sealing category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Find the Térostat category
        $terostateCategory = categories::where('title', 'Térostat')->first();
        
        if (!$terostateCategory) {
            $this->command->error('Térostat category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Find the Vision Machine category
        $visionMachineCategory = categories::where('title', 'Vision Machine')->first();
        
        if (!$visionMachineCategory) {
            $this->command->error('Vision Machine category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Find the Vissage category
        $vissageCategory = categories::where('title', 'Vissage')->first();
        
        if (!$vissageCategory) {
            $this->command->error('Vissage category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Find the Workman Machine category
        $workmanMachineCategory = categories::where('title', 'Workman Machine')->first();
        
        if (!$workmanMachineCategory) {
            $this->command->error('Workman Machine category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Find the Rework category
        $reworkCategory = categories::where('title', 'Rework')->first();
        
        if (!$reworkCategory) {
            $this->command->error('Rework category not found! Please run CategoriesSeeder first.');
            return;
        }

        // Get all questions for Contrôle Molettes
        $molettesQuestions = quz::where('categories_id', $molettesCategory->id)->get();

        if ($molettesQuestions->isEmpty()) {
            $this->command->error('No questions found for Contrôle Molettes! Please run QuzSeeder first.');
            return;
        }

        // Get all questions for Contrôle Électrique
        $controleElectriqueQuestions = quz::where('categories_id', $controleElectriqueCategory->id)->get();

        if ($controleElectriqueQuestions->isEmpty()) {
            $this->command->error('No questions found for Contrôle Électrique! Please run QuzSeeder first.');
            return;
        }

        // Get all questions for Contrôle Goulotte
        $gouloTteQuestions = quz::where('categories_id', $gouloTteCategory->id)->get();

        if ($gouloTteQuestions->isEmpty()) {
            $this->command->error('No questions found for Contrôle Goulotte! Please run QuzSeeder first.');
            return;
        }

        // Get all questions for Emballage
        $emballageQuestions = quz::where('categories_id', $emballageCategory->id)->get();

        if ($emballageQuestions->isEmpty()) {
            $this->command->error('No questions found for Emballage! Please run QuzSeeder first.');
            return;
        }

        // Get all questions for Epissure UCAB
        $epissureUCABQuestions = quz::where('categories_id', $epissureUCABCategory->id)->get();

        if ($epissureUCABQuestions->isEmpty()) {
            $this->command->error('No questions found for Epissure UCAB! Please run QuzSeeder first.');
            return;
        }

        // Get all questions for Expander Machine
        $expanderMachineQuestions = quz::where('categories_id', $expanderMachineCategory->id)->get();

        if ($expanderMachineQuestions->isEmpty()) {
            $this->command->error('No questions found for Expander Machine! Please run QuzSeeder first.');
            return;
        }

        // Get all questions for Sysème Led
        $ledSystemQuestions = quz::where('categories_id', $ledSystemCategory->id)->get();

        if ($ledSystemQuestions->isEmpty()) {
            $this->command->error('No questions found for Sysème Led! Please run QuzSeeder first.');
            return;
        }

        // Get all questions for Outpining Machine
        $outpiningMachineQuestions = quz::where('categories_id', $outpiningMachineCategory->id)->get();

        if ($outpiningMachineQuestions->isEmpty()) {
            $this->command->error('No questions found for Outpining Machine! Please run QuzSeeder first.');
            return;
        }

        // Get all questions for Réparation
        $reparationQuestions = quz::where('categories_id', $reparationCategory->id)->get();

        if ($reparationQuestions->isEmpty()) {
            $this->command->error('No questions found for Réparation! Please run QuzSeeder first.');
            return;
        }

        // Get all questions for Réparation ROB
        $reparationROBQuestions = quz::where('categories_id', $reparationROBCategory->id)->get();

        if ($reparationROBQuestions->isEmpty()) {
            $this->command->error('No questions found for Réparation ROB! Please run QuzSeeder first.');
            return;
        }

        // Get all questions for Ring terminal
        $ringTerminalQuestions = quz::where('categories_id', $ringTerminalCategory->id)->get();

        if ($ringTerminalQuestions->isEmpty()) {
            $this->command->error('No questions found for Ring terminal! Please run QuzSeeder first.');
            return;
        }

        // Get all questions for Sealing
        $sealingQuestions = quz::where('categories_id', $sealingCategory->id)->get();

        if ($sealingQuestions->isEmpty()) {
            $this->command->error('No questions found for Sealing! Please run QuzSeeder first.');
            return;
        }

        // Get all questions for Térostat
        $terostateQuestions = quz::where('categories_id', $terostateCategory->id)->get();

        if ($terostateQuestions->isEmpty()) {
            $this->command->error('No questions found for Térostat! Please run QuzSeeder first.');
            return;
        }

        // Get all questions for Vision Machine
        $visionMachineQuestions = quz::where('categories_id', $visionMachineCategory->id)->get();

        if ($visionMachineQuestions->isEmpty()) {
            $this->command->error('No questions found for Vision Machine! Please run QuzSeeder first.');
            return;
        }

        // Get all questions for Vissage
        $vissageQuestions = quz::where('categories_id', $vissageCategory->id)->get();

        if ($vissageQuestions->isEmpty()) {
            $this->command->error('No questions found for Vissage! Please run QuzSeeder first.');
            return;
        }

        // Get all questions for Workman Machine
        $workmanMachineQuestions = quz::where('categories_id', $workmanMachineCategory->id)->get();

        if ($workmanMachineQuestions->isEmpty()) {
            $this->command->error('No questions found for Workman Machine! Please run QuzSeeder first.');
            return;
        }

        // Get all questions for Rework
        $reworkQuestions = quz::where('categories_id', $reworkCategory->id)->get();

        if ($reworkQuestions->isEmpty()) {
            $this->command->error('No questions found for Rework! Please run QuzSeeder first.');
            return;
        }

        // Define answers for each question
        $molettesQuestionAnswers = [
            // Question 1: Quelle est le rôle de Molettes dans le cablage?
            'Quelle est le rôle de Molettes dans le cablage?' => [
                ['text' => 'La protection du cable contre les agression mécanique', 'correct' => true],
                ['text' => 'La fixation du câble avec la voiture', 'correct' => false],
                ['text' => 'Pour la protection contre l\'inflitration des liquides', 'correct' => false],
            ],
            
            // Question 2: Quelles sont les déférents type de Molettes:
            'Quelles sont les déférents type de Molettes:' => [
                ['text' => 'Réglette, soufanou, PVC, passe fil, molette,', 'correct' => false],
                ['text' => 'molette, réglette, soufanou ,soufanou coudé, passe-fil, canal,', 'correct' => true],
                ['text' => 'molette, réglette, funda ,textil, passe-fil, canal,', 'correct' => false],
            ],
            
            // Question 3: Quelles sont les matériels et les moyens utilisée dans le poste de Molettes :
            'Quelles sont les matériels et les moyens utilisée dans le poste de Molettes :' => [
                ['text' => 'Tableau de montage,Pistolet, analyseur, imprimante', 'correct' => false],
                ['text' => 'Rob,Tableau de montage,les outils de retouche,Pistolet, imprimante', 'correct' => true],
                ['text' => 'les relais,Tableau de montage,les fusibles ,Pistolet, imprimante', 'correct' => false],
            ],
            
            // Question 4: Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?
            'Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?' => [
                ['text' => 'Chaque jour avant le début du travail', 'correct' => true],
                ['text' => 'Une fois par semaine', 'correct' => false],
                ['text' => 'Seulement quand il y a un problème', 'correct' => false],
            ],
            
            // Question 5: Quelle est la documentation utilisée dans votre poste de travail?
            'Quelle est la documentation utilisée dans votre poste de travail?' => [
                ['text' => 'mode Opératoire, check-liste de maintenence 1er niveau, les aides visuels,Sos', 'correct' => true],
                ['text' => 'Feuille de prise de donnée; la fiche technique, mode Opératoire,étiquette,', 'correct' => false],
                ['text' => 'Check-liste de maintenence 1er niveau, les aides visuels; suivi de production chaque 2 heures', 'correct' => false],
            ],
            
            // Question 6: Choisir la définition exacte du <<Mode Opératoire>> :
            'Choisir la définition exacte du <<Mode Opératoire>> :' => [
                ['text' => 'C\'est la fiche technique d\'une chaîne de mantage', 'correct' => false],
                ['text' => 'C\'est un document qui définit les opérations des opérateurs dans le poste de travail', 'correct' => true],
                ['text' => 'C\'est une Aide visuelle pour le poste d\'encliquitage', 'correct' => false],
            ],
            
            // Question 7: Choisir la définition exacte du <<Aide Visuelle>> :
            'Choisir la définition exacte du <<Aide Visuelle>> :' => [
                ['text' => 'C\'est le mode opératoire du poste', 'correct' => false],
                ['text' => 'C\'est le check-liste de maintenance premier niveau', 'correct' => false],
                ['text' => 'C\'est un document qui donne des informations visuelle sur la qualité d\'un état ou produit', 'correct' => true],
            ],
            
            // Question 8: La définition exacte de la politique de qualité est :
            'La définition exacte de la politique de qualité est :' => [
                ['text' => 'Satisfaire les besoins du client en minimisant les coûts de la qualité', 'correct' => false],
                ['text' => 'Satisfaire les besoins du client avec 0 défaut et dépasser ses attentes', 'correct' => true],
                ['text' => 'Etre exegents avec les fournisseurs pour assurer la qualité du produit', 'correct' => false],
            ],
            
            // Question 9: La définition exacte de la politique d'environnement:
            'La définition exacte de la politique d\'environnement:' => [
                ['text' => 'La protection de la santé du personnel,Le respet de l\'ordre et propreté du poste de travail,La séparation des déchets et le traitement du résidus toxique', 'correct' => true],
                ['text' => 'Le respet de l\'ordre et propreté du poste de travail', 'correct' => false],
                ['text' => 'La séparation des déchets et le traitement du résidus toxique', 'correct' => false],
            ],
            
            // Question 10: Cocher les trois consignes de sécurité:
            'Cocher les trois consignes de sécurité:' => [
                ['text' => 'Interdit le port des bijoux ,interdit de macher le chwingum,interdit de porter les casquettes', 'correct' => true],
                ['text' => 'Interdit de manger ,interdit de porter les chaussures fermé,le port des bijoux obligatoir', 'correct' => false],
                ['text' => 'Interdit le port des bijoux ,acher le chwingum obligatoire ,interdit de porter les casquettes', 'correct' => false],
            ],
            
            // Question 11: Citer les 5S?
            'Citer les 5S?' => [
                ['text' => 'Débarasser; ranger nettoyer, ordre,rigeur', 'correct' => true],
                ['text' => 'Débarasser;Jouer, ranger nettoyer, ordre,enrubannage', 'correct' => false],
                ['text' => 'Courir, ranger, nettoyer, ordre,enrubannage', 'correct' => false],
            ],
            
            // Question 12: Cocher les Valeurs d'APTIV:
            'Cocher les Valeurs d\'APTIV:' => [
                ['text' => 'Jouer pour gagner, ,penser et agir en entrepreneur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', 'correct' => false],
                ['text' => 'Jouer pour gagner, une équipe ,penser et agir en entrepreneur, Agir avec le sens de l\'urgence, vouloir atteindre ses objectifs,,agir avec respet', 'correct' => true],
                ['text' => 'Jouer pour gagner, penser et agir comme un joueur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', 'correct' => false],
            ],
        ];

        // Define answers for Contrôle Électrique questions
        $controleElectriqueQuestionAnswers = [
            // Question 1: Quelle est le rôle de Molettes dans le cablage?
            'Quelle est le rôle de Molettes dans le cablage?' => [
                ['text' => 'La protection du cable contre les agression mécanique', 'correct' => true],
                ['text' => 'La fixation du câble avec la voiture', 'correct' => false],
                ['text' => 'Pour la protection contre l\'inflitration des liquides', 'correct' => false],
            ],
            
            // Question 2: Quelles sont les déférents type de Molettes:
            'Quelles sont les déférents type de Molettes:' => [
                ['text' => 'Réglette, soufanou, PVC, passe fil, molette,', 'correct' => false],
                ['text' => 'molette, réglette, soufanou ,soufanou coudé, passe-fil, canal,', 'correct' => true],
                ['text' => 'molette, réglette, funda ,textil, passe-fil, canal,', 'correct' => false],
            ],
            
            // Question 3: Quelles sont les matériels et les moyens utilisée dans le poste de Molettes :
            'Quelles sont les matériels et les moyens utilisée dans le poste de Molettes :' => [
                ['text' => 'Tableau de montage,Pistolet, analyseur, imprimante', 'correct' => false],
                ['text' => 'Rob,Tableau de montage,les outils de retouche,Pistolet, imprimante', 'correct' => true],
                ['text' => 'les relais,Tableau de montage,les fusibles ,Pistolet, imprimante', 'correct' => false],
            ],
            
            // Question 4: Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?
            'Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?' => [
                ['text' => 'Chaque jour avant le début du travail', 'correct' => true],
                ['text' => 'Une fois par semaine', 'correct' => false],
                ['text' => 'Seulement en cas de problème', 'correct' => false],
            ],
            
            // Question 5: Quelle est la documentation utilisée dans votre poste de travail?
            'Quelle est la documentation utilisée dans votre poste de travail?' => [
                ['text' => 'mode Opératoire, check-liste de maintenence 1er niveau, les aides visuels,Sos', 'correct' => true],
                ['text' => 'Feuille de prise de donnée; la fiche technique, mode Opératoire,étiquette,', 'correct' => false],
                ['text' => 'Check-liste de maintenence 1er niveau, les aides visuels; suivi de production chaque 2 heures', 'correct' => false],
            ],
            
            // Question 6: Choisir la définition exacte du <<Mode Opératoire>> :
            'Choisir la définition exacte du <<Mode Opératoire>> :' => [
                ['text' => 'C\'est la fiche technique d\'une chaîne de mantage', 'correct' => false],
                ['text' => 'C\'est un document qui définit les opérations des opérateurs dans le poste de travail', 'correct' => true],
                ['text' => 'C\'est une Aide visuelle pour le poste d\'encliquitage', 'correct' => false],
            ],
            
            // Question 7: Choisir la définition exacte du <<Aide Visuelle>> :
            'Choisir la définition exacte du <<Aide Visuelle>> :' => [
                ['text' => 'C\'est le mode opératoire du poste', 'correct' => false],
                ['text' => 'C\'est le check-liste de maintenance premier niveau', 'correct' => false],
                ['text' => 'C\'est un document qui donne des informations visuelle sur la qualité d\'un état ou produit', 'correct' => true],
            ],
            
            // Question 8: La définition exacte de la politique de qualité est :
            'La définition exacte de la politique de qualité est :' => [
                ['text' => 'Satisfaire les besoins du client en minimisant les coûts de la qualité', 'correct' => false],
                ['text' => 'Satisfaire les besoins du client avec 0 défaut et dépasser ses attentes', 'correct' => true],
                ['text' => 'Etre exegents avec les fournisseurs pour assurer la qualité du produit', 'correct' => false],
            ],
            
            // Question 9: La définition exacte de la politique d'environnement:
            'La définition exacte de la politique d\'environnement:' => [
                ['text' => 'La protection de la santé du personnel,Le respet de l\'ordre et propreté du poste de travail,La séparation des déchets et le traitement du résidus toxique', 'correct' => true],
                ['text' => 'Le respet de l\'ordre et propreté du poste de travail', 'correct' => false],
                ['text' => 'La séparation des déchets et le traitement du résidus toxique', 'correct' => false],
            ],
            
            // Question 10: Cocher les trois consignes de sécurité:
            'Cocher les trois consignes de sécurité:' => [
                ['text' => 'Interdit le port des bijoux ,interdit de macher le chwingum,interdit de porter les casquettes', 'correct' => true],
                ['text' => 'Interdit de manger ,interdit de porter les chaussures fermé,le port des bijoux obligatoir', 'correct' => false],
                ['text' => 'Interdit le port des bijoux ,acher le chwingum obligatoire ,interdit de porter les casquettes', 'correct' => false],
            ],
            
            // Question 11: Citer les 5S?
            'Citer les 5S?' => [
                ['text' => 'Débarasser; ranger nettoyer, ordre,rigeur', 'correct' => true],
                ['text' => 'Débarasser;Jouer, ranger nettoyer, ordre,enrubannage', 'correct' => false],
                ['text' => 'Courir, ranger, nettoyer, ordre,enrubannage', 'correct' => false],
            ],
            
            // Question 12: Cocher les Valeurs d'APTIV:
            'Cocher les Valeurs d\'APTIV:' => [
                ['text' => 'Jouer pour gagner, ,penser et agir en entrepreneur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', 'correct' => false],
                ['text' => 'Jouer pour gagner, une équipe ,penser et agir en entrepreneur, Agir avec le sens de l\'urgence, vouloir atteindre ses objectifs,,agir avec respet', 'correct' => true],
                ['text' => 'Jouer pour gagner, penser et agir comme un joueur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', 'correct' => false],
            ],

            // Contrôle Électrique Questions
            // Question 1: Qu'il est le rôle de contrôle électrique
            'Qu\'il est le rôle de contrôle électrique' => [
                ['text' => 'Fil endommagé,Inversion,manque fil', 'correct' => true],
                ['text' => 'Inversion,enrubanage NOK, Manque fil', 'correct' => false],
            ],

            // Question 2: L'opérateur de contrôle électrique a le droit de réparer:
            'L\'opérateur de contrôle électrique a le droit de réparer:' => [
                ['text' => 'Tuyaux endommagés,fil court,inversion', 'correct' => false],
                ['text' => 'Fil court,manque fil,sertissage NOK', 'correct' => false],
                ['text' => 'Inversion,désencliquetage', 'correct' => true],
            ],

            // Question 3: La lecture de l'étiquette de manifeste est :
            'La lecture de l\'étiquette de manifeste est :' => [
                ['text' => 'Obligatoire', 'correct' => true],
                ['text' => 'Non nécessaire', 'correct' => false],
                ['text' => 'Chaque heure', 'correct' => false],
            ],

            // Question 4: La garantie du bon fonctionnement du cablâge est:
            'La garantie du bon fonctionnement du cablâge est:' => [
                ['text' => 'Etiquette de contrôle électrique', 'correct' => true],
                ['text' => 'Cotes OK', 'correct' => false],
                ['text' => 'Etiquette d\'auto-refus', 'correct' => false],
            ],

            // Question 5: Au moment de la lecture de l'étiquette de contrôle électrique, celle-ci doit être:
            'Au moment de la lecture de l\'étiquette de contrôle électrique, celle-ci doit être:' => [
                ['text' => 'Dans l\'imprimante', 'correct' => false],
                ['text' => 'Fixer sur le cablâge', 'correct' => true],
                ['text' => 'Dans les mains', 'correct' => false],
            ],

            // Question 6: Le nettoyage des bancs électrique est:
            'Le nettoyage des bancs électrique est:' => [
                ['text' => 'Obligatoire', 'correct' => true],
                ['text' => 'Non nécessaire', 'correct' => false],
                ['text' => 'Obligatoire & Non nécessaire', 'correct' => false],
            ],
        ];

        // Define answers for Contrôle Goulotte questions
        $gouloTteQuestionAnswers = [
            // Question 1: Le rôle de la goulotte est:
            'Le rôle de la goulotte est:' => [
                ['text' => 'Positionnement et fixation du cable dans la carosserie', 'correct' => true],
                ['text' => 'Protection des fils contre les agressions mécanique', 'correct' => false],
                ['text' => 'Protection contre l\'infiltration des liquides', 'correct' => false],
            ],
            
            // Question 2: L'étiquette de contrôle goulotte garanti?
            'L\'étiquette de contrôle goulotte garanti?' => [
                ['text' => 'La présence des connecteurs', 'correct' => false],
                ['text' => 'Les Côtes OK', 'correct' => false],
                ['text' => 'La présence et la conférmité de la goulotte et les éléments de fixation', 'correct' => true],
            ],
            
            // Question 3: La table de montage de goulotte assure:
            'La table de montage de goulotte assure:' => [
                ['text' => 'L\'orientation des dérivations', 'correct' => true],
                ['text' => 'La continuité Electrique', 'correct' => false],
                ['text' => 'L\'orintation des attaches', 'correct' => false],
            ],
            
            // Question 4: La garantie du bon fonctionnement du cablâge est:
            'La garantie du bon fonctionnement du cablâge est:' => [
                ['text' => 'Etiquette côntrole électrique', 'correct' => false],
                ['text' => 'Etiquette côntrole goulotte', 'correct' => true],
                ['text' => 'Etiquette côntrole molette', 'correct' => false],
            ],
            
            // Question 5: L'étiquette de contrôle de goulotte contient les informations suivantes:
            'L\'étiquette de contrôle de goulotte contient les informations suivantes:' => [
                ['text' => 'Matricule du contremaître,niveau,code barre', 'correct' => false],
                ['text' => 'Les options,numéro de kit', 'correct' => false],
                ['text' => 'Matricule,référence, niveau, la date, le code barre', 'correct' => true],
            ],
        ];

        // Define answers for Emballage questions
        $emballageQuestionAnswers = [
            // Question 1: Quel est le rôle d'emballage?
            'Quel est le rôle d\'emballage?' => [
                ['text' => 'la protection de câblage contre l\'inflitration des liquides', 'correct' => false],
                ['text' => 'la protection de câblage contre les endommagements des différents composants et le chevauchement des dérivations', 'correct' => true],
                ['text' => 'la protection de câblagecontre les inversions', 'correct' => false],
            ],
            
            // Question 2: Quelle est l'utilité du Label Management ?
            'Quelle est l\'utilité du Label Management ?' => [
                ['text' => 'Assurer un comptage manuel de câblage,eviter le désencliquetage des fils', 'correct' => false],
                ['text' => 'Assurer un comptage automatiquede câblage, eviter les mélanges de références, les identifications erronées', 'correct' => true],
                ['text' => 'Assurer un comptage automatiquede câblage, eviter les mélanges des connecteurs,', 'correct' => false],
            ],
            
            // Question 3: Pour placer une palette "in wait" l'opérateur doit lire :
            'Pour placer une palette "in wait" l\'opérateur doit lire :' => [
                ['text' => 'Etiquette côntrole électrique', 'correct' => false],
                ['text' => 'Code barre de "Palette in wait".', 'correct' => true],
                ['text' => 'Etiquette côntrole molette', 'correct' => false],
            ],
            
            // Question 4: Quelles sont les types des etiquettes utilisés dans le poste d'emballage:
            'Quelles sont les types des etiquettes utilisés dans le poste d\'emballage:' => [
                ['text' => 'Etiquette galia, Etiquette de contrôle électrique,Etiquette de contrôle vissage', 'correct' => false],
                ['text' => 'Etiquette galia, Etiquette Box complette,Etiquette close palette,Etiquette palette inwait', 'correct' => true],
                ['text' => 'Etiquette galia, Etiquette Box complette,Etiquette fusible et relais', 'correct' => false],
            ],
            
            // Question 5: Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?
            'Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?' => [
                ['text' => 'Chaque jour avant le début du travail', 'correct' => true],
                ['text' => 'Une fois par semaine', 'correct' => false],
                ['text' => 'Seulement en cas de problème', 'correct' => false],
            ],
        ];

        // Define answers for Epissure UCAB questions
        $epissureUCABQuestionAnswers = [
            // Question 1: Donner la définition d'une épissure UCAB:
            'Donner la définition d\'une épissure UCAB:' => [
                ['text' => 'L\'union de plusieurs fils avec un contact', 'correct' => false],
                ['text' => 'L\'union de plusieurs fils à travers une agrafe', 'correct' => true],
                ['text' => 'L\'union d\'un fil avac un contact', 'correct' => false],
            ],
            
            // Question 2: Quels sont les composants nécessaires pour réaliser une épissure?
            'Quels sont les composants nécessaires pour réaliser une épissure?' => [
                ['text' => 'L\'agrafe, le pistolet, et les fils', 'correct' => true],
                ['text' => 'L\'agrafe, le pistolet,les connecteurs', 'correct' => false],
                ['text' => 'l\'agrafe, la machine de soudage', 'correct' => false],
            ],
            
            // Question 3: Citer les caractéristique de la qualité d'une épissure:
            'Citer les caractéristique de la qualité d\'une épissure:' => [
                ['text' => 'Agrafe centré, présence de la forme en cloche,Présence des pics et des bravures', 'correct' => true],
                ['text' => 'Agrafe décentrée, présence de la forme en cloche,PVC sous l\'agrafe,Présence des pics et des bravures', 'correct' => false],
                ['text' => 'Agrafe centré,Filaments en dehors de l\'agrefe,présence de la forme en cloche.', 'correct' => false],
            ],
            
            // Question 4: Pourquoi on isole l'épissure?
            'Pourquoi on isole l\'épissure?' => [
                ['text' => 'Pour éviter les courts circuits', 'correct' => true],
                ['text' => 'Pour fixer les fils', 'correct' => false],
                ['text' => 'Pour assurer l\'étanchéité', 'correct' => false],
            ],
            
            // Question 5: Quelle sont les types d'isolation d'une épissure?
            'Quelle sont les types d\'isolation d\'une épissure?' => [
                ['text' => 'Ruban PVC', 'correct' => false],
                ['text' => 'Ruban Textile', 'correct' => false],
                ['text' => 'Funda', 'correct' => true],
            ],
            
            // Question 6: Le rôle du splice contrôleur est?
            'Le rôle du splice contrôleur est?' => [
                ['text' => 'Contrôler la hauteur de l\'épissure', 'correct' => false],
                ['text' => 'Contrôler les critères visuels de la qualité de l\'épissure', 'correct' => true],
                ['text' => 'Contrôler la force d\'arrachement', 'correct' => false],
            ],
        ];

        // Define answers for Expander Machine questions
        $expanderMachineQuestionAnswers = [
            // Question 1: Qu'il est le rôle de l'expander machine
            'Qu\'il est le rôle de l\'expander machine' => [
                ['text' => 'Permet d\'ouvrir les connecteurs', 'correct' => false],
                ['text' => 'Permet d\'ouvrir la passe fils et l\'enfiler sur le câble', 'correct' => true],
                ['text' => 'Permet d\'ouvrir la passe fils et les terminaux', 'correct' => false],
            ],
            
            // Question 2: Classer les étapes des opértions effectuer sur l'expander machine:
            'Classer les étapes des opértions effectuer sur l\'expander machine:' => [
                ['text' => '2 Enfiler la passe fils sur les fourches jusqu\'à que les fourches ouvres', 'correct' => false],
                ['text' => '1 Mettre la passe fils sur la contre pièce métallique', 'correct' => true],
                ['text' => '3 Enfiler la passe fils sur le câble et fermer la pince et retirer la passe fils', 'correct' => false],
            ],
        ];

        // Define answers for Led System questions
        $ledSystemQuestionAnswers = [
            // Question 1: Quelle est l'utilité Du Led System?
            'Quelle est l\'utilité Du Led System?' => [
                ['text' => 'Prévention des fils noirs et torsion inversée', 'correct' => false],
                ['text' => 'Eviter les mélanges de références, les identifications erronées….', 'correct' => true],
                ['text' => 'Prévention des fils multicouleur et torsion inversée', 'correct' => false],
            ],
            
            // Question 2: Classer les étapes des opérations Led System:
            'Classer les étapes des opérations Led System:' => [
                ['text' => '3 Brancher Le Terminal Dans Les Bonne Cavités et Libérer La Continuité Par Le Programme Et Redémarrer Avec Un Autre Terminal', 'correct' => false],
                ['text' => '2 Toucher Le Terminal Dans La Zone De Sonde et fixer le terminal dans La Cavité Où La Lumière s\'est allumée', 'correct' => false],
                ['text' => '1 Insérer LED Connecteur Dans Le Support et Insérer Tous Les Connecteurs Ayant Une Continuité Avec Le Connecteur LED', 'correct' => true],
            ],
            
            // Question 3: Quels sont les fonctions du Led System?
            'Quels sont les fonctions du Led System?' => [
                ['text' => 'Système De Guidage Pour Brancher Le Terminal Pas À Pas', 'correct' => true],
                ['text' => 'Permettre Une Vérification Du Contrôle Électrique Après Le Branchement', 'correct' => false],
                ['text' => 'Prévention Des Fils Noirs Et Torsion Inversée', 'correct' => false],
            ],
        ];

        // Define answers for Outpining Machine questions
        $outpiningMachineQuestionAnswers = [
            // Question 1: Quel est le rôle de processus outpining:
            'Quel est le rôle de processus outpining:' => [
                ['text' => 'le processus d\'encliquitage des terminaux dans le connecteur électrique selon la spécification désignée', 'correct' => false],
                ['text' => 'le processus de rupture des trous pour les broches dans le connecteur électrique selon la spécification désignée', 'correct' => true],
                ['text' => 'le processus de soudage des trous pour les broches dans le connecteur électrique selon la spécification désignée', 'correct' => false],
            ],
            
            // Question 2: Classer les étapes de processus outpining:
            'Classer les étapes de processus outpining:' => [
                ['text' => '2 Prend le connecteur de la boîte, vérifier la qualité avec l\'œil des connecteurs traités et iInsérez les connecteurs dans les supports et assurez-vous qu\'au moins une lumière passe au rouge', 'correct' => false],
                ['text' => '1 Allumer la machine,connectez-vous en tant qu\'utilisateur approprié et scannez l\'ordre de fabrication', 'correct' => true],
                ['text' => '3 Appuyez sur le bouton vert (start), pour que la table puisse ajuster sa position et après le bouton noir (validation) prend les connecteurs traités, mettre les nouveaux connecteurs et appuyez sur le bouton noir (validation)et mettre le Con dans la boite definit.', 'correct' => false],
            ],
        ];

        // Define answers for Réparation questions
        $reparationQuestionAnswers = [
            // Question 1: Donner la définition de la"Réparation":
            'Donner la définition de la"Réparation":' => [
                ['text' => 'C\'est la correction des défaults de soudage', 'correct' => false],
                ['text' => 'C\'est le processus de correction des anomalies détectées au cours de la production afin de répondre aux exigences du client.', 'correct' => true],
                ['text' => 'C\'est la correction des défaults détectée sur le terminal', 'correct' => false],
            ],
            
            // Question 2: La Réparation est:
            'La Réparation est:' => [
                ['text' => 'Un processus Normal', 'correct' => false],
                ['text' => 'Une forme de perte qu\'il faut éviter', 'correct' => true],
                ['text' => 'Une forme de perte qu\'il ne le faut pas éviter', 'correct' => false],
            ],
            
            // Question 3: Que Répare-t-on?
            'Que Répare-t-on?' => [
                ['text' => 'les inversions', 'correct' => false],
                ['text' => 'désencliquitage des terminaux', 'correct' => false],
                ['text' => 'Toutes les anomalies', 'correct' => true],
            ],
            
            // Question 4: L'opérateur de réparation doit être?
            'L\'opérateur de réparation doit être?' => [
                ['text' => 'Qualifié seulement sur la réparation', 'correct' => false],
                ['text' => 'Qualifié sur le process ultra-sonic', 'correct' => false],
                ['text' => 'Qualifié sur tous les processus d\'assemblage', 'correct' => true],
            ],
            
            // Question 5: Comment répare-t-on?
            'Comment répare-t-on?' => [
                ['text' => 'Selon le mode opératoire', 'correct' => false],
                ['text' => 'Selon le mode de réparation', 'correct' => true],
                ['text' => 'Par Expérience', 'correct' => false],
            ],
            
            // Question 6: Comment se fait le choix et la manipulation des outils de retouche?
            'Comment se fait le choix et la manipulation des outils de retouche?' => [
                ['text' => 'Selon la forme de connecteur', 'correct' => false],
                ['text' => 'Suivant l\'aide visuelle', 'correct' => true],
                ['text' => 'Suivant le type de terminal', 'correct' => false],
            ],
            
            // Question 7: Le cablâge à réparer doit être identifié par:
            'Le cablâge à réparer doit être identifié par:' => [
                ['text' => 'Etiquette Auto-refus', 'correct' => false],
                ['text' => 'Etiquette Auto-refus+etiquitte rouge', 'correct' => true],
                ['text' => 'Etiquette Auto-refus+ Etiquette de Contrôle Electrique', 'correct' => false],
            ],
        ];

        // Define answers for Réparation ROB questions
        $reparationROBQuestionAnswers = [
            // Question 1: Cocher la définition exacte de la réparation:
            'Cocher la définition exacte de la réparation:' => [
                ['text' => 'C\'est le processus de localisation des défaults sur le câblage au cours de la production .', 'correct' => false],
                ['text' => 'C\'est le processus de correction des anomalies détectées au cours de la production afin de répondre aux exigences du client', 'correct' => true],
                ['text' => 'C\'est le processus de détection des anomalies au cours de la production afin de répondre aux exigences du client', 'correct' => false],
            ],
            
            // Question 2: La réparation est une forme :
            'La réparation est une forme :' => [
                ['text' => 'de création de la valeur a jouté', 'correct' => false],
                ['text' => 'de perte qu\'il faut éviter', 'correct' => true],
                ['text' => 'de perte qu\'il faut l\'assurer', 'correct' => false],
            ],
            
            // Question 3: L'opérateur de répartion de ROB a le droit de réparer:
            'L\'opérateur de répartion de ROB a le droit de réparer:' => [
                ['text' => 'Tuyaux endommagés,fil court,inversion', 'correct' => false],
                ['text' => 'Fil court,manque fil,sertissage NOK', 'correct' => false],
                ['text' => 'Inversion,désencliquetage', 'correct' => true],
            ],
            
            // Question 4: Les Outils de Retouche sont définis par :
            'Les Outils de Retouche sont définis par :' => [
                ['text' => 'le département d\'ingénierie et validés par le département qualité selon la préconisation de chaque connecteur', 'correct' => true],
                ['text' => 'le département de coupe et validés par le département maintenance selon la préconisation de chaque connecteur', 'correct' => false],
                ['text' => 'le département d\'ingénierie et validés par le département achat selon la préconisation de chaque connecteur', 'correct' => false],
            ],
            
            // Question 5: A chaque retouche effectuée sur les connecteurs SIGMA il faut :
            'A chaque retouche effectuée sur les connecteurs SIGMA il faut :' => [
                ['text' => 'Réparer le connecteur', 'correct' => false],
                ['text' => 'Changer le connecteur', 'correct' => true],
                ['text' => 'Casser le connecteur', 'correct' => false],
            ],
            
            // Question 6: L'étiquette d'auto refus doit être complétée par :
            'L\'étiquette d\'auto refus doit être complétée par :' => [
                ['text' => 'Le réparateur,le contremaître et technicien ingénierie.', 'correct' => true],
                ['text' => 'Le réparateur,le contremaître et l\'auditeur.', 'correct' => false],
                ['text' => 'Le réparateur,technicien maintenance et l\'auditeur.', 'correct' => false],
            ],
        ];

        // Define answers for Ring Terminal questions
        $ringTerminalQuestionAnswers = [
            // Question 1: Donner la définition d'un Ring Terminal ?
            'Donner la définition d\'un Ring Terminal ?' => [
                ['text' => 'L\'union de plusieurs fils avec un contact', 'correct' => false],
                ['text' => 'Le soudage de plusieurs fils avec un contact grâce à une énergie vibratoire', 'correct' => false],
                ['text' => 'L\'union d\'un fil avec un contact', 'correct' => true],
            ],
            
            // Question 2: Quels sont les composants nécessaires pour réaliser un Ring Terminal?
            'Quels sont les composants nécessaires pour réaliser un Ring Terminal?' => [
                ['text' => 'L\'agrafe, le pistolet', 'correct' => false],
                ['text' => 'L\'agrafe, le pistolet etles connecteurs', 'correct' => false],
                ['text' => 'L\'outil de soudage, les fils, un contact', 'correct' => true],
            ],
            
            // Question 3: Citer les caractéristiques de qualité d'un Ring Terminal ?
            'Citer les caractéristiques de qualité d\'un Ring Terminal ?' => [
                ['text' => 'Zone de Soudage Centrée sur le contact , les filaments non Soudés doivent être visible entre le PVC et la zone de soudage', 'correct' => true],
                ['text' => 'Filaments alignés sur la zone finale du Soudage, Présence de 7 sillons', 'correct' => false],
                ['text' => 'Les Griffes du PVC pliées correctement', 'correct' => false],
            ],
            
            // Question 4: Classer les étapes de soudage Ring Terminal:
            'Classer les étapes de soudage Ring Terminal:' => [
                ['text' => '2 Taper sur la pédale pour la première fois a fin de fixer le terminal sur l\'enclume', 'correct' => false],
                ['text' => '1 Choisir la configuration convenable en utilisant le contrôleur et placer le terminal sur l\'enclume .', 'correct' => true],
                ['text' => '3 Insérer les fils en respectant le positionnement des fils et Taper une deuxième fois sur la pédale pour effectuer le sertissage', 'correct' => false],
            ],
        ];

        // Define answers for Sealing questions
        $sealingQuestionAnswers = [
            // Question 1: Quel est le rôle de l'isolation par tube rétractable ?
            'Quel est le rôle de l\'isolation par tube rétractable ?' => [
                ['text' => 'Fixez les fils en un point du câblage', 'correct' => false],
                ['text' => 'Garantir le serrage aux points spécifiques du harnais', 'correct' => false],
                ['text' => 'Il garantit l\'étanchéité à l\'eau, évitant la production de courts-circuits et assure la résistance mécanique', 'correct' => true],
            ],
            
            // Question 2: Quel type d'appareil pouvons-nous utiliser pour l'isolation des épissures ?
            'Quel type d\'appareil pouvons-nous utiliser pour l\'isolation des épissures ?' => [
                ['text' => 'Cela n\'a pas d\'importance, car l\'épissure est bien isolée', 'correct' => false],
                ['text' => 'Uniquement les machines de rétraction "Raychem"', 'correct' => false],
                ['text' => 'Celui indiqué sur les instructions de travail', 'correct' => true],
            ],
            
            // Question 3: Avant d'isoler une épissure, nous devons :
            'Avant d\'isoler une épissure, nous devons :' => [
                ['text' => '« Peignez » les brins sortant de l\'épissure sans casser l\'isolant', 'correct' => false],
                ['text' => 'Vérifiez la qualité de l\'épissure et « peignez » les brins sortant de l\'épissure', 'correct' => true],
            ],
            
            // Question 4: En quoi consiste le contrôle d'une épissure ?
            'En quoi consiste le contrôle d\'une épissure ?' => [
                ['text' => 'Contrôle visuel de toutes les caractéristiques de l\'épissure prête à être isolée', 'correct' => true],
                ['text' => 'Pliez l\'épissure', 'correct' => false],
                ['text' => 'Vérification de l\'état des lettres d\'épissure', 'correct' => false],
                ['text' => 'Inspection visuelle des fils isolants', 'correct' => false],
            ],
            
            // Question 5: Quel type d'isolation devons-nous réaliser pour chaque épissure ?
            'Quel type d\'isolation devons-nous réaliser pour chaque épissure ?' => [
                ['text' => 'Un aussi grand que possible pour bien fermer l\'épissure', 'correct' => false],
                ['text' => 'Celui indiqué dans les instructions de travail', 'correct' => true],
                ['text' => 'Celui utilisé avec la fréquence la plus élevée', 'correct' => false],
            ],
            
            // Question 6: Le tube d'isolement doit être :
            'Le tube d\'isolement doit être :' => [
                ['text' => 'À l\'extrémité de l\'épissure', 'correct' => false],
                ['text' => 'Parfaitement centré', 'correct' => true],
                ['text' => 'De toute façon, ça n\'a pas d\'importance, ce n\'est pas trop visible', 'correct' => false],
            ],
            
            // Question 7: Quelles peuvent être les conséquences d'une épissure mal isolée ?
            'Quelles peuvent être les conséquences d\'une épissure mal isolée ?' => [
                ['text' => 'Augmenter la vitesse de la voiture', 'correct' => false],
                ['text' => 'À l\'extrémité de l\'épissure', 'correct' => false],
                ['text' => 'Court-circuit sur le faisceau de câbles de la voiture', 'correct' => true],
                ['text' => 'Manque de contacts électriques', 'correct' => false],
            ],
            
            // Question 8: Si l'isolation des fils est brûlée pendant le temps de rétraction, nous devons :
            'Si l\'isolation des fils est brûlée pendant le temps de rétraction, nous devons :' => [
                ['text' => 'Nous arrêtons et rejetons les fils à isoler', 'correct' => true],
                ['text' => 'On pourrait les utiliser s\'ils n\'étaient pas mauvais en fumée', 'correct' => false],
                ['text' => 'Les fils brûlés peuvent être utilisés dans des conditions exceptionnelles', 'correct' => false],
            ],
            
            // Question 9: L'utilisation de gants dans le processus de rétraction est :
            'L\'utilisation de gants dans le processus de rétraction est :' => [
                ['text' => 'Obligatoire', 'correct' => true],
                ['text' => 'Facultatif', 'correct' => false],
                ['text' => 'L\'utilisation de gants implique un manque de compétence', 'correct' => false],
            ],
            
            // Question 10: Que devons-nous faire avant d'allumer l'appareil Shrinking ?
            'Que devons-nous faire avant d\'allumer l\'appareil Shrinking ?' => [
                ['text' => 'Nous appuyons avec précaution sur les boutons de l\'appareil', 'correct' => false],
                ['text' => 'Nous veillons à ce qu\'il n\'y ait aucun risque d\'accident dans la zone de rétrécissement', 'correct' => true],
                ['text' => 'Nous veillons à ne pas mettre nos doigts dans la zone de rétraction', 'correct' => false],
            ],
            
            // Question 11: Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et
            'Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et' => [
                ['text' => 'Au début de chaque quart de travail', 'correct' => true],
                ['text' => 'À la fin du quart de travail', 'correct' => false],
                ['text' => 'Pendant le quart de travail', 'correct' => false],
            ],
            
            // Question 12: Quel type de machine représente la figure
            'Quel type de machine représente la figure' => [
                ['text' => 'Machine de rétraction Raychem', 'correct' => true],
                ['text' => 'Machine à sertir Raychem', 'correct' => false],
                ['text' => 'Une imprimante Raychem', 'correct' => false],
                ['text' => 'Aucun réponse', 'correct' => false],
            ],
            
            // Question 13: D'après la figure 1, quel type d'informations collectons-nous sur les compteurs A et B ?
            'D\'après la figure 1, quel type d\'informations collectons-nous sur les compteurs A et B ?' => [
                ['text' => 'A- Programme défini B- Horaire', 'correct' => false],
                ['text' => 'A - La température réglée selon le programme défini B- Evolution du Temps et temps réglé pour', 'correct' => true],
            ],
            
            // Question 14: Selon le Non Conformance Board, veuillez identifier le problème de l'isolation A ?
            'Selon le Non Conformance Board, veuillez identifier le problème de l\'isolation A ?' => [
                ['text' => 'Le tube est surchauffé', 'correct' => false],
                ['text' => 'Le noyau de l\'épissure ou le noyau du fil est exposé', 'correct' => false],
                ['text' => 'la pépite d\'épissure est à moins de 10,0 mm de l\'extrémité du tube', 'correct' => true],
            ],
            
            // Question 15: Conformément au Comité de non-conformité, veuillez identifier le problème de l'isolation B ?
            'Conformément au Comité de non-conformité, veuillez identifier le problème de l\'isolation B ?' => [
                ['text' => 'Le tube est surchauffé (changement de surface et de couleur du tube)', 'correct' => true],
                ['text' => 'L\'épissure est sur le tube', 'correct' => false],
                ['text' => 'Le tube est cool (change de couleur)', 'correct' => false],
            ],
            
            // Question 16: Selon le Non Conformance Board, veuillez identifier le problème de l'isolation C ?
            'Selon le Non Conformance Board, veuillez identifier le problème de l\'isolation C ?' => [
                ['text' => 'Le tube est surchauffé (changement de surface et de couleur du tube)', 'correct' => false],
                ['text' => 'Les fils sont surchauffés (l\'isolation des fils a fondu)', 'correct' => true],
                ['text' => 'Le brin pénètre dans le tube et ressort sur le côté extérieur (perce)', 'correct' => false],
            ],
            
            // Question 17: Conformément au Non Conformance Board, veuillez identifier le problème de l'isolation D ?
            'Conformément au Non Conformance Board, veuillez identifier le problème de l\'isolation D ?' => [
                ['text' => 'Le tube est surchauffé (changement de surface et de couleur du tube)', 'correct' => false],
                ['text' => 'Les fils sont surchauffés (l\'isolation des fils a fondu)', 'correct' => false],
                ['text' => 'Le brin pénètre dans le tube et ressort sur le côté extérieur (perce)', 'correct' => true],
                ['text' => 'la pépite d\'épissure ou le noyau du fil est exposé', 'correct' => true],
            ],
            
            // Question 18: Selon le Non Conformance Board, veuillez identifier le problème de l'isolation E ?
            'Selon le Non Conformance Board, veuillez identifier le problème de l\'isolation E ?' => [
                ['text' => 'la pépite d\'épissure est à moins de 10,0 mm de l\'extrémité du tube', 'correct' => true],
                ['text' => 'Les fils sont surchauffés (l\'isolation des fils a fondu)', 'correct' => false],
                ['text' => 'L\'extrémité du tube est évasée (tube/adhésif séparé du fil)', 'correct' => true],
                ['text' => 'L\'extrémité du tube est avec la colle', 'correct' => false],
            ],
            
            // Question 19: Selon le Non Conformance Board, veuillez identifier le problème de l'isolation F ?
            'Selon le Non Conformance Board, veuillez identifier le problème de l\'isolation F ?' => [
                ['text' => 'Problème non spécifié dans la question', 'correct' => true],
            ],
        ];

        // Define answers for Térostat questions
        $terostateQuestionAnswers = [
            // Question 1: Quel est le rôle de Térostat?
            'Quel est le rôle de Térostat?' => [
                ['text' => 'la protection de câblage contre l\'inflitration des liquides', 'correct' => false],
                ['text' => 'la protection de câblage contre les endommagements des différents composants et le chevauchement des dérivations', 'correct' => true],
                ['text' => 'la protection de câblage contre les inversions', 'correct' => false],
            ],
            
            // Question 2: Quelles sont les conséquences de l'omission ou la mauvaise application du térostat?
            'Quelles sont les conséquences de l\'omission ou la mauvaise application du térostat?' => [
                ['text' => 'Assurer l\'étanchéité', 'correct' => false],
                ['text' => 'Infiltration des liquides', 'correct' => true],
                ['text' => 'Perte de l\'étanchéité', 'correct' => true],
            ],
            
            // Question 3: Quelles sont Les critères de qualité de l'application du Térostat ?
            'Quelles sont Les critères de qualité de l\'application du Térostat ?' => [
                ['text' => '4 tours d\'enrubannage (2 fois dans les 2 sens),Passe-fil bien placé et la surface d\'étanchéité coîncide avec la zone d\'application du Térostat,', 'correct' => true],
                ['text' => 'La zone d\'étanchéité n\'est pas définie,Zone du Térostat n\'est pas centrée,Le passe-fil doit être fixé sur la branche avec du ruban', 'correct' => false],
                ['text' => 'Le passe-fil doit être fixé sur la branche avec du ruban,Les fils et le passe-fil ne doivent pas être endommagés', 'correct' => false],
            ],
            
            // Question 4: Classer les étapes d'application du térostat
            'Classer les étapes d\'application du térostat' => [
                ['text' => '2 Il faut bien séparer les fils pour appliquer le TEROSTAT et combler tous les vides entre les fils et Appliquer le TEROSTAT entre les fils d\'une manière homogène et s\'assurer que tous les fils sont bien réunis par la matière afin de garantir une étanchéité maximale', 'correct' => false],
                ['text' => '1 Positionner le passe-fil dans sa contre-pièce sur le tableau ou sur l\'outil défini de montage pour localiser la zone d\'application du Térostat, et faire une fixation avec le ruban PVC de chaque côté de la zone d\'application du Térostat (zone d\'étanchéité).', 'correct' => true],
                ['text' => '3 Enrouler le TEROSTAT de façon à ce que la matière pénètre entre tous les fils, ensuite faire un enrubannage continu 2 fois dans les 2 sens (c\'est à dire 4 couches de PVC). Couvrir la partie impliquée dans le TEROSTAT à l\'aide de ruban PVC tout en enrubannant les deux extrémités des fils : l\'enrubannage doit se faire deux fois dans les deux sen, et Fixer l\'extrémité droite du Passe- fil avec le ruban PVC, continuer l\'enrubannage de la dérivation. L\'enrubannage doit être continu, serré et sans plis', 'correct' => false],
            ],
        ];

        // Define answers for Vision Machine questions
        $visionMachineQuestionAnswers = [
            'Choisir le rôle exacte d\'un relais est:' => [
                ['text' => 'Un composant électrique qui permit de changer l\'état d\'un circuit électrique.', 'correct' => true],
                ['text' => 'Un composant qui assure la continuité électrique.', 'correct' => false],
                ['text' => 'Un composant qui assure manque fil .', 'correct' => false],
            ],
            'Choisir le rôle exacte d\'un fusible:' => [
                ['text' => 'Un composant qui assure les Invertions.', 'correct' => false],
                ['text' => 'Un composant qui permit la protection d\'un circuit électrique.', 'correct' => true],
                ['text' => 'Un composant qui évite la continuité électrique.', 'correct' => false],
            ],
            'La garantie de l\'existence et la conformité des relais et des fusibles c\'est:' => [
                ['text' => 'L\'étiquette de contôle électrique', 'correct' => false],
                ['text' => 'L\'étiquette de contôle de relais et fusible', 'correct' => true],
                ['text' => 'L\'étiquette d\'auto-refus', 'correct' => false],
            ],
        ];

        // Define answers for Vissage questions
        $vissageQuestionAnswers = [
            // Question 1: Donner la définition de vissage ?
            'Donner la définition de vissage ?' => [
                ['text' => 'Le processus de vissage consiste à assembler des connecteurs sur les contres pièces.', 'correct' => true],
                ['text' => 'Le processus de vissage consiste à assembler des cosses sur des boitiers .', 'correct' => false],
                ['text' => 'Le processus de vissage consiste à assurer la continuté éléctrique de câble.', 'correct' => false],
            ],
            
            // Question 2: Quels sont les composants nécessaires pour réaliser un vissage?
            'Quels sont les composants nécessaires pour réaliser un vissage?' => [
                ['text' => 'Coffret de vissage, Bras de vissage ,Contre pièce de vissage, Imprimante ,Clavier, Vis ,Ecrou.', 'correct' => true],
                ['text' => 'Coffret de vissage, outil de sertissage ,Contre pièce de vissage, Imprimante ,Clavier, Vis ,Ecrou.', 'correct' => false],
                ['text' => 'Coffret de vissage, comparateur ,Contre pièce de vissage, dynamomètre ,Clavier, Vis ,Ecrou.', 'correct' => false],
            ],
            
            // Question 3: Citer les caractéristiques de qualité de vissage?
            'Citer les caractéristiques de qualité de vissage?' => [
                ['text' => 'toutes les cosses sont vissées et le couple de serrage atteint la valeur demandé', 'correct' => true],
                ['text' => 'toutes les cosses sont mal vissées,et le couple de serrage atteint la valeur demandé', 'correct' => false],
                ['text' => 'toutes les cosses sont vissées et le couple de serrage n\'atteint pas la valeur demandé', 'correct' => false],
            ],
            
            // Question 4: Quels sont les types des outils utiliser pour le vissage
            'Quels sont les types des outils utiliser pour le vissage' => [
                ['text' => 'Les outils M5,M7,M8', 'correct' => false],
                ['text' => 'Les outils M5,M6,M8', 'correct' => true],
                ['text' => 'Les outils M9,M7,M8', 'correct' => false],
            ],
            
            // Question 5: Qu'il est le rôle de clavier POSCO:
            'Qu\'il est le rôle de clavier POSCO:' => [
                ['text' => 'Le clavier POSCO permet de contrôler la séquence de vissage et la position des connecteurs.', 'correct' => false],
                ['text' => 'Le clavier POSCO permet de contrôler la séquence de vissage. Il récupère l\'information des capteurs de position linéaire et angulaire et vérifie la position à visser dans le boitier et ne donne le droit de visser que si le bras de vissage se trouve sur la bonne position.', 'correct' => true],
                ['text' => 'Le clavier POSCO permet de contrôler la séquence sertissage et la position des terminaux.', 'correct' => false],
            ],
        ];

        // Define answers for Workman Machine questions
        $workmanMachineQuestionAnswers = [
            // Question 1: Quel est le rôle de test workmane machine?
            'Quel est le rôle de test workmane machine?' => [
                ['text' => 'Chauffage des terminaux', 'correct' => false],
                ['text' => 'Chauffage des connecteurs', 'correct' => false],
                ['text' => 'Chauffage de la housse', 'correct' => true],
            ],
            
            // Question 2: Quelle est la spécialité de la configuration de la machine workmane ?
            'Quelle est la spécialité de la configuration de la machine workmane ?' => [
                ['text' => 'Temps et Température programmable et ajustement de position de la Housse', 'correct' => true],
                ['text' => 'Temps et Température programmable', 'correct' => false],
                ['text' => 'Ajustement de position de la Housse', 'correct' => false],
            ],
            
            // Question 3: Cocher les critères de la qualité de la housse :
            'Cocher les critères de la qualité de la housse :' => [
                ['text' => 'Aucun filament n\'est visible,housse bien fermée ,présence de la résine,Housse centrée', 'correct' => true],
                ['text' => 'Tous filament est visible,housse bien fermée ,présence de la résine,Housse centrée', 'correct' => false],
                ['text' => 'Aucun filament n\'est visible,housse ouverte ,présence de la résine,Housse centrée', 'correct' => false],
            ],
        ];

        // Define answers for Rework questions
        $reworkQuestionAnswers = [
            // Question 1: Quels sont les différents types de contrôle?
            'Quels sont les différents types de contrôle?' => [
                ['text' => 'Mécanique', 'correct' => true],
                ['text' => 'Systématique et automatique', 'correct' => true],
                ['text' => 'Humain/visuel', 'correct' => true],
            ],
            
            // Question 2: Qui ce que représente les différents types de contrôle effectués sur le câblage :
            'Qui ce que représente les différents types de contrôle effectués sur le câblage :' => [
                ['text' => 'Représentent un danger sur le bon fonctionnement et sur de la bonne qualité de notre produit.', 'correct' => false],
                ['text' => 'Représentent une assurance de le bon fonctionnement et de la bonne qualité de notre produit.', 'correct' => true],
                ['text' => 'Représentent une assurance de la mauvais fonctionnement et de la bonne qualité de notre produit.', 'correct' => false],
            ],
            
            // Question 3: Qui assure le super contôle:
            'Qui assure le super contôle:' => [
                ['text' => 'Assure la vérification automatique du câblage ainsi que le montage de toutes les dérivations du câblage sur le tableau de montage.', 'correct' => true],
                ['text' => 'Assure la vérification visuelle du câblage ainsi que le montage de toutes les dérivations du câblage sur le tableau de montage.', 'correct' => false],
                ['text' => 'Assure la vérification visuelle du câblage ainsi que le montage de toutes les terminaux sur les connecteurs.', 'correct' => false],
            ],
            
            // Question 4: Qui assure Le contrôle de contention :
            'Qui assure Le contrôle de contention :' => [
                ['text' => 'Ce type de contrôle représente un contrôle final visuel et dimensionnel du câblage suivant des points à contrôler définis par l\'ingénieur de qualité', 'correct' => true],
                ['text' => 'Ce type de contrôle représente un contrôle final visuel et dimensionnel du câblage suivant des points à contrôler définis par l\'ingénieur de produit', 'correct' => false],
                ['text' => 'Ce type de contrôle représente un contrôle systématique du câblage suivant des points à contrôler définis par l\'ingénieur de qualité', 'correct' => false],
            ],
            
            // Question 5: Qui assure Le Firewall :
            'Qui assure Le Firewall :' => [
                ['text' => 'Pour menacer le client des réclamations répétitives et évaluer l\'efficacité des différents filtres de notre processus .', 'correct' => false],
                ['text' => 'Pour protéger le client des réclamations répétitives et évaluer l\'efficacité des différents filtres de notre processus .', 'correct' => true],
                ['text' => 'Pour protéger le client des inversions des fils et évaluer l\'efficacité des différents filtres de notre processus .', 'correct' => false],
            ],
        ];

        $totalAnswers = 0;

        // Process Molettes questions
        foreach ($molettesQuestions as $question) {
            $questionText = $question->question_text;
            
            if (isset($molettesQuestionAnswers[$questionText])) {
                foreach ($molettesQuestionAnswers[$questionText] as $answerData) {
                    repo::create([
                        'answer_text' => $answerData['text'],
                        'quz_id' => $question->id,
                        'is_correct' => $answerData['correct'],
                    ]);
                    $totalAnswers++;
                }
            }
        }

        // Process Contrôle Électrique questions
        foreach ($controleElectriqueQuestions as $question) {
            $questionText = $question->question_text;
            
            // Check first in controleElectriqueQuestionAnswers, then in molettesQuestionAnswers for shared questions
            $answers = null;
            if (isset($controleElectriqueQuestionAnswers[$questionText])) {
                $answers = $controleElectriqueQuestionAnswers[$questionText];
            } elseif (isset($molettesQuestionAnswers[$questionText])) {
                $answers = $molettesQuestionAnswers[$questionText];
            }
            
            if ($answers) {
                foreach ($answers as $answerData) {
                    repo::create([
                        'answer_text' => $answerData['text'],
                        'quz_id' => $question->id,
                        'is_correct' => $answerData['correct'],
                    ]);
                    $totalAnswers++;
                }
            }
        }

        // Process Contrôle Goulotte questions
        foreach ($gouloTteQuestions as $question) {
            $questionText = $question->question_text;
            
            // Check first in gouloTteQuestionAnswers, then in molettesQuestionAnswers for shared questions
            $answers = null;
            if (isset($gouloTteQuestionAnswers[$questionText])) {
                $answers = $gouloTteQuestionAnswers[$questionText];
            } elseif (isset($molettesQuestionAnswers[$questionText])) {
                $answers = $molettesQuestionAnswers[$questionText];
            }
            
            if ($answers) {
                foreach ($answers as $answerData) {
                    repo::create([
                        'answer_text' => $answerData['text'],
                        'quz_id' => $question->id,
                        'is_correct' => $answerData['correct'],
                    ]);
                    $totalAnswers++;
                }
            }
        }

        // Process Emballage questions
        foreach ($emballageQuestions as $question) {
            $questionText = $question->question_text;
            
            // Check first in emballageQuestionAnswers, then in molettesQuestionAnswers for shared questions
            $answers = null;
            if (isset($emballageQuestionAnswers[$questionText])) {
                $answers = $emballageQuestionAnswers[$questionText];
            } elseif (isset($molettesQuestionAnswers[$questionText])) {
                $answers = $molettesQuestionAnswers[$questionText];
            }
            
            if ($answers) {
                foreach ($answers as $answerData) {
                    repo::create([
                        'answer_text' => $answerData['text'],
                        'quz_id' => $question->id,
                        'is_correct' => $answerData['correct'],
                    ]);
                    $totalAnswers++;
                }
            }
        }

        // Process Epissure UCAB questions
        foreach ($epissureUCABQuestions as $question) {
            $questionText = $question->question_text;
            
            // Check first in epissureUCABQuestionAnswers, then in molettesQuestionAnswers for shared questions
            $answers = null;
            if (isset($epissureUCABQuestionAnswers[$questionText])) {
                $answers = $epissureUCABQuestionAnswers[$questionText];
            } elseif (isset($molettesQuestionAnswers[$questionText])) {
                $answers = $molettesQuestionAnswers[$questionText];
            }
            
            if ($answers) {
                foreach ($answers as $answerData) {
                    repo::create([
                        'answer_text' => $answerData['text'],
                        'quz_id' => $question->id,
                        'is_correct' => $answerData['correct'],
                    ]);
                    $totalAnswers++;
                }
            }
        }

        // Process Expander Machine questions
        foreach ($expanderMachineQuestions as $question) {
            $questionText = $question->question_text;
            
            // Check first in expanderMachineQuestionAnswers, then in molettesQuestionAnswers for shared questions
            $answers = null;
            if (isset($expanderMachineQuestionAnswers[$questionText])) {
                $answers = $expanderMachineQuestionAnswers[$questionText];
            } elseif (isset($molettesQuestionAnswers[$questionText])) {
                $answers = $molettesQuestionAnswers[$questionText];
            }
            
            if ($answers) {
                foreach ($answers as $answerData) {
                    repo::create([
                        'answer_text' => $answerData['text'],
                        'quz_id' => $question->id,
                        'is_correct' => $answerData['correct'],
                    ]);
                    $totalAnswers++;
                }
            }
        }

        // Process Led System questions
        foreach ($ledSystemQuestions as $question) {
            $questionText = $question->question_text;
            
            // Check first in ledSystemQuestionAnswers, then in molettesQuestionAnswers for shared questions
            $answers = null;
            if (isset($ledSystemQuestionAnswers[$questionText])) {
                $answers = $ledSystemQuestionAnswers[$questionText];
            } elseif (isset($molettesQuestionAnswers[$questionText])) {
                $answers = $molettesQuestionAnswers[$questionText];
            }
            
            if ($answers) {
                foreach ($answers as $answerData) {
                    repo::create([
                        'answer_text' => $answerData['text'],
                        'quz_id' => $question->id,
                        'is_correct' => $answerData['correct'],
                    ]);
                    $totalAnswers++;
                }
            }
        }

        // Process Outpining Machine questions
        foreach ($outpiningMachineQuestions as $question) {
            $questionText = $question->question_text;
            
            // Check first in outpiningMachineQuestionAnswers, then in molettesQuestionAnswers for shared questions
            $answers = null;
            if (isset($outpiningMachineQuestionAnswers[$questionText])) {
                $answers = $outpiningMachineQuestionAnswers[$questionText];
            } elseif (isset($molettesQuestionAnswers[$questionText])) {
                $answers = $molettesQuestionAnswers[$questionText];
            }
            
            if ($answers) {
                foreach ($answers as $answerData) {
                    repo::create([
                        'answer_text' => $answerData['text'],
                        'quz_id' => $question->id,
                        'is_correct' => $answerData['correct'],
                    ]);
                    $totalAnswers++;
                }
            }
        }

        // Process Réparation questions
        foreach ($reparationQuestions as $question) {
            $questionText = $question->question_text;
            
            // Check first in reparationQuestionAnswers, then in molettesQuestionAnswers for shared questions
            $answers = null;
            if (isset($reparationQuestionAnswers[$questionText])) {
                $answers = $reparationQuestionAnswers[$questionText];
            } elseif (isset($molettesQuestionAnswers[$questionText])) {
                $answers = $molettesQuestionAnswers[$questionText];
            }
            
            if ($answers) {
                foreach ($answers as $answerData) {
                    repo::create([
                        'answer_text' => $answerData['text'],
                        'quz_id' => $question->id,
                        'is_correct' => $answerData['correct'],
                    ]);
                    $totalAnswers++;
                }
            }
        }

        // Process Réparation ROB questions
        foreach ($reparationROBQuestions as $question) {
            $questionText = $question->question_text;
            
            // Check first in reparationROBQuestionAnswers, then in molettesQuestionAnswers for shared questions
            $answers = null;
            if (isset($reparationROBQuestionAnswers[$questionText])) {
                $answers = $reparationROBQuestionAnswers[$questionText];
            } elseif (isset($molettesQuestionAnswers[$questionText])) {
                $answers = $molettesQuestionAnswers[$questionText];
            }
            
            if ($answers) {
                foreach ($answers as $answerData) {
                    repo::create([
                        'answer_text' => $answerData['text'],
                        'quz_id' => $question->id,
                        'is_correct' => $answerData['correct'],
                    ]);
                    $totalAnswers++;
                }
            }
        }

        // Process Ring Terminal questions
        foreach ($ringTerminalQuestions as $question) {
            $questionText = $question->question_text;
            
            // Check first in ringTerminalQuestionAnswers, then in molettesQuestionAnswers for shared questions
            $answers = null;
            if (isset($ringTerminalQuestionAnswers[$questionText])) {
                $answers = $ringTerminalQuestionAnswers[$questionText];
            } elseif (isset($molettesQuestionAnswers[$questionText])) {
                $answers = $molettesQuestionAnswers[$questionText];
            }
            
            if ($answers) {
                foreach ($answers as $answerData) {
                    repo::create([
                        'answer_text' => $answerData['text'],
                        'quz_id' => $question->id,
                        'is_correct' => $answerData['correct'],
                    ]);
                    $totalAnswers++;
                }
            }
        }

        // Process Sealing questions
        foreach ($sealingQuestions as $question) {
            $questionText = $question->question_text;
            
            // Check first in sealingQuestionAnswers, then in molettesQuestionAnswers for shared questions
            $answers = null;
            if (isset($sealingQuestionAnswers[$questionText])) {
                $answers = $sealingQuestionAnswers[$questionText];
            } elseif (isset($molettesQuestionAnswers[$questionText])) {
                $answers = $molettesQuestionAnswers[$questionText];
            }
            
            if ($answers) {
                foreach ($answers as $answerData) {
                    repo::create([
                        'answer_text' => $answerData['text'],
                        'quz_id' => $question->id,
                        'is_correct' => $answerData['correct'],
                    ]);
                    $totalAnswers++;
                }
            }
        }

        // Process Térostat questions
        foreach ($terostateQuestions as $question) {
            $questionText = $question->question_text;
            
            // Check first in terostateQuestionAnswers, then in molettesQuestionAnswers for shared questions
            $answers = null;
            if (isset($terostateQuestionAnswers[$questionText])) {
                $answers = $terostateQuestionAnswers[$questionText];
            } elseif (isset($molettesQuestionAnswers[$questionText])) {
                $answers = $molettesQuestionAnswers[$questionText];
            }
            
            if ($answers) {
                foreach ($answers as $answerData) {
                    repo::create([
                        'answer_text' => $answerData['text'],
                        'quz_id' => $question->id,
                        'is_correct' => $answerData['correct'],
                    ]);
                    $totalAnswers++;
                }
            }
        }

        // Process Vision Machine questions
        foreach ($visionMachineQuestions as $question) {
            $questionText = $question->question_text;
            
            // Check first in visionMachineQuestionAnswers, then in molettesQuestionAnswers for shared questions
            $answers = null;
            if (isset($visionMachineQuestionAnswers[$questionText])) {
                $answers = $visionMachineQuestionAnswers[$questionText];
            } elseif (isset($molettesQuestionAnswers[$questionText])) {
                $answers = $molettesQuestionAnswers[$questionText];
            }
            
            if ($answers) {
                foreach ($answers as $answerData) {
                    repo::create([
                        'answer_text' => $answerData['text'],
                        'quz_id' => $question->id,
                        'is_correct' => $answerData['correct'],
                    ]);
                    $totalAnswers++;
                }
            }
        }

        // Process Vissage questions
        foreach ($vissageQuestions as $question) {
            $questionText = $question->question_text;
            
            // Check first in vissageQuestionAnswers, then in molettesQuestionAnswers for shared questions
            $answers = null;
            if (isset($vissageQuestionAnswers[$questionText])) {
                $answers = $vissageQuestionAnswers[$questionText];
            } elseif (isset($molettesQuestionAnswers[$questionText])) {
                $answers = $molettesQuestionAnswers[$questionText];
            }
            
            if ($answers) {
                foreach ($answers as $answerData) {
                    repo::create([
                        'answer_text' => $answerData['text'],
                        'quz_id' => $question->id,
                        'is_correct' => $answerData['correct'],
                    ]);
                    $totalAnswers++;
                }
            }
        }

        // Process Workman Machine questions
        foreach ($workmanMachineQuestions as $question) {
            $questionText = $question->question_text;
            
            // Check first in workmanMachineQuestionAnswers, then in molettesQuestionAnswers for shared questions
            $answers = null;
            if (isset($workmanMachineQuestionAnswers[$questionText])) {
                $answers = $workmanMachineQuestionAnswers[$questionText];
            } elseif (isset($molettesQuestionAnswers[$questionText])) {
                $answers = $molettesQuestionAnswers[$questionText];
            }
            
            if ($answers) {
                foreach ($answers as $answerData) {
                    repo::create([
                        'answer_text' => $answerData['text'],
                        'quz_id' => $question->id,
                        'is_correct' => $answerData['correct'],
                    ]);
                    $totalAnswers++;
                }
            }
        }

        // Process Rework questions
        foreach ($reworkQuestions as $question) {
            $questionText = $question->question_text;
            
            // Check first in reworkQuestionAnswers, then in molettesQuestionAnswers for shared questions
            $answers = null;
            if (isset($reworkQuestionAnswers[$questionText])) {
                $answers = $reworkQuestionAnswers[$questionText];
            } elseif (isset($molettesQuestionAnswers[$questionText])) {
                $answers = $molettesQuestionAnswers[$questionText];
            }
            
            if ($answers) {
                foreach ($answers as $answerData) {
                    repo::create([
                        'answer_text' => $answerData['text'],
                        'quz_id' => $question->id,
                        'is_correct' => $answerData['correct'],
                    ]);
                    $totalAnswers++;
                }
            }
        }

        $this->command->info('Created ' . $totalAnswers . ' answers for all categories: Contrôle Molettes, Contrôle Électrique, Contrôle Goulotte, Emballage, Epissure UCAB, Expander Machine, Sysème Led, Outpining Machine, Réparation, Réparation ROB, Ring terminal, Sealing, Térostat, Vision Machine, Vissage, Workman Machine, and Rework');
    }
}