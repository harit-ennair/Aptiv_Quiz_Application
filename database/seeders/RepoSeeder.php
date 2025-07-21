<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\repo;
use App\Models\quz;
use App\Models\categories;
use Illuminate\Support\Facades\DB;

class RepoSeeder extends Seeder
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
        $contentionId = DB::table('categories')->where('title', 'Contention')->value('id');
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

        // Komax 433 answers
        $this->seedKomax433Answers();
        
        // Komax 477 answers
        $this->seedKomax477Answers();
        
        // Komax 550 answers
        $this->seedKomax550Answers();
        
        // Seal Paoumat / Komax answers
        $this->seedSealPaoumatAnswers();
        
        // Sertissage answers
        $this->seedSertissageAnswers();
        
        // Kabatec answers
        $this->seedKabatecAnswers();
        
        // Beri.Co.Cut answers
        $this->seedBeriCoCutAnswers();
        
        // Beri.Co.Cut.V3 answers
        $this->seedBeriCoCutV3Answers();
        
        // BT 752/BT 722 answers
        $this->seedBT752BT722Answers();
        
        // Contention answers
        $this->seedContentionAnswers();
        
        // Coupe des Tuyaux answers
        $this->seedCoupeTuyauxAnswers();
        
        // Kappa 350 answers
        $this->seedKappa350Answers();
        
        // Mangueras answers
        $this->seedManguerasAnswers();
        
        // Schleuniger Dénudage answers
        $this->seedSchleunigerDenudageAnswers();
        
        // S. Crimping answers
        $this->seedSCrimpingAnswers();
        
        // Torsado/BT 188 answers
        $this->seedTorsadoBt188Answers();
        
        // Workman Machine answers
        $this->seedWorkmanMachineAnswers();
        
        // Expander Machine answers
        $this->seedExpanderMachineAnswers();
    }

    /**
     * Seed answers for Komax 433 questions
     */
    private function seedKomax433Answers(): void
    {
        // Get questions for Komax 433
        $questions = DB::table('quzs')
            ->join('categories', 'quzs.categories_id', '=', 'categories.id')
            ->where('categories.title', 'Komax 433')
            ->select('quzs.*')
            ->get();
            
        // Define answers for each question
        $answers = [
            // Question 1: La komax 433 est une machine de
            [
                ['Sertissage  automatique évolutive avec des stations d\'usinage individuelles', true],
                ['Injection automatique évolutive avec des stations d\'usinage individuelles', false],
                ['Dressage des fils automatique évolutive avec des stations d\'usinage individuelles', false],
            ],
            // Question 2: La Komax 433 est destinée aux applications suivantes
            [
                ['Coupe zéro,Dénudage deux coté avec semi extraction et dénudage avec extraction total ,Sertissage de deux extrémités , application des seals', true],
                ['Dénudage deux coté avec semi extraction', false],
                ['Sertissage de deux extrémités ,', false],
            ],
            // Question 3: Combien de station d'usinage dans la machine Komax 433
            [
                ['trois stations', false],
                ['Entre deux et trois stations', true],
                ['Cinq stations', false],
            ],
            // Question 4: Cocher les normes de qualité d'un sertissage
            [
                ['Hauteur conforme à la table pré-contrôle et pésence du pic et guide et bavure,Tous les filament à l\'interieur des griffes de l\'âme', true],
                ['Tous les filament à l\'éxterieur des griffes de l\'âme', false],
                ['80% de filamens et 50% de PVC visible dans la fenêtre de sertissage', false],
            ],
            // Question 5: Selon la figure 1 la lettre A c'est
            [
                ['Champ de commande', true],
                ['Champ d\'alimentation', false],
                ['Champ d\'usinage', false],
            ],
            // Question 6: Selon la figure 1 la lettre B c'est
            [
                ['Champ de commande', false],
                ['Champ d\'alimentation', true],
                ['Champ d\'usinage', false],
            ],
            // Question 7: Selon la figure 1 la lettre C c'est
            [
                ['Champ de commande', false],
                ['Champ d\'alimentation', false],
                ['Champ d\'usinage', true],
            ],
            // Question 8: Selon la figure 2 c'est
            [
                ['C\'est la touche de redresement du câble', false],
                ['C\'est l\' Interrupteur de la machine', false],
                ['C\'est la touche d\'assentiment', true],
            ],
            // Question 9: Coche les moyens de mesure et de contrôle utilisés
            [
                ['Comparateur, souffleur,la loupe, l\'échelle métrique, la règle graduée', false],
                ['Comparateur, dynamomètre,la loupe, l\'échelle métrique, la règle graduée', true],
                ['Comparateur, dynamomètre,la loupe, les poinçons, la règle graduée', false],
            ],
            // Question 10: Quelle est la longueur defini sur la plage de longeur de la machine komax 433
            [
                ['Entre 75 mm et 75 m', true],
                ['Entre 65 mm et 65 m', false],
                ['Entre 55 mm et 55 m', false],
            ],
            // Question 11: Quelle est la section des fils defini sur la machine komax 433
            [
                ['Entre 0.35 mm2 et 4 mm2', true],
                ['Entre 0.45 mm2 et 5 mm2', false],
                ['Entre 0.65 mm2 et 6 mm2', false],
            ],
            // Question 12: Quelle est la section des fils defini sur la machine komax 433? (Duplicate)
            [
                ['Entre 0.35 mm2 et 4 mm2', true],
                ['Entre 0.45 mm2 et 5 mm2', false],
                ['Entre 0.55 mm2 et 6 mm2', false],
            ],
            // Question 13: Selon la figure 3 le n° A c'est
            [
                ['Le tachymètre', true],
                ['L \'Arrêt d\'urgence', false],
                ['La touche d\'enfilement manuelle', false],
            ],
            // Question 14: Selon la figure 3 le n° B c'est
            [
                ['La couroit', true],
                ['L \'Arrêt d\'urgence', false],
                ['La touche d\'enfilement manuelle', false],
            ],
            // Question 15: Selon la figure 3 le n° C c'est
            [
                ['La touche d\'enfilement manuelle', false],
                ['L \'Arrêt d\'urgence', true],
                ['Le tachymètre', false],
            ],
            // Question 16: Selon la figure 3 le n° D c'est
            [
                ['Le tachymètre', false],
                ['La couroit', false],
                ['La touche d\'enfilement manuelle', true],
            ],
            // Question 17: L'opération du réglage de sertissage est nécessaire
            [
                ['l\'outil de sertissage,terminal,la section du câble, l\'intervention technique sur l\'outil ou la presse', true],
                ['la section du câble', false],
                ['L\'intervention technique sur l\'outil ou la presse', false],
            ],
            // Question 18: Selon la figure 4 quelle est la valeur nominal de la hauteur Alma
            [
                ['1,99', false],
                ['1,05', true],
                ['1,00', false],
            ],
            // Question 19: Si MC<1 (Monitoring Capacity) quelle est l'action qu'on doit faire
            [
                ['Noter la valeur dans la carte de production et aviser le technicien de maintenance', true],
                ['Noter la valeur dans la carte de production et aviser l\'auditeur de qualité', false],
                ['Noter la valeur dans la carte de production', false],
            ],
            // Question 20: Tubes de guidage (Boukia) Utilisés pour
            [
                ['Pour guider des fils au cours du positionnement, dénudage et  sertissage', true],
                ['Pour guider des fils au cours du découpage, dénudage et  sertissage', false],
                ['Pour guider des fils au cours du découpage, dénudage et  encliquitage', false],
            ],
            // Question 21: Quels sont les systèmes utilisés dans notre organisation
            [
                ['Système FIFO & PULL', true],
                ['Système LIFO', false],
                ['Système PULL', false],
            ],
            // Question 22: C'est quoi le systéme FIFO
            [
                ['Premier sorti ,premier entré', false],
                ['Premier entré, premier sorti', true],
                ['Aucune réponse', false],
            ],
            // Question 23: Quand les interventions de maintenance de 1er niveau
            [
                ['Au début de chaque quart de travail', true],
                ['À la fin du quart de travail', false],
                ['Pendant le quart de travail', false],
            ],
            // Question 24: Quelle est la documentation utilisée dans votre poste de travail
            [
                ['Feuille de prise de donnée,mode Opératoire, check-liste de maintenence 1er niveau, les aides visuels,Sos, FTQ', true],
                ['Feuille de prise de donnée; la fiche technique, mode Opératoire,étiquette,', false],
                ['Check-liste de maintenence 1er niveau, les aides visuels; suivi de production chaque 2 heures', false],
            ],
            // Question 25: Choisir la définition exacte du Mode Opératoire
            [
                ['C\'est la fiche technique d\'une chaîne de mantage', false],
                ['C\'est un document qui définit les opérations des opérateurs dans le poste de travail', true],
                ['C\'est une Aide visuelle pour le poste d\'encliquitage', false],
            ],
            // Question 26: Choisir la définition exacte du Aide Visuelle
            [
                ['C\'est le mode opératoire du poste', false],
                ['C\'est le check-liste de maintenance premier niveau', false],
                ['C\'est un document qui donne des informations visuelle sur la qualité d\'un état ou produit', true],
            ],
            // Question 27: La définition exacte de la politique de qualité est
            [
                ['Satisfaire les besoins du client en minimisant les coûts de la qualité', false],
                ['Satisfaire les besoins du client avec 0 défaut et dépaser ses attentes', true],
                ['Etre exegents avec les fournisseurs pour assurer la qualité du produit', false],
            ],
            // Question 28: La définition exacte de la politique d'environnement
            [
                ['La protection de la santé du personnel,Le respet de l\'ordre et propreté du poste de travail,La séparation des déchets  et le traitement du résidus toxique', true],
                ['Le respet de l\'ordre et propreté du poste de travail', false],
                ['La séparation des déchets  et le traitement du résidus toxique', false],
            ],
            // Question 29: Cocher les trois consignes de sécurité
            [
                ['Interdit le port des bijoux ,interdit de macher le chwingum,interdit de porter les casquettes', true],
                ['Interdit de manger ,interdit de porter les chaussures fermé,le port des bijoux obligatoir', false],
                ['Interdit le port des bijoux ,macher le chwingum obligatoire ,interdit de porter les casquettes', false],
            ],
            // Question 30: Citer les 5S
            [
                ['Débarasser; ranger nettoyer, ordre,rigeur', true],
                ['Débarasser;Jouer, ranger nettoyer, ordre,enrubannage', false],
                ['Courir, ranger, nettoyer, ordre,enrubannage', false],
            ],
            // Question 31: Cocher les Valeurs d'APTIV
            [
                ['Jouer pour gagner, ,penser et agir en entrepreneur, Agir avec  retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
                ['Jouer pour gagner, une équipe ,penser et agir en entrepreneur, Agir avec le sens de l\'urgence, vouloir atteindre ses objectifs,,agir avec respet', true],
                ['Jouer pour gagner, penser et agir comme un joueur, Agir avec  retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
            ],
        ];

        // Create all answers
        $i = 0;
        foreach ($questions as $question) {
            if (isset($answers[$i])) {
                foreach ($answers[$i] as $answer) {
                    repo::create([
                        'answer_text' => $answer[0],
                        'quz_id' => $question->id,
                        'is_correct' => $answer[1],
                    ]);
                }
            }
            $i++;
        }

        $this->command->info('Created answers for Komax 433 questions');
    }

    /**
     * Seed answers for Komax 477 questions
     */
    private function seedKomax477Answers(): void
    {
        // Get questions for Komax 477
        $questions = DB::table('quzs')
            ->join('categories', 'quzs.categories_id', '=', 'categories.id')
            ->where('categories.title', 'Komax 477')
            ->select('quzs.*')
            ->get();
            
        // Define answers for each question
        $answers = [
            // Question 1: La komax 477 est une machine de
            [
                ['Sertissage et double sertissage automatique évolutive avec des stations d\'usinage individuelles', true],
                ['Injection automatique évolutive avec des stations d\'usinage individuelles', false],
                ['Dressage des fils automatique évolutive avec des stations d\'usinage individuelles', false],
            ],
            // Question 2: La Komax 477 est destinée aux applications suivantes
            [
                ['Coupe, dénudage. Marquage,Sertissage et double sertissage,fluxage , étamage,Mesure de la longueur,tri des câbles en bon état ou défectueux,tri des câbles par taille de lot et Séquences.', true],
                ['Sertissage et double sertissage,fluxage , étamage.', false],
                ['Mesure de la longueur,tri des câbles en bon état ou défectueux,tri des câbles par taille de lot et Séquences.', false],
            ],
            // Question 3: Combien de station d'usinage dans la machine Komax 477
            [
                ['Trois stations', false],
                ['Entre deux et trois stations', false],
                ['Deux stations', true],
            ],
            // Question 4: Cocher les normes de qualité d'un sertissage
            [
                ['Hauteur conforme à la table pré-contrôle et pésence du pic et guide et bavure,tous les filament à l\'interieur des griffes de l\'âme,50% de filamens et 50% de PVC visible dans la fenêtre de sertissage', true],
                ['Tous les filament à l\'interieur des griffes de l\'âme', false],
                ['50% de filamens et 50% de PVC visible dans la fenêtre de sertissage', false],
            ],
            // Question 5: Selon la figure 1 la lettre A c'est
            [
                ['Champ de commande', true],
                ['Champ d\'alimentation', false],
                ['Champ d\'usinage', false],
            ],
            // Question 6: Selon la figure 1 la lettre B c'est
            [
                ['Champ de commande', false],
                ['Champ d\'alimentation', true],
                ['Champ d\'usinage', false],
            ],
            // Question 7: Selon la figure 1 la lettre C c'est
            [
                ['Champ de commande', false],
                ['Champ d\'alimentation', false],
                ['Champ d\'usinage', true],
            ],
            // Question 8: Quelle est la longueur défini dans la machine komax 477
            [
                ['de 60 à 6500 mm', true],
                ['de 60 à 8000 mm', false],
                ['de 70 à 6500 mm', false],
            ],
            // Question 9: Tubes de guidage (Boukia) Utilisés pour
            [
                ['Pour guider des fils au cours du positionnement, dénudage et  sertissage', true],
                ['Pour guider des fils au cours du découpage, dénudage et  sertissage', false],
                ['Pour guider des fils au cours du découpage, dénudage et  encliquitage', false],
            ],
            // Question 10: L'unité double pince a pour rôle de
            [
                ['Positionner les fils en position de l\'union soit verticale ou horizontale selon la section des fils', true],
                ['Positionner les fils en position de l\'union  horizontale', false],
                ['Positionner les fils en position de l\'union  verticale', false],
            ],
            // Question 11: Quels sont les systèmes utilisés dans notre organisation
            [
                ['Système FIFO', false],
                ['Système LIFO', false],
                ['Système FIFO&PULL', true],
            ],
            // Question 12: C'est quoi le systéme FIFO
            [
                ['Premier sorti ,premier entré', false],
                ['Premier entré, premier sorti', true],
                ['Aucune réponse', false],
            ],
            // Question 13: Quand les interventions de maintenance de 1er niveau
            [
                ['Au début de chaque quart de travail', true],
                ['À la fin du quart de travail', false],
                ['Pendant le quart de travail', false],
            ],
            // Question 14: Quelle est la documentation utilisée dans votre poste de travail
            [
                ['Feuille de prise de donnée,mode Opératoire, check-liste de maintenence 1er niveau, les aides visuels,Sos, FTQ', true],
                ['Feuille de prise de donnée; la fiche technique, mode Opératoire,étiquette,', false],
                ['Check-liste de maintenence 1er niveau, les aides visuels; suivi de production chaque 2 heures', false],
            ],
            // Question 15: Choisir la définition exacte du Mode Opératoire
            [
                ['C\'est la fiche technique d\'une chaîne de mantage', false],
                ['C\'est un document qui définit les opérations des opérateurs dans le poste de travail', true],
                ['C\'est une Aide visuelle pour le poste d\'encliquitage', false],
            ],
            // Question 16: Choisir la définition exacte du Aide Visuelle
            [
                ['C\'est le mode opératoire du poste', false],
                ['C\'est le check-liste de maintenance premier niveau', false],
                ['C\'est un document qui donne des informations visuelle sur la qualité d\'un état ou produit', true],
            ],
            // Question 17: La définition exacte de la politique de qualité est
            [
                ['Satisfaire les besoins du client en minimisant les coûts de la qualité', false],
                ['Satisfaire les besoins du client avec 0 défaut et dépaser ses attentes', true],
                ['Etre exegents avec les fournisseurs pour assurer la qualité du produit', false],
            ],
            // Question 18: La définition exacte de la politique d'environnement
            [
                ['La protection de la santé du personnel,Le respet de l\'ordre et propreté du poste de travail,La séparation des déchets  et le traitement du résidus toxique', true],
                ['Le respet de l\'ordre et propreté du poste de travail', false],
                ['La séparation des déchets  et le traitement du résidus toxique', false],
            ],
            // Question 19: Cocher les trois consignes de sécurité
            [
                ['Interdit le port des bijoux ,interdit de macher le chwingum,interdit de porter les casquettes', true],
                ['Interdit de manger ,interdit de porter les chaussures fermé,le port des bijoux obligatoir', false],
                ['Interdit le port des bijoux ,macher le chwingum obligatoire ,interdit de porter les casquettes', false],
            ],
            // Question 20: Citer les 5S
            [
                ['Débarasser; ranger nettoyer, ordre,rigeur', true],
                ['Débarasser;Jouer, ranger nettoyer, ordre,enrubannage', false],
                ['Courir, ranger, nettoyer, ordre,enrubannage', false],
            ],
            // Question 21: Cocher les Valeurs d'APTIV
            [
                ['Jouer pour gagner, ,penser et agir en entrepreneur, Agir avec  retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
                ['Jouer pour gagner, une équipe ,penser et agir en entrepreneur, Agir avec le sens de l\'urgence, vouloir atteindre ses objectifs,,agir avec respet', true],
                ['Jouer pour gagner, penser et agir comme un joueur, Agir avec  retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
            ],
        ];

        // Create all answers
        $i = 0;
        foreach ($questions as $question) {
            if (isset($answers[$i])) {
                foreach ($answers[$i] as $answer) {
                    repo::create([
                        'answer_text' => $answer[0],
                        'quz_id' => $question->id,
                        'is_correct' => $answer[1],
                    ]);
                }
            }
            $i++;
        }

        $this->command->info('Created answers for Komax 477 questions');
    }

    /**
     * Seed answers for Komax 550 questions
     */
    private function seedKomax550Answers(): void
    {
        // Get questions for Komax 550
        $questions = DB::table('quzs')
            ->join('categories', 'quzs.categories_id', '=', 'categories.id')
            ->where('categories.title', 'Komax 550')
            ->select('quzs.*')
            ->get();
            
        // Define answers for each question
        $answers = [
            // Question 1: La komax 550 est une machine de
            [
                ['Sertissage  automatique évolutive avec des stations d\'usinage individuelles', true],
                ['Injection automatique évolutive avec des stations d\'usinage individuelles', false],
                ['Dressage des fils automatique évolutive avec des stations d\'usinage individuelles', false],
            ],
            // Question 2: La Komax 550 est destinée aux applications suivantes
            [
                ['Coupe zéro,Dénudage deux coté avec semi extraction et dénudage avec extraction total ,Sertissage de deux extrémités', true],
                ['Dénudage deux coté avec semi extraction', false],
                ['Sertissage de deux extrémités ,', false],
            ],
            // Question 3: Combien de station d'usinage dans la machine Komax 550
            [
                ['trois stations', false],
                ['Entre deux et trois stations', false],
                ['Deux stations', true],
            ],
            // Question 4: Cocher les normes de qualité d'un sertissage
            [
                ['Hauteur conforme à la table pré-contrôle et pésence du pic et guide et bavure,Tous les filament à l\'interieur des griffes de l\'âme', true],
                ['Tous les filament à l\'éxterieur des griffes de l\'âme', false],
                ['80% de filamens et 50% de PVC visible dans la fenêtre de sertissage', false],
            ],
            // Question 5: Selon la figure 1 la lettre A c'est
            [
                ['Champ de commande', true],
                ['Champ d\'alimentation', false],
                ['Champ d\'usinage', false],
            ],
            // Question 6: Selon la figure 1 la lettre B c'est
            [
                ['Champ de commande', false],
                ['Champ d\'alimentation', true],
                ['Champ d\'usinage', false],
            ],
            // Question 7: Selon la figure 1 la lettre C c'est
            [
                ['Champ de commande', false],
                ['Champ d\'alimentation', false],
                ['Champ d\'usinage', true],
            ],
            // Question 8: Selon la figure 2 c'est
            [
                ['C\'est la touche de redresement du câble', false],
                ['C\'est l\' Interrupteur de la machine', false],
                ['C\'est la touche d\'assentiment', true],
            ],
            // Question 9: Coche les moyens de mesure et de contrôle utilisés
            [
                ['Comparateur, souffleur,la loupe, l\'échelle métrique, la règle graduée', false],
                ['Comparateur, dynamomètre,la loupe, l\'échelle métrique, la règle graduée', true],
                ['Comparateur, dynamomètre,la loupe, les poinçons, la règle graduée', false],
            ],
            // Question 10: Selon la figure 3 le n° 10 c'est pour
            [
                ['Câble à droite', false],
                ['Câble à retour', true],
                ['Câble à gauche', false],
            ],
            // Question 11: Selon la figure 3 le n° 11 c'est pour
            [
                ['Câble à droite', false],
                ['Câble à retour', false],
                ['Câble à gauche', true],
            ],
            // Question 12: Selon la figure 3 le n° 4 c'est pour
            [
                ['Chariot en haut', true],
                ['Chariot en bas', false],
                ['Chariot arrière', false],
            ],
            // Question 13: Selon la figure 3 le n°5 c'est pour
            [
                ['Chariot en haut', false],
                ['Chariot en bas', true],
                ['Chariot arrière', false],
            ],
            // Question 14: L'opération du réglage de sertissage est nécessaire
            [
                ['l\'outil de sertissage,terminal,la section du câble, l\'intervention technique sur l\'outil ou la presse', true],
                ['la section du câble', false],
                ['L\'intervention technique sur l\'outil ou la presse', false],
            ],
            // Question 15: Selon la figure 4 quelle est la valeur nominal de la hauteur Alma
            [
                ['1,99', false],
                ['1,05', true],
                ['1,00', false],
            ],
            // Question 16: Si MC<1 (Monitoring Capacity) quelle est l'action qu'on doit faire
            [
                ['Noter la valeur dans la carte de production et aviser le technicien de maintenance', true],
                ['Noter la valeur dans la carte de production et aviser l\'auditeur de qualité', false],
                ['Noter la valeur dans la carte de production', false],
            ],
            // Question 17: Tubes de guidage (Boukia) Utilisés pour
            [
                ['Pour guider des fils au cours du positionnement, dénudage et  sertissage', true],
                ['Pour guider des fils au cours du découpage, dénudage et  sertissage', false],
                ['Pour guider des fils au cours du découpage, dénudage et  encliquitage', false],
            ],
            // Question 18: Quels sont les systèmes utilisés dans notre organisation
            [
                ['Système FIFO & PULL', true],
                ['Système LIFO', false],
                ['Système PULL', false],
            ],
            // Question 19: C'est quoi le systéme FIFO
            [
                ['Premier sorti ,premier entré', false],
                ['Premier entré, premier sorti', true],
                ['Aucune réponse', false],
            ],
            // Question 20: Quand les interventions de maintenance de 1er niveau
            [
                ['Au début de chaque quart de travail', true],
                ['À la fin du quart de travail', false],
                ['Pendant le quart de travail', false],
            ],
            // Question 21: Quelle est la documentation utilisée dans votre poste de travail
            [
                ['Feuille de prise de donnée,mode Opératoire, check-liste de maintenence 1er niveau, les aides visuels,Sos, FTQ', true],
                ['Feuille de prise de donnée; la fiche technique, mode Opératoire,étiquette,', false],
                ['Check-liste de maintenence 1er niveau, les aides visuels; suivi de production chaque 2 heures', false],
            ],
            // Question 22: Choisir la définition exacte du Mode Opératoire
            [
                ['C\'est la fiche technique d\'une chaîne de mantage', false],
                ['C\'est un document qui définit les opérations des opérateur dans le poste de travail', true],
                ['C\'est une Aide visuelle pour le poste d\'encliquitage', false],
            ],
            // Question 23: Choisir la définition exacte du Aide Visuelle
            [
                ['C\'est le mode opératoire du poste', false],
                ['C\'est le check-liste de maintenance premier niveau', false],
                ['C\'est un document qui donne des informations visuelle sur la qualité d\'un état ou produit', true],
            ],
            // Question 24: La définition exacte de la politique de qualité est
            [
                ['Satisfaire les besoins du client en minimisant les coûts de la qualité', false],
                ['Satisfaire les besoins du client avec 0 défaut et dépaser ses attentes', true],
                ['Etre exegents avec les fournisseurs pour assurer la qualité du produit', false],
            ],
            // Question 25: La définition exacte de la politique d'environnement
            [
                ['La protection de la santé du personnel,Le respet de l\'ordre et propreté du poste de travail,La séparation des déchets  et le traitement du résidus toxique', true],
                ['Le respet de l\'ordre et propreté du poste de travail', false],
                ['La séparation des déchets  et le traitement du résidus toxique', false],
            ],
            // Question 26: Cocher les trois consignes de sécurité
            [
                ['Interdit le port des bijoux ,interdit de macher le chwingum,interdit de porter les casquettes', true],
                ['Interdit de manger ,interdit de porter les chaussures fermé,le port des bijoux obligatoir', false],
                ['Interdit le port des bijoux ,macher le chwingum obligatoire ,interdit de porter les casquettes', false],
            ],
            // Question 27: Citer les 5S
            [
                ['Débarasser; ranger nettoyer, ordre,rigeur', true],
                ['Débarasser;Jouer, ranger nettoyer, ordre,enrubannage', false],
                ['Courir, ranger, nettoyer, ordre,enrubannage', false],
            ],
            // Question 28: Cocher les Valeurs d'APTIV
            [
                ['Jouer pour gagner, ,penser et agir en entrepreneur, Agir avec  retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
                ['Jouer pour gagner, une équipe ,penser et agir en entrepreneur, Agir avec le sens de l\'urgence, vouloir atteindre ses objectifs,,agir avec respet', true],
                ['Jouer pour gagner, penser et agir comme un joueur, Agir avec  retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
            ],
        ];

        // Create all answers
        $i = 0;
        foreach ($questions as $question) {
            if (isset($answers[$i])) {
                foreach ($answers[$i] as $answer) {
                    repo::create([
                        'answer_text' => $answer[0],
                        'quz_id' => $question->id,
                        'is_correct' => $answer[1],
                    ]);
                }
            }
            $i++;
        }

        $this->command->info('Created answers for Komax 550 questions');
    }

    /**
     * Seed answers for Seal Paoumat / Komax questions
     */
    private function seedSealPaoumatAnswers(): void
    {
        // Get questions for Seal Paoumat / Komax
        $questions = DB::table('quzs')
            ->join('categories', 'quzs.categories_id', '=', 'categories.id')
            ->where('categories.title', 'Seal Paoumat / Komax')
            ->select('quzs.*')
            ->get();
            
        // Define answers for each question
        $answers = [
            // Question 1: Quel est le rôle de seal dans la câble
            [
                ['Assure l\'inflitration des liquides et protège les filaments de la corrosion', false],
                ['Assure l\'étanchéité et protège les terminaux et les filaments de la corrosion.', true],
                ['Assure l\'étanchéité et protège les connecteurs  de la corrosion', false],
            ],
            // Question 2: Les différents types du seal sont définis selon
            [
                ['La section', false],
                ['La conception du câble et selon les caractéristiques du terminal, du connecteur et la section du fil', true],
                ['le connecteur', false],
            ],
            // Question 3: Quels sont les types des applicateurs du seal utlisés dans la machine de coupe
            [
                ['Applicateur komax', false],
                ['Applicateur pawomat', false],
                ['Applicateur komax & Applicateur pawomat', true],
            ],
            // Question 4: Selon la figure 1 N° 1 c'est
            [
                ['Levier de serrage', true],
                ['Unité de commande', false],
                ['Bras de transfère', false],
            ],
            // Question 5: Selon la figure 1 N° 2 c'est
            [
                ['Afficheur', true],
                ['Interrupteur d\'alimentation.', false],
                ['Chariot inferieur de transfère', false],
            ],
            // Question 6: Selon la figure 1 N° 4 c'est
            [
                ['Transporteur aspirant/ soufflant.', true],
                ['Afficheur', false],
                ['Bras de transfère', false],
            ],
            // Question 7: Selon la figure 2 la lettre A c'est
            [
                ['Kit dénudeur (conos)', false],
                ['Pin /doigt de transfère', false],
                ['Tube de montage (bouquille)', true],
            ],
            // Question 8: Selon la figure 2 la lettre B c'est
            [
                ['Kit dénudeur (conos)', false],
                ['Pin /doigt de transfère', true],
                ['Tube de montage (bouquille)', false],
            ],
            // Question 9: Selon la figure 2 la lettre C c'est
            [
                ['Kit dénudeur (conos)', true],
                ['Pin /doigt de transfère', false],
                ['Tube de montage (bouquille)', false],
            ],
            // Question 10: Selon la figure 3 la lettre A c'est
            [
                ['Stripper', true],
                ['Expansion sleeve', false],
                ['Push-on plate', false],
            ],
            // Question 11: Selon la figure 3 la lettre B c'est
            [
                ['Push-on plate', false],
                ['Stripper', false],
                ['Séparateur', true],
            ],
            // Question 12: Selon la figure 3 la lettre C c'est
            [
                ['Push-on plate', true],
                ['Stripper', false],
                ['Séparateur', false],
            ],
            // Question 13: Selon la figure D la lettre A c'est
            [
                ['Stripper', false],
                ['Tourniquet avec 4 pin', true],
                ['Séparateur', false],
            ],
            // Question 14: Selon la figure 3 la lettre E c'est
            [
                ['Stripper', false],
                ['Tourniquet avec 4 pin', false],
                ['Séparateur', true],
            ],
            // Question 15: Cocher les critères de la non qualité du seal
            [
                ['Seal bien positionner', false],
                ['Seal retiré, seal avancé, seal manque,seal endommagé', true],
                ['Griffes de sertissage centrées autour du Seal et fermées de façon uniforme', false],
            ],
            // Question 16: Cocher les critères de qualité du seal
            [
                ['Griffes de sertissage centrées autour du Seal et fermées de façon uniforme,présence du pic sur le terminal côté seal inférieur à 0.25 mm', true],
                ['Seal manque', false],
                ['Seal avancé', false],
            ],
            // Question 17: Quels sont les systèmes utilisés dans notre organisation
            [
                ['Système FIFO & PULL', true],
                ['Système LIFO', false],
                ['Système PULL', false],
            ],
            // Question 18: C'est quoi le systéme FIFO
            [
                ['Premier sorti ,premier entré', false],
                ['Premier entré, premier sorti', true],
                ['Aucune réponse', false],
            ],
            // Question 19: Quand les interventions de maintenance de 1er niveau
            [
                ['Au début de chaque quart de travail', true],
                ['À la fin du quart de travail', false],
                ['Pendant le quart de travail', false],
            ],
            // Question 20: Quelle est la documentation utilisée dans votre poste de travail
            [
                ['Feuille de prise de donnée,mode Opératoire, check-liste de maintenence 1er niveau, les aides visuels,Sos, FTQ', true],
                ['Feuille de prise de donnée; la fiche technique, mode Opératoire,étiquette,', false],
                ['Check-liste de maintenence 1er niveau, les aides visuels; suivi de production chaque 2 heures', false],
            ],
            // Question 21: Choisir la définition exacte du Mode Opératoire
            [
                ['C\'est la fiche technique d\'une chaîne de mantage', false],
                ['C\'est un document qui définit les opérations des opérateur dans le poste de travail', true],
                ['C\'est une Aide visuelle pour le poste d\'encliquitage', false],
            ],
            // Question 22: Choisir la définition exacte du Aide Visuelle
            [
                ['C\'est le mode opératoire du poste', false],
                ['C\'est le check-liste de maintenance premier niveau', false],
                ['C\'est un document qui donne des informations visuelle sur la qualité d\'un état ou produit', true],
            ],
            // Question 23: La définition exacte de la politique de qualité est
            [
                ['Satisfaire les besoins du client en minimisant les coûts de la qualité', false],
                ['Satisfaire les besoins du client avec 0 défaut et dépaser ses attentes', true],
                ['Etre exegents avec les fournisseurs pour assurer la qualité du produit', false],
            ],
            // Question 24: La définition exacte de la politique d'environnement
            [
                ['La protection de la santé du personnel,Le respet de l\'ordre et propreté du poste de travail,La séparation des déchets  et le traitement du résidus toxique', true],
                ['Le respet de l\'ordre et propreté du poste de travail', false],
                ['La séparation des déchets  et le traitement du résidus toxique', false],
            ],
            // Question 25: Cocher les trois consignes de sécurité
            [
                ['Interdit le port des bijoux ,interdit de macher le chwingum,interdit de porter les casquettes', true],
                ['Interdit de manger ,interdit de porter les chaussures fermé,le port des bijoux obligatoir', false],
                ['Interdit le port des bijoux ,macher le chwingum obligatoire ,interdit de porter les casquettes', false],
            ],
            // Question 26: Citer les 5S
            [
                ['Débarasser; ranger nettoyer, ordre,rigeur', true],
                ['Débarasser;Jouer, ranger nettoyer, ordre,enrubannage', false],
                ['Courir, ranger, nettoyer, ordre,enrubannage', false],
            ],
            // Question 27: Cocher les Valeurs d'APTIV
            [
                ['Jouer pour gagner, ,penser et agir en entrepreneur, Agir avec  retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
                ['Jouer pour gagner, une équipe ,penser et agir en entrepreneur, Agir avec le sens de l\'urgence, vouloir atteindre ses objectifs,,agir avec respet', true],
                ['Jouer pour gagner, penser et agir comme un joueur, Agir avec  retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
            ],
        ];

        // Create all answers
        $i = 0;
        foreach ($questions as $question) {
            if (isset($answers[$i])) {
                foreach ($answers[$i] as $answer) {
                    repo::create([
                        'answer_text' => $answer[0],
                        'quz_id' => $question->id,
                        'is_correct' => $answer[1],
                    ]);
                }
            }
            $i++;
        }

        $this->command->info('Created answers for Seal Paoumat / Komax questions');
    }
    
    /**
     * Seed answers for Sertissage questions
     */
    private function seedSertissageAnswers(): void
    {
        // Get questions for Sertissage
        $questions = DB::table('quzs')
            ->join('categories', 'quzs.categories_id', '=', 'categories.id')
            ->where('categories.title', 'Sertissage')
            ->select('quzs.*')
            ->get();
            
        // Define answers for each question
        $answers = [
            // Question 1: Combien de brins peuvent être laissés en dehors d'un sertissage ?
            [
                ['Maximum 2', false],
                ['Non', false],
                ['Aucun', true],
            ],
            // Question 2: Est-il obligatoire dans le double sertissage que le fil ci-dessous ait également la fenêtre ?
            [
                ['Non.', false],
                ['Non, tant que le PVC est contre les ailes de cuivre du terminal.', false],
                ['Oui.', true],
            ],
            // Question 3: Le pli, à l'arrière du terminal...
            [
                ['...ne peut pas être plus de la moitié de l\'épaisseur du matériau terminal.', true],
                ['...Peut être à tout moment tant que le terminal n\'est pas cassé', false],
                ['...ne peut pas être inférieure à l\'épaisseur du matériau terminal', false],
            ],
            // Question 4: Dans un sertissage, la cloche doit être placée sur...
            [
                ['... Des deux côtés des ailes de cuivre.', true],
                ['...Tout à l\'arrière des ailes de cuivre.', false],
                ['... Juste du côté de la cloche.', false],
            ],
            // Question 5: Comment la hauteur de sertissage doit-elle être mesurée par rapport à la figure 1 ?
            [
                ['Avec la partie pointue du micromètre placée devant le terminal.', false],
                ['Avec la partie pointue du micromètre placée à l\'arrière de la borne.', true],
                ['Quoi qu\'il en soit, il n\'y a pas de méthode définie.', false],
            ],
            // Question 6: Dans un double sertissage avec des fils de différentes sections transversales, quelle devrait être la position des fils ?
            [
                ['Celui avec la plus petite section au-dessus de celui avec la plus grande section.', false],
                ['Tant que c\'est bien serti, ça n\'a pas d\'importance.', false],
                ['celui avec la plus grande section au-dessous de celui avec la plus petite section.', true],
            ],
            // Question 7: Comment devraient être les ailes de cuivre ?
            [
                ['Fermé et centré', true],
                ['Ouvert', false],
                ['Fermé.', false],
            ],
            // Question 8: Quelle est la distance maximale des extrémités des brins par rapport à la griffe de cuivre (accw/figure2) ?
            [
                ['5,0 mm', false],
                ['Il n\'y a pas de distance définie', false],
                ['1.0 mm et sans les brins correspondant au montage et à la fixation du terminal', true],
            ],
            // Question 9: La fenêtre à sertir acc avec la figure 3 ...
            [
                ['...est la taille de l\'espace entre les ailes de cuivre et de PVC.', true],
                ['... est la moitié de la taille de l\'espace entre les griffes en cuivre et en PVC', false],
                ['...est fabriqué en cuivre', false],
            ],
            // Question 10: Conformément à la figure 4, le joint-nek du joint serti devrait-il être visible entre l'aile de cuivre et l'aile de PVC ?
            [
                ['Non', true],
                ['Oui dans la fenêtre', false],
                ['Il n\'y a pas de spécification', false],
            ],
            // Question 11: Le fil serti doit-il être rejeté si le joint est endommagé ?
            [
                ['Oui', true],
                ['Non, tant que le joint n\'est endommagé qu\'au des nervures d\'étanchéité', false],
                ['Non, tant que le joint n\'est endommagé que dans la zone de sertissage', false],
            ],
            // Question 12: Les ailes en PVC...
            [
                ['...ils doivent être serrés pour qu\'ils se touchent', true],
                ['...serré pour que le PVC soit visible entre les griffes en cuivre et en PVC', false],
                ['...Devrait avoir la hauteur spécifique, ils ne peuvent pas laisser l\'isolation bouger.', false],
            ],
            // Question 13: Quelle est la dimension maximale de la coupe de l'onglet du terminal à la figure 5 ?
            [
                ['0,3 mm (afin de ne pas endommager le fil). La coupe de la languette à l\'avant doit permettre de monter/fixer la borne', true],
                ['Il n\'y a pas de spécification', false],
                ['2,5 mm', false],
            ],
            // Question 14: Peut-il réparer une borne endommagée ou mal serti ?
            [
                ['Oui et la réparation doit être effectuée conformément aux instructions de réparation pour le défaut ULZ 000181.', true],
                ['Oui, tant que le terminal n\'est que légèrement plié à l\'aide d\'une clé', false],
                ['Non, ne peut être remplacé que par un autre terminal', false],
            ],
            // Question 15: Lorsque vous mesurez la hauteur de sertissage, vous vérifiez qu'elle n'est pas conforme aux spécifications, que faire ?
            [
                ['N\'importe quoi, arrêtez simplement la production', false],
                ['Arrêter la production, rejeter et répéter Aérer les fils sertis jusqu\'à présent et faire une nouvelle configuration', true],
                ['Corrigez la hauteur de sertissage et continuez le travail', false],
            ],
            // Question 16: Si le PVC n'est pas visible dans la fenêtre, que devez-vous faire avec les pièces produites ?
            [
                ['Doit être rejeté et réparé selon la procédure de retravail', false],
                ['Doit être rejeté', true],
                ['Doit être rejeté si le fil est inférieur à 4,0 mm de section', false],
            ],
            // Question 17: Si les brins ne sont pas visibles dans la fenêtre, le fil est-il rejeté ?
            [
                ['Oui, et doit être réparé selon la procédure de retravail', false],
                ['Non', true],
                ['Oui, à moins qu\'il ne s\'agisse d\'un sertissage de joint', false],
            ],
            // Question 18: Si la borne a des rainures à côté du pli, le sertissage doit-il être décollé et réparé ?
            [
                ['Oui.', true],
                ['Non.', false],
                ['Non. Le terminal n\'est rejeté que s\'il s\'agit de câbles abs ou airbag', false],
            ],
            // Question 19: Combien de fois un sertissage peut-il être réparé à l'aide du même fil ?
            [
                ['Tout ce qui est nécessaire', false],
                ['1 fois', true],
                ['3 fois maximum', false],
            ],
            // Question 20: Selon la figure 6, lequel des sertissages a de grandes ailes en PVC ?
            [
                ['Un', true],
                ['B', false],
                ['C', false],
            ],
            // Question 21: Selon la figure 6, laquelle des sertissages a des ailes d'isolation perçant l'isolation ?
            [
                ['Un', false],
                ['B', true],
                ['C', false],
            ],
            // Question 22: Selon la figure 6, laquelle des sertissages a des brins à l'extérieur des ailes de cuivre ?
            [
                ['B', false],
                ['D', true],
                ['E', false],
            ],
            // Question 23: Selon la figure 6, laquelle des sertissages à des brins excessifs à l'avant ?
            [
                ['B', false],
                ['Un', false],
                ['A.', true],
            ],
            // Question 24: Selon la figure 6, laquelle des sertissages a un corps terminal endommagé ?
            [
                ['B', false],
                ['D', false],
                ['E', true],
            ],
            // Question 25: Le plan de contrôle est :
            [
                ['Le document qui indique ce qu\'il faut faire en cas d\'anomalie', false],
                ['Un document qui indique comment contrôler les caractéristiques du produit que je fabrique et Paramètres de processus (équipement que je utilise/gère)', true],
                ['Un document indiquant la quantité produite', false],
            ],
            // Question 26: Quand devriez-vous enregistrer la valeur cpk sur le rapport de production ?
            [
                ['Au début de chaque quart de travail', true],
                ['À la fin du quart de travail', false],
                ['À la fin de chaque commande produite', false],
            ],
            // Question 27: Que dois-je faire si la valeur cpk est inférieure à 1 ?
            [
                ['Si c\'est inférieur à 1, vous ne devez pas vous inscrire', false],
                ['Enregistrer en rouge sur le graphique de production, alerter l\'auditeur qualité Et le chef d\'équipe', true],
                ['cpk n\'est jamais inférieur à 1', false],
            ],
            // Question 28: Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?
            [
                ['Au début de chaque quart de travail', true],
                ['À la fin du quart de travail', false],
                ['Pendant le quart de travail', false],
            ],
        ];

        // Create all answers
        $i = 0;
        foreach ($questions as $question) {
            if (isset($answers[$i])) {
                foreach ($answers[$i] as $answer) {
                    repo::create([
                        'answer_text' => $answer[0],
                        'quz_id' => $question->id,
                        'is_correct' => $answer[1],
                    ]);
                }
            }
            $i++;
        }

        $this->command->info('Created answers for Sertissage questions');
    }
    
    /**
     * Seed answers for Kabatec questions
     */
    private function seedKabatecAnswers(): void
    {
        // Get questions for Kabatec
        $questions = DB::table('quzs')
            ->join('categories', 'quzs.categories_id', '=', 'categories.id')
            ->where('categories.title', 'Kabatec')
            ->select('quzs.*')
            ->get();
            
        // Define answers for each question
        $answers = [
            // Question 1: Quel est le rôle de la machine kabatec
            [
                ['Une machine semi-automatique utilisés pour couper les fils torsadés', false],
                ['Une machine semi-automatique utilisés pour fixer les fils torsadés', true],
                ['Une machine semi-automatique utilisés pour dénuder les fils', false],
            ],
            // Question 2: Quel est le rôle de la machine Teknomatik
            [
                ['Une machine automatique de détorsade et dressage des fils Torsadés', true],
                ['Une machine automatique de détorsade des fils Torsadés', false],
                ['Une machine automatique de dressage des fils Torsadés', false],
            ],
            // Question 3: la mauvaise manipulation du torsadé peut causer
            [
                ['Déplacement de la fixation', false],
                ['Endommagement et le déplacement de fixation', true],
                ['Endommagement', false],
            ],
            // Question 4: Quels sont les systèmes utilisés dans notre organisation?
            [
                ['Système FIFO', false],
                ['Système LIFO', false],
                ['Système FIFO &PULL', true],
            ],
            // Question 5: C'est quoi le systéme FIFO?
            [
                ['Premier sorti ,premier entré', false],
                ['Premier entré, premier sorti', true],
                ['Aucune réponse', false],
            ],
            // Question 6: Quand les interventions de maintenance de 1er niveau
            [
                ['Au début de chaque quart de travail', true],
                ['À la fin du quart de travail', false],
                ['Pendant le quart de travail', false],
            ],
            // Question 7: Quelle est la documentation utilisée dans votre poste de travail?
            [
                ['Feuille de prise de donnée,mode Opératoire, check-liste de maintenence 1er niveau, les aides visuels,Sos, FTQ', true],
                ['Feuille de prise de donnée; la fiche technique, mode Opératoire,étiquette,', false],
                ['Check-liste de maintenence 1er niveau, les aides visuels; suivi de production chaque 2 heures', false],
            ],
            // Question 8: Choisir la définition exacte du Mode Opératoire
            [
                ['C\'est la fiche technique d\'une chaîne de mantage', false],
                ['C\'est un document qui définit les opérations des opérateurs dans le poste de travail', true],
                ['C\'est une Aide visuelle pour le poste d\'encliquitage', false],
            ],
            // Question 9: Choisir la définition exacte du Aide Visuelle
            [
                ['C\'est le mode opératoire du poste', false],
                ['C\'est le check-liste de maintenance premier niveau', false],
                ['C\'est un document qui donne des informations visuelle sur la qualité d\'un état ou produit', true],
            ],
            // Question 10: La définition exacte de la politique de qualité est
            [
                ['Satisfaire les besoins du client en minimisant les coûts de la qualité', false],
                ['Satisfaire les besoins du client avec 0 défaut et dépaser ses attentes', true],
                ['Etre exegents avec les fournisseurs pour assurer la qualité du produit', false],
            ],
            // Question 11: La définition exacte de la politique d'environnement
            [
                ['La protection de la santé du personnel,Le respet de l\'ordre et propreté du poste de travail,La séparation des déchets et le traitement du résidus toxique', true],
                ['Le respet de l\'ordre et propreté du poste de travail', false],
                ['La séparation des déchets et le traitement du résidus toxique', false],
            ],
            // Question 12: Cocher les trois consignes de sécurité
            [
                ['Interdit le port des bijoux ,interdit de macher le chwingum,interdit de porter les casquettes', true],
                ['Interdit de manger ,interdit de porter les chaussures fermé,le port des bijoux obligatoir', false],
                ['Interdit le port des bijoux ,macher le chwingum obligatoire ,interdit de porter les casquettes', false],
            ],
            // Question 13: Citer les 5S?
            [
                ['Débarasser; ranger, nettoyer, ordre,rigeur', true],
                ['Débarasser;Jouer, ranger nettoyer, ordre,enrubannage', false],
                ['Courir, ranger, nettoyer, ordre,enrubannage', false],
            ],
            // Question 14: Cocher les Valeurs d'APTIV
            [
                ['Jouer pour gagner, ,penser et agir en entrepreneur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
                ['Jouer pour gagner, une équipe ,penser et agir en entrepreneur, Agir avec le sens de l\'urgence, vouloir atteindre ses objectifs,,agir avec respet', true],
                ['Jouer pour gagner, penser et agir comme un joueur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
            ],
        ];

        // Create all answers
        $i = 0;
        foreach ($questions as $question) {
            if (isset($answers[$i])) {
                foreach ($answers[$i] as $answer) {
                    repo::create([
                        'answer_text' => $answer[0],
                        'quz_id' => $question->id,
                        'is_correct' => $answer[1],
                    ]);
                }
            }
            $i++;
        }

        $this->command->info('Created answers for Kabatec questions');
    }
    
    /**
     * Seed answers for Beri.Co.Cut questions
     */
    private function seedBeriCoCutAnswers(): void
    {
        // Get questions for Beri.Co.Cut
        $questions = DB::table('quzs')
            ->join('categories', 'quzs.categories_id', '=', 'categories.id')
            ->where('categories.title', 'Beri.Co.Cut')
            ->select('quzs.*')
            ->get();
            
        // Define answers for each question
        $answers = [
            // Question 1: BERI Co Cut est une machine semi-automatique qui permet de
            [
                ['Permet de couper la tresse du câble facilement.', true],
                ['Permet de couper la tresse du câble difficilement.', false],
                ['Perme d\'enrubanner la tresse du câble facilement.', false],
            ],
            // Question 2: Si les brins de la tresse sont répartis on doit
            [
                ['Compacter avec un outil', true],
                ['Compacter les manuellement', false],
                ['Compacter avec un ciseaux', false],
            ],
            // Question 3: Quels sont les systèmes utilisés dans notre organisation?
            [
                ['Système FIFO', false],
                ['Système LIFO', false],
                ['Système FIFO&PULL', true],
            ],
            // Question 4: C'est quoi le systéme FIFO?
            [
                ['Premier sorti ,premier entré', false],
                ['Premier entré, premier sorti', true],
                ['Aucune réponse', false],
            ],
            // Question 5: Quand les interventions de maintenance de 1er niveau
            [
                ['Au début de chaque quart de travail', true],
                ['À la fin du quart de travail', false],
                ['Pendant le quart de travail', false],
            ],
            // Question 6: Quelle est la documentation utilisée dans votre poste de travail?
            [
                ['Feuille de prise de donnée,mode Opératoire, check-liste de maintenence 1er niveau, les aides visuels,Sos, FTQ', true],
                ['Feuille de prise de donnée; la fiche technique, mode Opératoire,étiquette,', false],
                ['Check-liste de maintenence 1er niveau, les aides visuels; suivi de production chaque 2 heures', false],
            ],
            // Question 7: Choisir la définition exacte du Mode Opératoire
            [
                ['C\'est la fiche technique d\'une chaîne de mantage', false],
                ['C\'est un document qui définit les opérations des opérateurs dans le poste de travail', true],
                ['C\'est une Aide visuelle pour le poste d\'encliquitage', false],
            ],
            // Question 8: Choisir la définition exacte du Aide Visuelle
            [
                ['C\'est le mode opératoire du poste', false],
                ['C\'est le check-liste de maintenance premier niveau', false],
                ['C\'est un document qui donne des informations visuelle sur la qualité d\'un état ou produit', true],
            ],
            // Question 9: La définition exacte de la politique de qualité est
            [
                ['Satisfaire les besoins du client en minimisant les coûts de la qualité', false],
                ['Satisfaire les besoins du client avec 0 défaut et dépaser ses attentes', true],
                ['Etre exegents avec les fournisseurs pour assurer la qualité du produit', false],
            ],
            // Question 10: La définition exacte de la politique d'environnement
            [
                ['La protection de la santé du personnel,Le respet de l\'ordre et propreté du poste de travail,La séparation des déchets et le traitement du résidus toxique', true],
                ['Le respet de l\'ordre et propreté du poste de travail', false],
                ['La séparation des déchets et le traitement du résidus toxique', false],
            ],
            // Question 11: Cocher les trois consignes de sécurité
            [
                ['Interdit le port des bijoux ,interdit de macher le chwingum,interdit de porter les casquettes', true],
                ['Interdit de manger ,interdit de porter les chaussures fermé,le port des bijoux obligatoir', false],
                ['Interdit le port des bijoux ,macher le chwingum obligatoire ,interdit de porter les casquettes', false],
            ],
            // Question 12: Citer les 5S?
            [
                ['Débarasser; ranger nettoyer, ordre,rigeur', true],
                ['Débarasser;Jouer, ranger nettoyer, ordre,enrubannage', false],
                ['Courir, ranger, nettoyer, ordre,enrubannage', false],
            ],
            // Question 13: Cocher les Valeurs d'APTIV
            [
                ['Jouer pour gagner, ,penser et agir en entrepreneur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
                ['Jouer pour gagner, une équipe ,penser et agir en entrepreneur, Agir avec le sens de l\'urgence, vouloir atteindre ses objectifs,,agir avec respet', true],
                ['Jouer pour gagner, penser et agir comme un joueur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
            ],
        ];

        // Create all answers
        $i = 0;
        foreach ($questions as $question) {
            if (isset($answers[$i])) {
                foreach ($answers[$i] as $answer) {
                    repo::create([
                        'answer_text' => $answer[0],
                        'quz_id' => $question->id,
                        'is_correct' => $answer[1],
                    ]);
                }
            }
            $i++;
        }

        $this->command->info('Created answers for Beri.Co.Cut questions');
    }
    
    /**
     * Seed answers for Beri.Co.Cut.V3 questions
     */
    private function seedBeriCoCutV3Answers(): void
    {
        // Get questions for Beri.Co.Cut.V3
        $questions = DB::table('quzs')
            ->join('categories', 'quzs.categories_id', '=', 'categories.id')
            ->where('categories.title', 'Beri.Co.Cut.V3')
            ->select('quzs.*')
            ->get();
            
        // Define answers for each question
        $answers = [
            // Question 1: BERI Co Cut V3 est une machine semi-automatique qui permet de
            [
                ['Dénuder la tresse du câble facilement par un system pneumatique', false],
                ['Couper la tresse du câble facilement par un system pneumatique', true],
                ['Couper la tresse du câble facilement par un system mécanique', false],
            ],
            // Question 2: Selon la figure 1 La lettre A c'est
            [
                ['Vitesse de rotation', true],
                ['Compteur', false],
                ['Mode: Auto / manuel', false],
            ],
            // Question 3: Selon la figure 1 La lettre B c'est
            [
                ['Vitesse de rotation', false],
                ['Compteur', true],
                ['Mode: Auto / manuel', false],
            ],
            // Question 4: Selon la figure 1 La lettre C c'est
            [
                ['Vitesse de rotation', false],
                ['Compteur', false],
                ['Mode: Auto / manuel', true],
            ],
            // Question 5: Selon la figure 1 La lettre D c'est
            [
                ['Vitesse de rotation', false],
                ['Numéro de rotation', true],
                ['Mode: Auto / manuel', false],
            ],
            // Question 6: Cocher les opérations de BERI Co Cut V3
            [
                ['Les tresses sont coupées soigneusement et avec précision,une séparation sûre, simple et rapide des tresses, impossibilité d\'endommager les couches sous le tressage Commencez à découper en utilisant un bouton intégré dans la poignée,et travail sans effort avec une assistance pneumatique', true],
                ['Travail sans effort avec une assistance pneumatique', false],
                ['Une séparation sûre, simple et rapide des tresses', false],
            ],
            // Question 7: Quels sont les systèmes utilisés dans notre organisation?
            [
                ['Système FIFO', false],
                ['Système LIFO', false],
                ['Système FIFO&PULL', true],
            ],
            // Question 8: C'est quoi le systéme FIFO?
            [
                ['Premier sorti ,premier entré', false],
                ['Premier entré, premier sorti', true],
                ['Aucune réponse', false],
            ],
            // Question 9: Quand les interventions de maintenance de 1er niveau
            [
                ['Au début de chaque quart de travail', true],
                ['À la fin du quart de travail', false],
                ['Pendant le quart de travail', false],
            ],
            // Question 10: Quelle est la documentation utilisée dans votre poste de travail?
            [
                ['Feuille de prise de donnée,mode Opératoire, check-liste de maintenence 1er niveau, les aides visuels,Sos, FTQ', true],
                ['Feuille de prise de donnée; la fiche technique, mode Opératoire,étiquette,', false],
                ['Check-liste de maintenence 1er niveau, les aides visuels; suivi de production chaque 2 heures', false],
            ],
            // Question 11: Choisir la définition exacte du Mode Opératoire
            [
                ['C\'est la fiche technique d\'une chaîne de mantage', false],
                ['C\'est un document qui définit les opérations des opérateurs dans le poste de travail', true],
                ['C\'est une Aide visuelle pour le poste d\'encliquitage', false],
            ],
            // Question 12: Choisir la définition exacte du Aide Visuelle
            [
                ['C\'est le mode opératoire du poste', false],
                ['C\'est le check-liste de maintenance premier niveau', false],
                ['C\'est un document qui donne des informations visuelle sur la qualité d\'un état ou produit', true],
            ],
            // Question 13: La définition exacte de la politique de qualité est
            [
                ['Satisfaire les besoins du client en minimisant les coûts de la qualité', false],
                ['Satisfaire les besoins du client avec 0 défaut et dépaser ses attentes', true],
                ['Etre exegents avec les fournisseurs pour assurer la qualité du produit', false],
            ],
            // Question 14: La définition exacte de la politique d'environnement
            [
                ['La protection de la santé du personnel,Le respet de l\'ordre et propreté du poste de travail,La séparation des déchets et le traitement du résidus toxique', true],
                ['Le respet de l\'ordre et propreté du poste de travail', false],
                ['La séparation des déchets et le traitement du résidus toxique', false],
            ],
            // Question 15: Cocher les trois consignes de sécurité
            [
                ['Interdit le port des bijoux ,interdit de macher le chwingum,interdit de porter les casquettes', true],
                ['Interdit de manger ,interdit de porter les chaussures fermé,le port des bijoux obligatoir', false],
                ['Interdit le port des bijoux ,macher le chwingum obligatoire ,interdit de porter les casquettes', false],
            ],
            // Question 16: Citer les 5S?
            [
                ['Débarasser; ranger nettoyer, ordre,rigeur', true],
                ['Débarasser;Jouer, ranger nettoyer, ordre,enrubannage', false],
                ['Courir, ranger, nettoyer, ordre,enrubannage', false],
            ],
            // Question 17: Cocher les Valeurs d'APTIV
            [
                ['Jouer pour gagner, ,penser et agir en entrepreneur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
                ['Jouer pour gagner, une équipe ,penser et agir en entrepreneur, Agir avec le sens de l\'urgence, vouloir atteindre ses objectifs,,agir avec respet', true],
                ['Jouer pour gagner, penser et agir comme un joueur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
            ],
        ];

        // Create all answers
        $i = 0;
        foreach ($questions as $question) {
            if (isset($answers[$i])) {
                foreach ($answers[$i] as $answer) {
                    repo::create([
                        'answer_text' => $answer[0],
                        'quz_id' => $question->id,
                        'is_correct' => $answer[1],
                    ]);
                }
            }
            $i++;
        }

        $this->command->info('Created answers for Beri.Co.Cut.V3 questions');
    }
    
    /**
     * Seed answers for BT 752/BT 722 questions
     */
    private function seedBT752BT722Answers(): void
    {
        // Get questions for BT 752/BT 722
        $questions = DB::table('quzs')
            ->join('categories', 'quzs.categories_id', '=', 'categories.id')
            ->where('categories.title', 'BT 752/BT 722')
            ->select('quzs.*')
            ->get();
            
        // Define answers for each question
        $answers = [
            // Question 1: La KOMAX BT752 /BT722 est une presses de
            [
                ['Dénudage et le sertissage avec ou sans joints d\'une seule extrémité de câble', false],
                ['Coupe, le denudage et le sertissage avec ou sans joints d\'une seule extrémité de câble', false],
                ['Sertissage avec ou sans joints d\'une seule extrémité de câble', true],
            ],
            // Question 2: Selon la figure 1 La lettre A c'est
            [
                ['Sertissage', true],
                ['Dénudage extraction totale', false],
                ['Dénudage extraction partielle', false],
            ],
            // Question 3: Selon la figure 1 La lettre B c'est
            [
                ['Sertissage', false],
                ['Dénudage extraction totale', true],
                ['Dénudage extraction partielle', false],
            ],
            // Question 4: Selon la figure 1 La lettre C c'est
            [
                ['Dénudage Sertissage', false],
                ['Dénudage extraction totale', false],
                ['Dénudage extraction partielle', true],
            ],
            // Question 5: Selon la figure 1 La lettre D c'est
            [
                ['Dénudage Sertissage', true],
                ['Dénudage extraction totale', false],
                ['Dénudage extraction partielle', false],
            ],
            // Question 6: Selon la figure 1 La lettre E c'est
            [
                ['Dénudage extraction totale', true],
                ['Dénudage extraction partielle', false],
                ['Montage de douille', false],
            ],
            // Question 7: Selon la figure 1 La lettre F c'est
            [
                ['Montage de douille,extraction total', false],
                ['Dénudage extraction partielle', true],
                ['Montage de douille', false],
            ],
            // Question 8: Selon la figure 1 La lettre G c'est
            [
                ['Montage de douille,extraction total', false],
                ['Montage de douille, extraction partielle', false],
                ['Montage de douille', true],
            ],
            // Question 9: Selon la figure 1 La lettre H c'est
            [
                ['Montage de douille,extraction total', false],
                ['Dénudage ,montage de douille,sertissage', true],
                ['Montage de douille', false],
            ],
            // Question 10: Selon la figure 1 La lettre I c'est
            [
                ['Montage de douille,extraction total', false],
                ['Coupe de contacte défectueux', true],
                ['Montage de douille', false],
            ],
            // Question 11: Cocher les normes de qualité d'un sertissage
            [
                ['Hauteur conforme à la table pré-contrôle et pésence du pic et guide et bavure,Tous les filament à l\'interieur des griffes de l\'âme', true],
                ['Tous les filament à l\'éxterieur des griffes de l\'âme', false],
                ['80% de filamens et 50% de PVC visible dans la fenêtre de sertissage', false],
            ],
            // Question 12: Quels sont les systèmes utilisés dans notre organisation?
            [
                ['Système FIFO', false],
                ['Système LIFO', false],
                ['Système FIFO&PULL', true],
            ],
            // Question 13: C'est quoi le systéme FIFO?
            [
                ['Premier sorti ,premier entré', false],
                ['Premier entré, premier sorti', true],
                ['Aucune réponse', false],
            ],
            // Question 14: Quand les interventions de maintenance de 1er niveau
            [
                ['Au début de chaque quart de travail', true],
                ['À la fin du quart de travail', false],
                ['Pendant le quart de travail', false],
            ],
            // Question 15: Quelle est la documentation utilisée dans votre poste de travail?
            [
                ['Feuille de prise de donnée,mode Opératoire, check-liste de maintenence 1er niveau, les aides visuels,Sos, FTQ', true],
                ['Feuille de prise de donnée; la fiche technique, mode Opératoire,étiquette,', false],
                ['Check-liste de maintenence 1er niveau, les aides visuels; suivi de production chaque 2 heures', false],
            ],
            // Question 16: Choisir la définition exacte du Mode Opératoire
            [
                ['C\'est la fiche technique d\'une chaîne de mantage', false],
                ['C\'est un document qui définit les opérations des opérateurs dans le poste de travail', true],
                ['C\'est une Aide visuelle pour le poste d\'encliquitage', false],
            ],
            // Question 17: Choisir la définition exacte du Aide Visuelle
            [
                ['C\'est le mode opératoire du poste', false],
                ['C\'est le check-liste de maintenance premier niveau', false],
                ['C\'est un document qui donne des informations visuelle sur la qualité d\'un état ou produit', true],
            ],
            // Question 18: La définition exacte de la politique de qualité est
            [
                ['Satisfaire les besoins du client en minimisant les coûts de la qualité', false],
                ['Satisfaire les besoins du client avec 0 défaut et dépaser ses attentes', true],
                ['Etre exegents avec les fournisseurs pour assurer la qualité du produit', false],
            ],
            // Question 19: La définition exacte de la politique d'environnement
            [
                ['La protection de la santé du personnel,Le respet de l\'ordre et propreté du poste de travail,La séparation des déchets et le traitement du résidus toxique', true],
                ['Le respet de l\'ordre et propreté du poste de travail', false],
                ['La séparation des déchets et le traitement du résidus toxique', false],
            ],
            // Question 20: Cocher les trois consignes de sécurité
            [
                ['Interdit le port des bijoux ,interdit de macher le chwingum,interdit de porter les casquettes', true],
                ['Interdit de manger ,interdit de porter les chaussures fermé,le port des bijoux obligatoir', false],
                ['Interdit le port des bijoux ,macher le chwingum obligatoire ,interdit de porter les casquettes', false],
            ],
            // Question 21: Citer les 5S?
            [
                ['Débarasser; ranger nettoyer, ordre,rigeur', true],
                ['Débarasser;Jouer, ranger nettoyer, ordre,enrubannage', false],
                ['Courir, ranger, nettoyer, ordre,enrubannage', false],
            ],
            // Question 22: Cocher les Valeurs d'APTIV
            [
                ['Jouer pour gagner, ,penser et agir en entrepreneur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
                ['Jouer pour gagner, une équipe ,penser et agir en entrepreneur, Agir avec le sens de l\'urgence, vouloir atteindre ses objectifs,,agir avec respet', true],
                ['Jouer pour gagner, penser et agir comme un joueur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
            ],
        ];

        // Create all answers
        $i = 0;
        foreach ($questions as $question) {
            if (isset($answers[$i])) {
                foreach ($answers[$i] as $answer) {
                    repo::create([
                        'answer_text' => $answer[0],
                        'quz_id' => $question->id,
                        'is_correct' => $answer[1],
                    ]);
                }
            }
            $i++;
        }

        $this->command->info('Created answers for BT 752/BT 722 questions');
    }
    
    /**
     * Seed answers for Contention questions
     */
    private function seedContentionAnswers(): void
    {
        // Get questions for Contention
        $questions = DB::table('quzs')
            ->join('categories', 'quzs.categories_id', '=', 'categories.id')
            ->where('categories.title', 'Contention')
            ->select('quzs.*')
            ->get();
            
        // Define answers for each question
        $answers = [
            // Question 1: Qu'est-ce qu'un contrôle de contention?
            [
                ['Contention est un contrôle qualité,selon un plan de contrôle défini. Son but est de protéger le client.', true],
                ['Contention est un contrôle qualité,selon un plan de contrôle défini. Son but est de protéger le fournisseur.', false],
                ['Contention est un contrôle qualité,selon un plan défini par le client.', false],
            ],
            // Question 2: Après chaque vérification le contrôle de contention il doit mettre
            [
                ['Une étiquette rouge avec une description claire de problème à côté de problème détecté.', true],
                ['Une étiquette verte pour les fils Ok sans aucun problème', false],
                ['Une étiquette orange avec une description claire de problème à côté de problème détecté.', false],
            ],
            // Question 3: Cocher les étapes du plan de réaction de contrôle contention
            [
                ['Détecter la non-conformité,identifier avec l\'étiquette rouge ,enregistrer le défaut,alerter auditeur qualité et contremaitre et retourner le produit au zone de réparation/Cage rouge.', true],
                ['Détecter la non-conformité,identifier avec l\'étiquette rouge ,enregistrer le défaut.', false],
                ['Alerter auditeur qualité et contremaitre et retourner le produit au zone de réparation/Cage rouge.', false],
            ],
            // Question 4: L'opérateur de contention est une personne
            [
                ['Formé est sous la responsabilité de l\'ingénierie.', false],
                ['Formé est sous la responsabilité de la qualité.', true],
                ['N\'est pas formé est sous la responsabilité de la qualité.', false],
            ],
            // Question 5: Quelle est la documentation utilisée dans votre poste de travail?
            [
                ['Feuille de prise de donnée,, les aides visuels,plan de contrôle, rapport de contrôle contention', true],
                ['Feuille de prise de donnée; la fiche technique, mode Opératoire,étiquette,', false],
                ['Check-liste de maintenence 1er niveau, les aides visuels; suivi de production chaque 2 heures', false],
            ],
            // Question 6: Quels sont les systèmes utilisés dans notre organisation?
            [
                ['Système FIFO', false],
                ['Système LIFO', false],
                ['Système FIFO&PULL', true],
            ],
            // Question 7: C'est quoi le systéme FIFO?
            [
                ['Premier sorti ,premier entré', false],
                ['Premier entré, premier sorti', true],
                ['Aucune réponse', false],
            ],
            // Question 8: Choisir la définition exacte du Mode Opératoire
            [
                ['C\'est la fiche technique d\'une chaîne de mantage', false],
                ['C\'est un document qui définit les opérations des opérateurs dans le poste de travail', true],
                ['C\'est une Aide visuelle pour le poste d\'encliquitage', false],
            ],
            // Question 9: Choisir la définition exacte du Aide Visuelle
            [
                ['C\'est le mode opératoire du poste', false],
                ['C\'est le check-liste de maintenance premier niveau', false],
                ['C\'est un document qui donne des informations visuelle sur la qualité d\'un état ou produit', true],
            ],
            // Question 10: La définition exacte de la politique de qualité est
            [
                ['Satisfaire les besoins du client en minimisant les coûts de la qualité', false],
                ['Satisfaire les besoins du client avec 0 défaut et dépaser ses attentes', true],
                ['Etre exegents avec les fournisseurs pour assurer la qualité du produit', false],
            ],
            // Question 11: La définition exacte de la politique d'environnement
            [
                ['La protection de la santé du personnel,Le respet de l\'ordre et propreté du poste de travail,La séparation des déchets et le traitement du résidus toxique', true],
                ['Le respet de l\'ordre et propreté du poste de travail', false],
                ['La séparation des déchets et le traitement du résidus toxique', false],
            ],
            // Question 12: Cocher les trois consignes de sécurité
            [
                ['Interdit le port des bijoux ,interdit de macher le chwingum,interdit de porter les casquettes', true],
                ['Interdit de manger ,interdit de porter les chaussures fermé,le port des bijoux obligatoir', false],
                ['Interdit le port des bijoux ,macher le chwingum obligatoire ,interdit de porter les casquettes', false],
            ],
            // Question 13: Citer les 5S?
            [
                ['Débarasser; ranger nettoyer, ordre,rigeur', true],
                ['Débarasser;Jouer, ranger nettoyer, ordre,enrubannage', false],
                ['Courir, ranger, nettoyer, ordre,enrubannage', false],
            ],
            // Question 14: Cocher les Valeurs d'APTIV
            [
                ['Jouer pour gagner, ,penser et agir en entrepreneur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
                ['Jouer pour gagner, une équipe ,penser et agir en entrepreneur, Agir avec le sens de l\'urgence, vouloir atteindre ses objectifs,,agir avec respet', true],
                ['Jouer pour gagner, penser et agir comme un joueur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
            ],
        ];

        // Create all answers
        $i = 0;
        foreach ($questions as $question) {
            if (isset($answers[$i])) {
                foreach ($answers[$i] as $answer) {
                    repo::create([
                        'quz_id' => $question->id,
                        'answer_text' => $answer[0],
                        'is_correct' => $answer[1],
                    ]);
                }
            }
            $i++;
        }

        $this->command->info('Created answers for Contention questions');
    }
    
    /**
     * Seed answers for Coupe des Tuyaux questions
     */
    private function seedCoupeTuyauxAnswers(): void
    {
        // Get questions for Coupe des Tuyaux
        $questions = DB::table('quzs')
            ->join('categories', 'quzs.categories_id', '=', 'categories.id')
            ->where('categories.title', 'Coupe.des.Tuyaux')
            ->select('quzs.*')
            ->get();
            
        // Define answers for each question
        $answers = [
            // Question 1: Quels sont les principes groupes de protection des fils ?
            [
                ['Rubans,et les connecteurs', false],
                ['Les tubes lisses et gorges', false],
                ['Les tubes en carton ondulé,les rubans, les tubes lisses et tubes gorges', true],
            ],
            // Question 2: Quelles est la zone dédiée pour couper les tubes
            [
                ['La zone d\'assemblage.', false],
                ['La zone de coupe des tubes.', true],
                ['La zone de sertissage.', false],
            ],
            // Question 3: Le tuyau est une pièce
            [
                ['Creuse ouverte des deux extrémités', true],
                ['Plat ouverte des deux extramités', false],
                ['Creuse ouverte d\'une seule extrimité', false],
            ],
            // Question 4: Pour assurer une qualité de coupe des tuyaux on doit
            [
                ['La machine de coupe doit être ajusté au diamètre intèrne du tube', false],
                ['La machine de coupe doit être ajusté au diamètre externe du tube de traitement, afin d\'avoir la manutention et le positionnement correct du tube', true],
                ['La machine de coupe doit être ajusté au diamètre intèrne et extèrne du tube', false],
            ],
            // Question 5: Quels sont les types des systèmes de guidage dédiés pour la coupe des tubes
            [
                ['La buses d\'alimentation', false],
                ['La buses d\'alimentation ,et les rails de guidage', true],
                ['Les rails de guidage', false],
            ],
            // Question 6: C'est quoi le systéme FIFO?
            [
                ['Premier sorti ,premier entré', false],
                ['Premier entré, premier sorti', true],
                ['Aucune réponse', false],
            ],
            // Question 7: Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?
            [
                ['Au début de chaque quart de travail', true],
                ['À la fin du quart de travail', false],
                ['Pendant le quart de travail', false],
            ],
            // Question 8: Quelle est la documentation utilisée dans votre poste de travail?
            [
                ['Feuille de prise de donnée,mode Opératoire, check-liste de maintenence 1er niveau, les aides visuels,Sos, FTQ', true],
                ['Feuille de prise de donnée; la fiche technique, mode Opératoire,étiquette,', false],
                ['Check-liste de maintenence 1er niveau, les aides visuelles , SOS, l\'instruction du travail', false],
            ],
            // Question 9: Choisir la définition exacte du Mode Opératoire
            [
                ['C\'est la fiche technique d\'une chaîne de mantage', false],
                ['C\'est un document qui définit les opérations des opérateurs dans le poste de travail', true],
                ['C\'est une Aide visuelle pour le poste d\'encliquitage', false],
            ],
            // Question 10: Choisir la définition exacte du Aide Visuelle
            [
                ['C\'est le mode opératoire du poste', false],
                ['C\'est le check-liste de maintenance premier niveau', false],
                ['C\'est un document qui donne des informations visuelle sur la qualité d\'un état ou produit', true],
            ],
            // Question 11: La définition exacte de la politique de qualité est
            [
                ['Satisfaire les besoins du client en minimisant les coûts de la qualité', false],
                ['Satisfaire les besoins du client avec 0 défaut et dépaser ses attentes', true],
                ['Etre exegents avec les fournisseurs pour assurer la qualité du produit', false],
            ],
            // Question 12: La définition exacte de la politique d'environnement
            [
                ['La protection de la santé du personnel,Le respet de l\'ordre et propreté du poste de travail,La séparation des déchets et le traitement du résidus toxique', true],
                ['Le respet de l\'ordre et propreté du poste de travail', false],
                ['La séparation des déchets et le traitement du résidus toxique', false],
            ],
            // Question 13: Cocher les trois consignes de sécurité
            [
                ['Interdit le port des bijoux ,interdit de macher le chwingum,interdit de porter les casquettes', true],
                ['Interdit de manger ,interdit de porter les chaussures fermé,le port des bijoux obligatoir', false],
                ['Interdit le port des bijoux ,macher le chwingum obligatoire ,interdit de porter les casquettes', false],
            ],
            // Question 14: Citer les 5S?
            [
                ['Débarasser; ranger nettoyer, ordre,rigeur', true],
                ['Débarasser;Jouer, ranger nettoyer, ordre,enrubannage', false],
                ['Courir, ranger, nettoyer, ordre,enrubannage', false],
            ],
            // Question 15: Cocher les Valeurs d'APTIV
            [
                ['Jouer pour gagner, ,penser et agir en entrepreneur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
                ['Jouer pour gagner, une équipe ,penser et agir en entrepreneur, Agir avec le sens de l\'urgence, vouloir atteindre ses objectifs,,agir avec respet', true],
                ['Jouer pour gagner, penser et agir comme un joueur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
            ],
        ];

        // Create all answers
        $i = 0;
        foreach ($questions as $question) {
            if (isset($answers[$i])) {
                foreach ($answers[$i] as $answer) {
                    repo::create([
                        'quz_id' => $question->id,
                        'answer_text' => $answer[0],
                        'is_correct' => $answer[1],
                    ]);
                }
            }
            $i++;
        }

        $this->command->info('Created answers for Coupe des Tuyaux questions');
    }
    
    /**
     * Seed answers for Kappa 350 questions
     */
    private function seedKappa350Answers(): void
    {
        // Get questions for Kappa 350
        $questions = DB::table('quzs')
            ->join('categories', 'quzs.categories_id', '=', 'categories.id')
            ->where('categories.title', 'Kappa 350')
            ->select('quzs.*')
            ->get();
            
        // Define answers for each question
        $answers = [
            // Question 1: La machine kappa 350 est machine de :
            [
                ['Une machine automatique de sertissage', false],
                ['Une machine automatique de coupe et de dénudage', true],
                ['Une machine automatique de coupe', false],
            ],
            // Question 2: Cocher les étapes de validation de réglage sur Kappa 350
            [
                ['Choisir le programme à partir de la liste,vérifier le APN de la bobine,produire un échantillon pour le contrôler,faire les corrections si nécessaire', true],
                ['Vérifier le APN de la bobine,Choisir le programme à partir de la liste,produire un échantillon pour le contrôler,faire les corrections si nécessaire', false],
                ['Produire un échantillon pour le contrôler,faire les corrections si nécessaire,vérifier le APN de la bobine', false],
            ],
            // Question 3: Quelles sont les caractéristiques qu'ont doit messurer
            [
                ['La longueur de dénudage des deux côtés', false],
                ['La longueur du fil,La longueur de dénudage des deux côtés et La longueur de dénudage partielle', true],
                ['La longueur du fil,La longueur de dénudage des deux côtés', false],
            ],
            // Question 4: Quels sont les systèmes utilisés dans notre organisation?
            [
                ['Système FIFO', false],
                ['Système LIFO', false],
                ['Système FIFO&PULL', true],
            ],
            // Question 5: C'est quoi le systéme FIFO?
            [
                ['Premier sorti ,premier entré', false],
                ['Premier entré, premier sorti', true],
                ['Aucune réponse', false],
            ],
            // Question 6: Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées
            [
                ['Au début de chaque quart de travail', true],
                ['À la fin du quart de travail', false],
                ['Pendant le quart de travail', false],
            ],
            // Question 7: Quelle est la documentation utilisée dans votre poste de travail?
            [
                ['Feuille de prise de donnée,mode Opératoire, check-liste de maintenence 1er niveau, les aides visuels,Sos, FTQ', true],
                ['Feuille de prise de donnée; la fiche technique, mode Opératoire,étiquette,', false],
                ['Check-liste de maintenence 1er niveau, les aides visuels; suivi de production chaque 2 heures', false],
            ],
            // Question 8: Choisir la définition exacte du Mode Opératoire
            [
                ['C\'est la fiche technique d\'une chaîne de mantage', false],
                ['C\'est un document qui définit les opérations des opérateurs dans le poste de travail', true],
                ['C\'est une Aide visuelle pour le poste d\'encliquitage', false],
            ],
            // Question 9: Choisir la définition exacte du Aide Visuelle
            [
                ['C\'est le mode opératoire du poste', false],
                ['C\'est le check-liste de maintenance premier niveau', false],
                ['C\'est un document qui donne des informations visuelle sur la qualité d\'un état ou produit', true],
            ],
            // Question 10: La définition exacte de la politique de qualité est
            [
                ['Satisfaire les besoins du client en minimisant les coûts de la qualité', false],
                ['Satisfaire les besoins du client avec 0 défaut et dépaser ses attentes', true],
                ['Etre exegents avec les fournisseurs pour assurer la qualité du produit', false],
            ],
            // Question 11: La définition exacte de la politique d'environnement
            [
                ['La protection de la santé du personnel,Le respet de l\'ordre et propreté du poste de travail,La séparation des déchets et le traitement du résidus toxique', true],
                ['Le respet de l\'ordre et propreté du poste de travail', false],
                ['La séparation des déchets et le traitement du résidus toxique', false],
            ],
            // Question 12: Cocher les trois consignes de sécurité
            [
                ['Interdit le port des bijoux ,interdit de macher le chwingum,interdit de porter les casquettes', true],
                ['Interdit de manger ,interdit de porter les chaussures fermé,le port des bijoux obligatoir', false],
                ['Interdit le port des bijoux ,macher le chwingum obligatoire ,interdit de porter les casquettes', false],
            ],
            // Question 13: Citer les 5S?
            [
                ['Débarasser; ranger nettoyer, ordre,rigeur', true],
                ['Débarasser;Jouer, ranger nettoyer, ordre,enrubannage', false],
                ['Courir, ranger, nettoyer, ordre,enrubannage', false],
            ],
            // Question 14: Cocher les Valeurs d'APTIV
            [
                ['Jouer pour gagner, ,penser et agir en entrepreneur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
                ['Jouer pour gagner, une équipe ,penser et agir en entrepreneur, Agir avec le sens de l\'urgence, vouloir atteindre ses objectifs,,agir avec respet', true],
                ['Jouer pour gagner, penser et agir comme un joueur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
            ],
        ];

        // Create all answers
        $i = 0;
        foreach ($questions as $question) {
            if (isset($answers[$i])) {
                foreach ($answers[$i] as $answer) {
                    repo::create([
                        'quz_id' => $question->id,
                        'answer_text' => $answer[0],
                        'is_correct' => $answer[1],
                    ]);
                }
            }
            $i++;
        }

        $this->command->info('Created answers for Kappa 350 questions');
    }
    
    /**
     * Seed answers for Mangueras questions
     */
    private function seedManguerasAnswers(): void
    {
        // Get questions for Mangueras
        $questions = DB::table('quzs')
            ->join('categories', 'quzs.categories_id', '=', 'categories.id')
            ->where('categories.title', 'Mangueras')
            ->select('quzs.*')
            ->get();
            
        // Define answers for each question
        $answers = [
            // Question 1: Quelles sont les opérations qui comportes la prépartion de mangueras?
            [
                ['Enlever la protection,dénatter la maille protectrice,découper la maille protectrice,enfiler les housses,contracter,dénuder et sertir.', true],
                ['Enlever la protection,dénatter la maille protectrice.', false],
                ['Enfiler les housses,contracter,dénuder et sertir.', false],
            ],
            // Question 2: On doit découper la maille protectrice avec
            [
                ['Le ciseaux', true],
                ['Le coupe-ongle', false],
                ['L\'outil de retouche', false],
            ],
            // Question 3: Est-ce que on peut découper la maille protectrice avec la pointe de coupe-ongle?
            [
                ['OUI', false],
                ['Non', true],
                ['Selon la maille', false],
            ],
            // Question 4: L'application du seal est
            [
                ['Après le denudage de fil', false],
                ['Avant le dénudage de fil', true],
                ['En cours de dénudage de fil', false],
            ],
            // Question 5: On assure Le dénudage des deux extrémités de fil selon
            [
                ['Le mode opératoir et l\'aide visuel', true],
                ['Le mode opératoir', false],
                ['L\'aide visuel', false],
            ],
            // Question 6: Quels sont les systèmes utilisés dans notre organisation?
            [
                ['Système FIFO', false],
                ['Système LIFO', false],
                ['Système FIFO&PULL', true],
            ],
            // Question 7: C'est quoi le systéme FIFO?
            [
                ['Premier sorti ,premier entré', false],
                ['Premier entré, premier sorti', true],
                ['Aucune réponse', false],
            ],
            // Question 8: Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées
            [
                ['Au début de chaque quart de travail', true],
                ['À la fin du quart de travail', false],
                ['Pendant le quart de travail', false],
            ],
            // Question 9: Quelle est la documentation utilisée dans votre poste de travail?
            [
                ['Feuille de prise de donnée,mode Opératoire, check-liste de maintenence 1er niveau, les aides visuels,Sos, FTQ', true],
                ['Feuille de prise de donnée; la fiche technique, mode Opératoire,étiquette,', false],
                ['Check-liste de maintenence 1er niveau, les aides visuels; suivi de production chaque 2 heures', false],
            ],
            // Question 10: Choisir la définition exacte du Mode Opératoire
            [
                ['C\'est la fiche technique d\'une chaîne de mantage', false],
                ['C\'est un document qui définit les opérations des opérateurs dans le poste de travail', true],
                ['C\'est une Aide visuelle pour le poste d\'encliquitage', false],
            ],
            // Question 11: Choisir la définition exacte du Aide Visuelle
            [
                ['C\'est le mode opératoire du poste', false],
                ['C\'est le check-liste de maintenance premier niveau', false],
                ['C\'est un document qui donne des informations visuelle sur la qualité d\'un état ou produit', true],
            ],
            // Question 12: La définition exacte de la politique de qualité est
            [
                ['Satisfaire les besoins du client en minimisant les coûts de la qualité', false],
                ['Satisfaire les besoins du client avec 0 défaut et dépaser ses attentes', true],
                ['Etre exegents avec les fournisseurs pour assurer la qualité du produit', false],
            ],
            // Question 13: La définition exacte de la politique d'environnement
            [
                ['La protection de la santé du personnel,Le respet de l\'ordre et propreté du poste de travail,La séparation des déchets et le traitement du résidus toxique', true],
                ['Le respet de l\'ordre et propreté du poste de travail', false],
                ['La séparation des déchets et le traitement du résidus toxique', false],
            ],
            // Question 14: Cocher les trois consignes de sécurité
            [
                ['Interdit le port des bijoux ,interdit de macher le chwingum,interdit de porter les casquettes', true],
                ['Interdit de manger ,interdit de porter les chaussures fermé,le port des bijoux obligatoir', false],
                ['Interdit le port des bijoux ,macher le chwingum obligatoire ,interdit de porter les casquettes', false],
            ],
            // Question 15: Citer les 5S?
            [
                ['Débarasser; ranger nettoyer, ordre,rigeur', true],
                ['Débarasser;Jouer, ranger nettoyer, ordre,enrubannage', false],
                ['Courir, ranger, nettoyer, ordre,enrubannage', false],
            ],
            // Question 16: Cocher les Valeurs d'APTIV
            [
                ['Jouer pour gagner, ,penser et agir en entrepreneur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
                ['Jouer pour gagner, une équipe ,penser et agir en entrepreneur, Agir avec le sens de l\'urgence, vouloir atteindre ses objectifs,,agir avec respet', true],
                ['Jouer pour gagner, penser et agir comme un joueur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
            ],
        ];

        // Create all answers
        $i = 0;
        foreach ($questions as $question) {
            if (isset($answers[$i])) {
                foreach ($answers[$i] as $answer) {
                    repo::create([
                        'quz_id' => $question->id,
                        'answer_text' => $answer[0],
                        'is_correct' => $answer[1],
                    ]);
                }
            }
            $i++;
        }

        $this->command->info('Created answers for Mangueras questions');
    }
    
    /**
     * Seed answers for Schleuniger Dénudage questions
     */
    private function seedSchleunigerDenudageAnswers(): void
    {
        // Get questions for Schleuniger Dénudage
        $questions = DB::table('quzs')
            ->join('categories', 'quzs.categories_id', '=', 'categories.id')
            ->where('categories.title', 'Schleuniger Dénudage')
            ->select('quzs.*')
            ->get();
            
        // Define answers for each question
        $answers = [
            // Question 1: La machine schleuniger dénudage est une machine
            [
                ['Une machine automatique de sertissage', false],
                ['Une machine automatique de coupe et de dénudage', true],
                ['Une machine automatique de coupe', false],
            ],
            // Question 2: Donner la définition d'un conducteur électrique
            [
                ['Il est constitué par un nombre déterminé de filaments et d\'un revêtement isolant.', false],
                ['Il est constitué par un nombre déterminé de filaments et d\'un revêtement isolant. Il transmet le courant électrique d\'un point à un autre avec une perte minimale d\'énergie', true],
                ['Il est constitué par un nombre déterminé de filaments et d\'un revêtement', false],
            ],
            // Question 3: Quand faire Si la longueur mesurée n'est pas correcte
            [
                ['Introduire le nouveau facteur de correction en utilisant la formule suivante [Facteur = 100* Longueur souhaité / Longueur mesurée]', true],
                ['Introduire le nouveau facteur de correction en utilisant la formule suivante [Facteur =200* Longueur souhaité / Longueur mesurée]', false],
                ['Introduire le nouveau facteur de correction en utilisant la formule suivante [Facteur = 1000* Longueur souhaité / Longueur mesurée]', false],
            ],
            // Question 4: Quels sont les systèmes utilisés dans notre organisation?
            [
                ['Système FIFO', false],
                ['Système LIFO', false],
                ['Système FIFO&PULL', true],
            ],
            // Question 5: C'est quoi le systéme FIFO?
            [
                ['Premier sorti ,premier entré', false],
                ['Premier entré, premier sorti', true],
                ['Aucune réponse', false],
            ],
            // Question 6: Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées
            [
                ['Au début de chaque quart de travail', true],
                ['À la fin du quart de travail', false],
                ['Pendant le quart de travail', false],
            ],
            // Question 7: Quelle est la documentation utilisée dans votre poste de travail?
            [
                ['Feuille de prise de donnée,mode Opératoire, check-liste de maintenence 1er niveau, les aides visuels,Sos, FTQ', true],
                ['Feuille de prise de donnée; la fiche technique, mode Opératoire,étiquette,', false],
                ['Check-liste de maintenence 1er niveau, les aides visuels; suivi de production chaque 2 heures', false],
            ],
            // Question 8: Choisir la définition exacte du Mode Opératoire
            [
                ['C\'est la fiche technique d\'une chaîne de mantage', false],
                ['C\'est un document qui définit les opérations des opérateurs dans le poste de travail', true],
                ['C\'est une Aide visuelle pour le poste d\'encliquitage', false],
            ],
            // Question 9: Choisir la définition exacte du Aide Visuelle
            [
                ['C\'est le mode opératoire du poste', false],
                ['C\'est le check-liste de maintenance premier niveau', false],
                ['C\'est un document qui donne des informations visuelle sur la qualité d\'un état ou produit', true],
            ],
            // Question 10: La définition exacte de la politique de qualité est
            [
                ['Satisfaire les besoins du client en minimisant les coûts de la qualité', false],
                ['Satisfaire les besoins du client avec 0 défaut et dépaser ses attentes', true],
                ['Etre exegents avec les fournisseurs pour assurer la qualité du produit', false],
            ],
            // Question 11: La définition exacte de la politique d'environnement
            [
                ['La protection de la santé du personnel,Le respet de l\'ordre et propreté du poste de travail,La séparation des déchets et le traitement du résidus toxique', true],
                ['Le respet de l\'ordre et propreté du poste de travail', false],
                ['La séparation des déchets et le traitement du résidus toxique', false],
            ],
            // Question 12: Cocher les trois consignes de sécurité
            [
                ['Interdit le port des bijoux ,interdit de macher le chwingum,interdit de porter les casquettes', true],
                ['Interdit de manger ,interdit de porter les chaussures fermé,le port des bijoux obligatoir', false],
                ['Interdit le port des bijoux ,macher le chwingum obligatoire ,interdit de porter les casquettes', false],
            ],
            // Question 13: Citer les 5S?
            [
                ['Débarasser; ranger nettoyer, ordre,rigeur', true],
                ['Débarasser;Jouer, ranger nettoyer, ordre,enrubannage', false],
                ['Courir, ranger, nettoyer, ordre,enrubannage', false],
            ],
            // Question 14: Cocher les Valeurs d'APTIV
            [
                ['Jouer pour gagner, ,penser et agir en entrepreneur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
                ['Jouer pour gagner, une équipe ,penser et agir en entrepreneur, Agir avec le sens de l\'urgence, vouloir atteindre ses objectifs,,agir avec respet', true],
                ['Jouer pour gagner, penser et agir comme un joueur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
            ],
        ];

        // Create all answers
        $i = 0;
        foreach ($questions as $question) {
            if (isset($answers[$i])) {
                foreach ($answers[$i] as $answer) {
                    repo::create([
                        'quz_id' => $question->id,
                        'answer_text' => $answer[0],
                        'is_correct' => $answer[1],
                    ]);
                }
            }
            $i++;
        }

        $this->command->info('Created answers for Schleuniger Dénudage questions');
    }
    
    /**
     * Seed answers for Sertissage 2 questions
     */
    private function seedSertissage2Answers(): void
    {
        // Get questions for Sertissage
        $questions = DB::table('quzs')
            ->join('categories', 'quzs.categories_id', '=', 'categories.id')
            ->where('categories.title', 'Sertissage')
            ->select('quzs.*')
            ->get();
            
        // Define answers for each question
        $answers = [
            // Question: Donner la définition d'un conducteur électrique
            [
                ['Il est constitué par un nombre déterminé de filaments et d\'un revêtement isolant.', false],
                ['Il est constitué par un nombre déterminé de filaments et d\'un revêtement isolant.il transmet le courant électrique d\'un point à un autre', true],
                ['Il est constitué par un nombre non déterminé de filaments et d\'un revêtement isolant.il transmet le courant électrique d\'un point à un autre', false],
            ],
            // Question: Comment on distingue les fils par
            [
                ['La couleur', false],
                ['la couleur, section et le type de revêtement', true],
                ['Le type de revêtement', false],
            ],
            // Question: Quelle est la définition de sertissage ?
            [
                ['C\'est l\'union d\'un terminal avec un seul fil', false],
                ['C\'est l\'union d\'un terminal avec un fil ou plusieurs fils, grâce à une compression par un outillage, en garantissant une perte minimale d\'énergie et une force d\'attraction maximale', true],
                ['C\'est l\'union d\'un connecteur avec un seul fil ou plusieurs fils', false],
            ],
            // Question: La presse de sertissage un moyen qui permet à l'outil de sertissage de
            [
                ['Bien effectuer son rôle de sertissage', false],
                ['Fournit l\'enrgie nécessaire à l\'outil', false],
                ['Bien effectuer son rôle de sertissage et fournit l\'enrgie nécessaire à l\'outil', true],
            ],
            // Question: Comment il s'appelle le sertissage de grande section
            [
                ['Sertissage Hunk', true],
                ['Sertissage stripper', false],
                ['Sertissage union', false],
            ],
            // Question: Quels sont moyens de contrôle des paramètres du sertissage
            [
                ['Micromètre,pied à coulisse, dynamomètre', true],
                ['Dynamomètre', false],
                ['Pied à coulisse, dynamomètre', false],
            ],
            // Question: Le poinçon c'est La pièce responsable de
            [
                ['Pour courber la trompette', false],
                ['Pour courber les griffes du terminal', true],
                ['Pour courber la zone de conexion du terminal', false],
            ],
            // Question: Quand l'opération du réglage de sertissage est nécessaire
            [
                ['Un changement d\'outil, terminal,section du câble et intervention technique sur l\'outil', true],
                ['Un changement de terminal et section du câble', false],
                ['Un changement de section du câble et intervention technique sur l\'outil', false],
            ],
            // Question: Pour assurer la qualité de sertissage on doit contrôler
            [
                ['Aspect visuel', false],
                ['Aspect visuel, Aspect dimensionnel et Aspet fonctionnel', true],
                ['Aspect dimensionnel', false],
            ],
            // Question: C'est quoi le systéme FIFO?
            [
                ['Premier sorti ,premier entré', false],
                ['Premier entré, premier sorti', true],
                ['Aucune réponse', false],
            ],
            // Question: Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?
            [
                ['Au début de chaque quart de travail', true],
                ['À la fin du quart de travail', false],
                ['Pendant le quart de travail', false],
            ],
            // Question: Quelle est la documentation utilisée dans votre poste de travail?
            [
                ['Feuille de prise de donnée,mode Opératoire, check-liste de maintenence 1er niveau, les aides visuelles,Sos, FTQ', true],
                ['Feuille de prise de donnée; la fiche technique, mode Opératoire,étiquette,', false],
                ['Check-liste de maintenence 1er niveau, les aides visuelles, SOS, l\'instruction du travail', false],
            ],
            // Question: Choisir la définition exacte du <<Mode Opératoire>>
            [
                ['C\'est la fiche technique d\'une chaîne de mantage', false],
                ['C\'est un document qui définit les opérations des opérateurs dans le poste de travail', true],
                ['C\'est une Aide visuelle pour le poste d\'encliquitage', false],
            ],
            // Question: Choisir la définition exacte du <<Aide Visuelle>>
            [
                ['C\'est le mode opératoire du poste', false],
                ['C\'est le check-liste de maintenance premier niveau', false],
                ['C\'est un document qui donne des informations visuelle sur la qualité d\'un état ou produit', true],
            ],
            // Question: La définition exacte de la politique de qualité est
            [
                ['Satisfaire les besoins du client en minimisant les coûts de la qualité', false],
                ['Satisfaire les besoins du client avec 0 défaut et dépaser ses attentes', true],
                ['Etre exegents avec les fournisseurs pour assurer la qualité du produit', false],
            ],
            // Question: La définition exacte de la politique d'environnement
            [
                ['La protection de la santé du personnel,Le respet de l\'ordre et propreté du poste de travail,La séparation des déchets et le traitement du résidus toxique', true],
                ['Le respet de l\'ordre et propreté du poste de travail', false],
                ['La séparation des déchets et le traitement du résidus toxique', false],
            ],
            // Question: Cocher les trois consignes de sécurité
            [
                ['Interdit le port des bijoux ,interdit de macher le chwingum,interdit de porter les casquettes', true],
                ['Interdit de manger ,interdit de porter les chaussures fermé,le port des bijoux obligatoir', false],
                ['Interdit le port des bijoux ,macher le chwingum obligatoire ,interdit de porter les casquettes', false],
            ],
            // Question: Citer les 5S?
            [
                ['Débarasser; ranger nettoyer, ordre,rigeur', true],
                ['Débarasser;Jouer, ranger nettoyer, ordre,enrubannage', false],
                ['Courir, ranger, nettoyer, ordre,enrubannage', false],
            ],
            // Question: Cocher les Valeurs d'APTIV
            [
                ['Jouer pour gagner, ,penser et agir en entrepreneur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
                ['Jouer pour gagner, une équipe ,penser et agir en entrepreneur, Agir avec le sens de l\'urgence, vouloir atteindre ses objectifs,,agir avec respet', true],
                ['Jouer pour gagner, penser et agir comme un joueur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
            ],
        ];

        // Create all answers for new questions
        $i = 0;
        foreach ($questions as $question) {
            if (isset($answers[$i])) {
                foreach ($answers[$i] as $answer) {
                    repo::create([
                        'quz_id' => $question->id,
                        'answer_text' => $answer[0],
                        'is_correct' => $answer[1],
                    ]);
                }
            }
            $i++;
        }

        $this->command->info('Created answers for Sertissage questions');
    }
    
    /**
     * Seed answers for S. Crimping questions
     */
    private function seedSCrimpingAnswers(): void
    {
        // Get questions for S. Crimping
        $questions = DB::table('quzs')
            ->join('categories', 'quzs.categories_id', '=', 'categories.id')
            ->where('categories.title', 'S. Crimping')
            ->select('quzs.*')
            ->get();
            
        // Define answers for each question
        $answers = [
            // Question 1: Quelle est la définition de sertissage ?
            [
                ['C\'est l\'union d\'un terminal avec un seul fil', false],
                ['C\'est l\'union d\'un terminal avec un fil ou plusieurs fils, grâce à une compression par un outillage, en garantissant une perte minimale d\'énergie et une force d\'attraction maximale', true],
                ['C\'est l\'union d\'un connecteur avec un seul fil ou plusieurs fils', false],
            ],
            // Question 2: Quels sont les types de sertissage dans les presses pawomat
            [
                ['Sertissage simple', false],
                ['Sertissage simple et sertissage avec seal', true],
                ['Sertissage avec seal', false],
            ],
            // Question 3: La machine Pawomat est une presse de sertissage équipée
            [
                ['Un applicateur de Seal', false],
                ['Une dénudeuse et d\'un applicateur de Seal', true],
                ['Une dénudeuse', false],
            ],
            // Question 4: Quels sont les types de presses Stripper-crimper
            [
                ['Pawomat PSC', false],
                ['Pawomat SMP et Pawomat PSC', true],
                ['Pawomat SMP', false],
            ],
            // Question 5: Quand l'opération du réglage de sertissage est nécessaire
            [
                ['Un changement d\'outil, terminal,section du câble et intervention technique sur l\'outil', true],
                ['Un changement de terminal et section du câble', false],
                ['Un changement de section du câble et intervention technique sur l\'outil', false],
            ],
            // Question 6: C'est quoi le systéme FIFO?
            [
                ['Premier sorti ,premier entré', false],
                ['Premier entré, premier sorti', true],
                ['Aucune réponse', false],
            ],
            // Question 7: Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?
            [
                ['Au début de chaque quart de travail', true],
                ['À la fin du quart de travail', false],
                ['Pendant le quart de travail', false],
            ],
            // Question 8: Quelle est la documentation utilisée dans votre poste de travail?
            [
                ['Feuille de prise de donnée,mode Opératoire, check-liste de maintenence 1er niveau, les aides visuels,Sos, FTQ', true],
                ['Feuille de prise de donnée; la fiche technique, mode Opératoire,étiquette,', false],
                ['Check-liste de maintenence 1er niveau, les aides visuelles, SOS, l\'instruction du travail', false],
            ],
            // Question 9: Choisir la définition exacte du <<Mode Opératoire>>
            [
                ['C\'est la fiche technique d\'une chaîne de mantage', false],
                ['C\'est un document qui définit les opérations des opérateurs dans le poste de travail', true],
                ['C\'est une Aide visuelle pour le poste d\'encliquitage', false],
            ],
            // Question 10: Choisir la définition exacte du <<Aide Visuelle>>
            [
                ['C\'est le mode opératoire du poste', false],
                ['C\'est le check-liste de maintenance premier niveau', false],
                ['C\'est un document qui donne des informations visuelle sur la qualité d\'un état ou produit', true],
            ],
            // Question 11: La définition exacte de la politique de qualité est
            [
                ['Satisfaire les besoins du client en minimisant les coûts de la qualité', false],
                ['Satisfaire les besoins du client avec 0 défaut et dépaser ses attentes', true],
                ['Etre exegents avec les fournisseurs pour assurer la qualité du produit', false],
            ],
            // Question 12: La définition exacte de la politique d'environnement
            [
                ['La protection de la santé du personnel,Le respet de l\'ordre et propreté du poste de travail,La séparation des déchets et le traitement du résidus toxique', true],
                ['Le respet de l\'ordre et propreté du poste de travail', false],
                ['La séparation des déchets et le traitement du résidus toxique', false],
            ],
            // Question 13: Cocher les trois consignes de sécurité
            [
                ['Interdit le port des bijoux ,interdit de macher le chwingum,interdit de porter les casquettes', true],
                ['Interdit de manger ,interdit de porter les chaussures fermé,le port des bijoux obligatoir', false],
                ['Interdit le port des bijoux ,macher le chwingum obligatoire ,interdit de porter les casquettes', false],
            ],
            // Question 14: Citer les 5S?
            [
                ['Débarasser; ranger nettoyer, ordre,rigeur', true],
                ['Débarasser;Jouer, ranger nettoyer, ordre,enrubannage', false],
                ['Courir, ranger, nettoyer, ordre,enrubannage', false],
            ],
            // Question 15: Cocher les Valeurs d'APTIV
            [
                ['Jouer pour gagner, ,penser et agir en entrepreneur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
                ['Jouer pour gagner, une équipe ,penser et agir en entrepreneur, Agir avec le sens de l\'urgence, vouloir atteindre ses objectifs,,agir avec respet', true],
                ['Jouer pour gagner, penser et agir comme un joueur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
            ],
        ];

        // Create all answers
        $i = 0;
        foreach ($questions as $question) {
            if (isset($answers[$i])) {
                foreach ($answers[$i] as $answer) {
                    repo::create([
                        'quz_id' => $question->id,
                        'answer_text' => $answer[0],
                        'is_correct' => $answer[1],
                    ]);
                }
            }
            $i++;
        }

        $this->command->info('Created answers for S. Crimping questions');
    }
    
    /**
     * Seed answers for Torsado/BT 188 questions
     */
    private function seedTorsadoBt188Answers(): void
    {
        // Get questions for Torsado/BT 188
        $questions = DB::table('quzs')
            ->join('categories', 'quzs.categories_id', '=', 'categories.id')
            ->where('categories.title', 'Torsado/BT 188')
            ->select('quzs.*')
            ->get();
            
        // Define answers for each question
        $answers = [
            // Question 1: Quel est la définition du torsadage ?
            [
                ['La torsade est une opération d\'assemblage d\'un fil a l\'aide d \'un processus qui s\'appelle La machine de torsade.', false],
                ['La torsade est une opération d\'assemblage de deux ou plusieurs fils torsés entre eux a l\'aide d \'un processus qui s\'appelle La machine de torsade.', true],
                ['La torsade est une opération d\'assemblage de deux ou plusieurs fils torsés entre eux a l\'aide d \'un processus qui s\'appelle La machine de sertissage', false],
            ],
            // Question 2: La torsade permet d'éliminé
            [
                ['les signaux parasites électromagnétique.', false],
                ['l\'inversion et désencliquitage des terminaux', false],
                ['les signaux parasites électromagnétique et assurer une tenue mécanique et structurelle dans le cas du pas d\'assemblage.', true],
            ],
            // Question 3: Quelles sont les caractaristiques des fils torsadés
            [
                ['Les extrémités ouvertes, le pas, Longueur torsadé, Longueur finale.', true],
                ['Le pas, longueur finale.', false],
                ['Les extrémités ouvertes', false],
            ],
            // Question 4: Quelle est la direction des pas de torsadage
            [
                ['S ou Z', true],
                ['Z ou M', false],
                ['s', false],
            ],
            // Question 5: Comment on doit ajuster la pression des pinces de fixation et la pression cylindrique selon
            [
                ['les aides visuelles du poste de travail', false],
                ['la fiche technique des donnés', true],
                ['l\'instruction de travail du poste', false],
            ],
            // Question 6: Quels sont les systèmes utilisés dans notre organisation?
            [
                ['Système FIFO', false],
                ['Système LIFO', false],
                ['Système FIFO&PULL', true],
            ],
            // Question 7: C'est quoi le systéme FIFO?
            [
                ['Premier sorti ,premier entré', false],
                ['Premier entré, premier sorti', true],
                ['Aucune réponse', false],
            ],
            // Question 8: Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?
            [
                ['Au début de chaque quart de travail', true],
                ['À la fin du quart de travail', false],
                ['Pendant le quart de travail', false],
            ],
            // Question 9: Quelle est la documentation utilisée dans votre poste de travail?
            [
                ['Feuille de prise de donnée,mode Opératoire, check-liste de maintenence 1er niveau, les aides visuels,Sos, FTQ', true],
                ['Feuille de prise de donnée; la fiche technique, mode Opératoire,étiquette,', false],
                ['Check-liste de maintenence 1er niveau, les aides visuels; la fiche des paramètres, SOS, les aides visuelles', false],
            ],
            // Question 10: Choisir la définition exacte du <<Mode Opératoire>>
            [
                ['C\'est la fiche technique d\'une chaîne de mantage', false],
                ['C\'est un document qui définit les opérations des opérateurs dans le poste de travail', true],
                ['C\'est une Aide visuelle pour le poste d\'encliquitage', false],
            ],
            // Question 11: Choisir la définition exacte du <<Aide Visuelle>>
            [
                ['C\'est le mode opératoire du poste', false],
                ['C\'est le check-liste de maintenance premier niveau', false],
                ['C\'est un document qui donne des informations visuelle sur la qualité d\'un état ou produit', true],
            ],
            // Question 12: La définition exacte de la politique de qualité est
            [
                ['Satisfaire les besoins du client en minimisant les coûts de la qualité', false],
                ['Satisfaire les besoins du client avec 0 défaut et dépaser ses attentes', true],
                ['Etre exegents avec les fournisseurs pour assurer la qualité du produit', false],
            ],
            // Question 13: La définition exacte de la politique d'environnement
            [
                ['La protection de la santé du personnel,Le respet de l\'ordre et propreté du poste de travail,La séparation des déchets et le traitement du résidus toxique', true],
                ['Le respet de l\'ordre et propreté du poste de travail', false],
                ['La séparation des déchets et le traitement du résidus toxique', false],
            ],
            // Question 14: Cocher les trois consignes de sécurité
            [
                ['Interdit le port des bijoux ,interdit de macher le chwingum,interdit de porter les casquettes', true],
                ['Interdit de manger ,interdit de porter les chaussures fermé,le port des bijoux obligatoir', false],
                ['Interdit le port des bijoux ,macher le chwingum obligatoire ,interdit de porter les casquettes', false],
            ],
            // Question 15: Citer les 5S?
            [
                ['Débarasser; ranger nettoyer, ordre,rigeur', true],
                ['Débarasser;Jouer, ranger nettoyer, ordre,enrubannage', false],
                ['Courir, ranger, nettoyer, ordre,enrubannage', false],
            ],
            // Question 16: Cocher les Valeurs d'APTIV
            [
                ['Jouer pour gagner, ,penser et agir en entrepreneur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
                ['Jouer pour gagner, une équipe ,penser et agir en entrepreneur, Agir avec le sens de l\'urgence, vouloir atteindre ses objectifs,,agir avec respet', true],
                ['Jouer pour gagner, penser et agir comme un joueur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
            ],
        ];

        // Create all answers
        $i = 0;
        foreach ($questions as $question) {
            if (isset($answers[$i])) {
                foreach ($answers[$i] as $answer) {
                    repo::create([
                        'quz_id' => $question->id,
                        'answer_text' => $answer[0],
                        'is_correct' => $answer[1],
                    ]);
                }
            }
            $i++;
        }

        $this->command->info('Created answers for Torsado/BT 188 questions');
    }
    
    /**
     * Seed answers for Workman Machine questions
     */
    private function seedWorkmanMachineAnswers(): void
    {
        // Get questions for Workman Machine
        $questions = DB::table('quzs')
            ->join('categories', 'quzs.categories_id', '=', 'categories.id')
            ->where('categories.title', 'Workman Machine')
            ->select('quzs.*')
            ->get();
            
        // Define answers for each question
        $answers = [
            // Question 1: Quel est le rôle de test workmane machine?
            [
                ['Test d\'arrachement', false],
                ['Test d\'endommagement des câbles', false],
                ['Faire chauffé la housse', true],
            ],
            // Question 2: La configuration de la machine est spéciale
            [
                ['Temps et Température programmable et ajustement de position de la Housse.', true],
                ['Ajustement de position de la Housse', false],
                ['Temps et Température', false],
            ],
            // Question 3: Dans quel document je dois vérifier le APN terminal, le temps et la température de chauffage
            [
                ['L\'instruction de travail', false],
                ['La fiche technique des paramètres', true],
                ['Les aides visuelles', false],
            ],
            // Question 4: Quels sont les systèmes utilisés dans notre organisation?
            [
                ['Système FIFO', false],
                ['Système LIFO', false],
                ['Système FIFO&PULL', true],
            ],
            // Question 5: C'est quoi le systéme FIFO?
            [
                ['Premier sorti ,premier entré', false],
                ['Premier entré, premier sorti', true],
                ['Aucune réponse', false],
            ],
            // Question 6: Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?
            [
                ['Au début de chaque quart de travail', true],
                ['À la fin du quart de travail', false],
                ['Pendant le quart de travail', false],
            ],
            // Question 7: Quelle est la documentation utilisée dans votre poste de travail?
            [
                ['Feuille de prise de donnée,mode Opératoire, check-liste de maintenence 1er niveau, les aides visuels,Sos, FTQ', true],
                ['Feuille de prise de donnée; la fiche technique, mode Opératoire,étiquette,', false],
                ['Check-liste de maintenence 1er niveau, les aides visuels; la fiche des paramètres, SOS, les aides visuelles', false],
            ],
            // Question 8: Choisir la définition exacte du <<Mode Opératoire>>
            [
                ['C\'est la fiche technique d\'une chaîne de mantage', false],
                ['C\'est un document qui définit les opérations des opérateurs dans le poste de travail', true],
                ['C\'est une Aide visuelle pour le poste d\'encliquitage', false],
            ],
            // Question 9: Choisir la définition exacte du <<Aide Visuelle>>
            [
                ['C\'est le mode opératoire du poste', false],
                ['C\'est le check-liste de maintenance premier niveau', false],
                ['C\'est un document qui donne des informations visuelle sur la qualité d\'un état ou produit', true],
            ],
            // Question 10: La définition exacte de la politique de qualité est
            [
                ['Satisfaire les besoins du client en minimisant les coûts de la qualité', false],
                ['Satisfaire les besoins du client avec 0 défaut et dépaser ses attentes', true],
                ['Etre exegents avec les fournisseurs pour assurer la qualité du produit', false],
            ],
            // Question 11: La définition exacte de la politique d'environnement
            [
                ['La protection de la santé du personnel,Le respet de l\'ordre et propreté du poste de travail,La séparation des déchets et le traitement du résidus toxique', true],
                ['Le respet de l\'ordre et propreté du poste de travail', false],
                ['La séparation des déchets et le traitement du résidus toxique', false],
            ],
            // Question 12: Cocher les trois consignes de sécurité
            [
                ['Interdit le port des bijoux ,interdit de macher le chwingum,interdit de porter les casquettes', true],
                ['Interdit de manger ,interdit de porter les chaussures fermé,le port des bijoux obligatoir', false],
                ['Interdit le port des bijoux ,macher le chwingum obligatoire ,interdit de porter les casquettes', false],
            ],
            // Question 13: Citer les 5S?
            [
                ['Débarasser; ranger nettoyer, ordre,rigeur', true],
                ['Débarasser;Jouer, ranger nettoyer, ordre,enrubannage', false],
                ['Courir, ranger, nettoyer, ordre,enrubannage', false],
            ],
            // Question 14: Cocher les Valeurs d'APTIV
            [
                ['Jouer pour gagner, ,penser et agir en entrepreneur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
                ['Jouer pour gagner, une équipe ,penser et agir en entrepreneur, Agir avec le sens de l\'urgence, vouloir atteindre ses objectifs,,agir avec respet', true],
                ['Jouer pour gagner, penser et agir comme un joueur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
            ],
        ];

        // Create all answers
        $i = 0;
        foreach ($questions as $question) {
            if (isset($answers[$i])) {
                foreach ($answers[$i] as $answer) {
                    repo::create([
                        'quz_id' => $question->id,
                        'answer_text' => $answer[0],
                        'is_correct' => $answer[1],
                    ]);
                }
            }
            $i++;
        }

        $this->command->info('Created answers for Workman Machine questions');
    }
    
    /**
     * Seed answers for Expander Machine questions
     */
    private function seedExpanderMachineAnswers(): void
    {
        // Get questions for Expander Machine
        $questions = DB::table('quzs')
            ->join('categories', 'quzs.categories_id', '=', 'categories.id')
            ->where('categories.title', 'Expander Machine')
            ->select('quzs.*')
            ->get();
            
        // Define answers for each question
        $answers = [
            // Question 1: Quel est le rôle de l'expander machine
            [
                ['Permet d\'ouvrir le passe fils et l\'enfiler sur le câble', true],
                ['Permet de fermer le passe fils et l\'enfiler sur le câble', false],
                ['Permet d\'ouvrir les connecteurs dansr le câble', false],
            ],
            // Question 2: Quels sont les systèmes utilisés dans notre organisation?
            [
                ['Système FIFO', false],
                ['Système LIFO', false],
                ['Système FIFO&PULL', true],
            ],
            // Question 3: C'est quoi le systéme FIFO?
            [
                ['Premier sorti ,premier entré', false],
                ['Premier entré, premier sorti', true],
                ['Aucune réponse', false],
            ],
            // Question 4: Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées ?
            [
                ['Au début de chaque quart de travail', true],
                ['À la fin du quart de travail', false],
                ['Pendant le quart de travail', false],
            ],
            // Question 5: Quelle est la documentation utilisée dans votre poste de travail?
            [
                ['Feuille de prise de donnée,mode Opératoire, check-liste de maintenence 1er niveau, les aides visuels,Sos, FTQ', true],
                ['Feuille de prise de donnée; la fiche technique, mode Opératoire,étiquette,', false],
                ['Check-liste de maintenence 1er niveau, les aides visuels; suivi de production chaque 2 heures', false],
            ],
            // Question 6: Choisir la définition exacte du <<Mode Opératoire>>
            [
                ['C\'est la fiche technique d\'une chaîne de mantage', false],
                ['C\'est un document qui définit les opérations des opérateurs dans le poste de travail', true],
                ['C\'est une Aide visuelle pour le poste d\'encliquitage', false],
            ],
            // Question 7: Choisir la définition exacte du <<Aide Visuelle>>
            [
                ['C\'est le mode opératoire du poste', false],
                ['C\'est le check-liste de maintenance premier niveau', false],
                ['C\'est un document qui donne des informations visuelle sur la qualité d\'un état ou produit', true],
            ],
            // Question 8: La définition exacte de la politique de qualité est
            [
                ['Satisfaire les besoins du client en minimisant les coûts de la qualité', false],
                ['Satisfaire les besoins du client avec 0 défaut et dépaser ses attentes', true],
                ['Etre exegents avec les fournisseurs pour assurer la qualité du produit', false],
            ],
            // Question 9: La définition exacte de la politique d'environnement
            [
                ['La protection de la santé du personnel,Le respet de l\'ordre et propreté du poste de travail,La séparation des déchets et le traitement du résidus toxique', true],
                ['Le respet de l\'ordre et propreté du poste de travail', false],
                ['La séparation des déchets et le traitement du résidus toxique', false],
            ],
            // Question 10: Cocher les trois consignes de sécurité
            [
                ['Interdit le port des bijoux ,interdit de macher le chwingum,interdit de porter les casquettes', true],
                ['Interdit de manger ,interdit de porter les chaussures fermé,le port des bijoux obligatoir', false],
                ['Interdit le port des bijoux ,macher le chwingum obligatoire ,interdit de porter les casquettes', false],
            ],
            // Question 11: Citer les 5S?
            [
                ['Débarasser; ranger nettoyer, ordre,rigeur', true],
                ['Débarasser;Jouer, ranger nettoyer, ordre,enrubannage', false],
                ['Courir, ranger, nettoyer, ordre,enrubannage', false],
            ],
            // Question 12: Cocher les Valeurs d'APTIV
            [
                ['Jouer pour gagner, ,penser et agir en entrepreneur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
                ['Jouer pour gagner, une équipe ,penser et agir en entrepreneur, Agir avec le sens de l\'urgence, vouloir atteindre ses objectifs,,agir avec respet', true],
                ['Jouer pour gagner, penser et agir comme un joueur, Agir avec retardement, vouloir atteindre ses objectifs,,agir avec respet', false],
            ],
        ];

        // Create all answers
        $i = 0;
        foreach ($questions as $question) {
            if (isset($answers[$i])) {
                foreach ($answers[$i] as $answer) {
                    repo::create([
                        'quz_id' => $question->id,
                        'answer_text' => $answer[0],
                        'is_correct' => $answer[1],
                    ]);
                }
            }
            $i++;
        }

        $this->command->info('Created answers for Expander Machine questions');
    }
}