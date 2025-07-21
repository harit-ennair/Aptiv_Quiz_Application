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
        
        if (!$komax433Id || !$komax477Id || !$komax550Id || !$sealPaoumatId) {
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
}