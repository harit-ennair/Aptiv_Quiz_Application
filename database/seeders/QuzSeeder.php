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
        // Get category IDs by title
        $categories = [
            'Térostat' => categories::where('title', 'Térostat')->first(),
            'Epissure UCAB' => categories::where('title', 'Epissure UCAB')->first(),
            'Emballage' => categories::where('title', 'Emballage')->first(),
            'Vissage' => categories::where('title', 'Vissage')->first(),
            'Réparation' => categories::where('title', 'Réparation')->first(),
            'Réparation ROB' => categories::where('title', 'Réparation ROB')->first(),
            'Ultra-sonic Welding' => categories::where('title', 'Ultra-sonic Welding')->first(),
            'Contrôle Molettes' => categories::where('title', 'Contrôle Molettes')->first(),
            'Vision Machine' => categories::where('title', 'Vision Machine')->first(),
            'Ring terminal' => categories::where('title', 'Ring terminal')->first(),
            'Contrôle Goulotte' => categories::where('title', 'Contrôle Goulotte')->first(),
            'Expander Machine' => categories::where('title', 'Expander Machine')->first(),
            'Outpining Machine' => categories::where('title', 'Outpining Machine')->first(),
            'Workman Machine' => categories::where('title', 'Workman Machine')->first(),
            'Sysème Led' => categories::where('title', 'Sysème Led')->first(),
            'Contrôle Eléctrique' => categories::where('title', 'Contrôle Eléctrique')->first(),
            'Sealing' => categories::where('title', 'Sealing')->first(),
        ];

        // Check if categories exist
        foreach ($categories as $title => $category) {
            if (!$category) {
                $this->command->error("Category '$title' not found! Please run CategoriesSeeder first.");
                return;
            }
        }

        // Térostat Quiz Questions (13 questions)
        $terostatQuestions = [
            "Quel est le rôle de l'étanchéité Térostat?",
            "Que peut-il arriver si l'étanchéité n'est pas assurée?",
            "Quels sont les critères de qualité pour le Térostat?",
            "Quelle est la séquence correcte d'application du Térostat?",
            "Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées?",
            "Quelle est la documentation utilisée dans votre poste de travail?",
            "Choisir la définition exacte du Mode Opératoire:",
            "Choisir la définition exacte de l'Aide Visuelle:",
            "La définition exacte de la politique de qualité est:",
            "La définition exacte de la politique d'environnement:",
            "Cocher les trois consignes de sécurité:",
            "Citer les 5S?",
            "Cocher les Valeurs d'APTIV:"
        ];

        // Epissure UCAB Quiz Questions (15 questions)
        $epissureQuestions = [
            "Qu'est-ce qu'une épissure?",
            "Quels sont les éléments nécessaires pour effectuer une épissure?",
            "Quels sont les critères de qualité d'une épissure?",
            "Quel est le rôle de l'enrubannage?",
            "Quel type de ruban utilise-t-on pour l'enrubannage?",
            "À quoi sert l'analyseur?",
            "Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées?",
            "Quelle est la documentation utilisée dans votre poste de travail?",
            "Choisir la définition exacte du Mode Opératoire:",
            "Choisir la définition exacte de l'Aide Visuelle:",
            "La définition exacte de la politique de qualité est:",
            "La définition exacte de la politique d'environnement:",
            "Cocher les trois consignes de sécurité:",
            "Citer les 5S?",
            "Cocher les Valeurs d'APTIV:"
        ];

        // Emballage Quiz Questions (13 questions)
        $emballageQuestions = [
            "Quel est le rôle d'emballage?",
            "Quelle est l'utilité du Label Management?",
            "Pour placer une palette \"in wait\" l'opérateur doit lire:",
            "Quelles sont les types des étiquettes utilisés dans le poste d'emballage:",
            "Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées?",
            "Quelle est la documentation utilisée dans votre poste de travail?",
            "Choisir la définition exacte du Mode Opératoire:",
            "Choisir la définition exacte de l'Aide Visuelle:",
            "La définition exacte de la politique de qualité est:",
            "La définition exacte de la politique d'environnement:",
            "Cocher les trois consignes de sécurité:",
            "Citer les 5S?",
            "Cocher les Valeurs d'APTIV:"
        ];

        // Vissage Quiz Questions (14 questions)
        $vissageQuestions = [
            "Qu'est-ce que le processus de vissage?",
            "Quels sont les équipements nécessaires pour le vissage?",
            "Quand est-ce que le processus de vissage est OK?",
            "Quels sont les outils de vissage utilisés?",
            "Quel est le rôle du clavier POSCO?",
            "Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées?",
            "Quelle est la documentation utilisée dans votre poste de travail?",
            "Choisir la définition exacte du Mode Opératoire:",
            "Choisir la définition exacte de l'Aide Visuelle:",
            "La définition exacte de la politique de qualité est:",
            "La définition exacte de la politique d'environnement:",
            "Cocher les trois consignes de sécurité:",
            "Citer les 5S?",
            "Cocher les Valeurs d'APTIV:"
        ];

        // Réparation Quiz Questions (16 questions)
        $reparationQuestions = [
            "Qu'est-ce que la réparation?",
            "Comment considérer la réparation?",
            "Quelles sont les anomalies à réparer?",
            "Qui peut effectuer la réparation?",
            "Comment déterminer la méthode de réparation?",
            "Comment choisir l'outil de réparation?",
            "Quelle étiquette utiliser après réparation?",
            "Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées?",
            "Quelle est la documentation utilisée dans votre poste de travail?",
            "Choisir la définition exacte du Mode Opératoire:",
            "Choisir la définition exacte de l'Aide Visuelle:",
            "La définition exacte de la politique de qualité est:",
            "La définition exacte de la politique d'environnement:",
            "Cocher les trois consignes de sécurité:",
            "Citer les 5S?",
            "Cocher les Valeurs d'APTIV:"
        ];

        // Réparation ROB Quiz Questions (15 questions)
        $reparationROBQuestions = [
            "Qu'est-ce que la réparation ROB?",
            "Comment considérer la réparation?",
            "Quelles sont les anomalies courantes sur ROB?",
            "Qui établit les méthodes de réparation?",
            "Que faire avec un connecteur défaillant?",
            "Qui valide la réparation?",
            "Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées?",
            "Quelle est la documentation utilisée dans votre poste de travail?",
            "Choisir la définition exacte du Mode Opératoire:",
            "Choisir la définition exacte de l'Aide Visuelle:",
            "La définition exacte de la politique de qualité est:",
            "La définition exacte de la politique d'environnement:",
            "Cocher les trois consignes de sécurité:",
            "Citer les 5S?",
            "Cocher les Valeurs d'APTIV:"
        ];

        // USW Quiz Questions (28 questions)
        $uswQuestions = [
            "Qu'est-ce qu'une épissure USW?",
            "La longueur dépouillée des fils pour cette épissure doit:",
            "Quelles précautions devez-vous prendre avec les parties dépouillées de ces fils?",
            "Comment les pièces dépouillées doivent-elles être placées dans la machine?",
            "Le chevauchement des parties dépouillées des fils doit:",
            "Quelle est la distance entre isolation et épissure qui doit être respectée?",
            "La zone de soudage Splice doit:",
            "L'épissure de la figure 2 est:",
            "L'épissure de la figure 3 est:",
            "Selon la figure 4, quelle est la fonctionnalité de la commande F2?",
            "Selon la figure 4, quelle est la fonctionnalité de la commande F4?",
            "Selon la figure 4, quelle est la fonctionnalité de la commande F5?",
            "Quand devriez-vous régler les compteurs sur \"0\"?",
            "Selon la figure 5, quelle est l'interprétation de l'erreur?",
            "Quelles sont les causes possibles de cette erreur?",
            "Selon la figure 6, quelle est l'interprétation de l'erreur?",
            "Selon la figure 7, quelle est l'interprétation de l'erreur?",
            "Pourquoi l'utilisation de gants est-elle obligatoire lors de la production d'épissures à ultrasons?",
            "Selon la figure 8, de combien de fils avons-nous besoin dans cette configuration?",
            "Selon la figure 8, quelle est la section transversale du fil abc-1?",
            "Selon la figure 8, quel est le nom de l'épissure en cours de production?",
            "Comment réparer une épissure défectueuse?",
            "Avant d'isoler une épissure, vous devez:",
            "Que signifie « vérification de l'épissure »?",
            "Quel type d'isolation doit être placé sur chaque épissure?",
            "Décrivez la légende de la figure 9:",
            "Combien de fois pouvez-vous refaire l'épissure en utilisant les mêmes fils?",
            "Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées?"
        ];

        // Contrôle Molette Quiz Questions (12 questions)
        $controleMoletteQuestions = [
            "Quel est le rôle de la contention?",
            "Quels sont les éléments de contention?",
            "Quels sont les équipements nécessaires?",
            "Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées?",
            "Quelle est la documentation utilisée dans votre poste de travail?",
            "Choisir la définition exacte du Mode Opératoire:",
            "Choisir la définition exacte de l'Aide Visuelle:",
            "La définition exacte de la politique de qualité est:",
            "La définition exacte de la politique d'environnement:",
            "Cocher les trois consignes de sécurité:",
            "Citer les 5S?",
            "Cocher les Valeurs d'APTIV:"
        ];

        // Vision Machine Quiz Questions (12 questions)
        $visionMachineQuestions = [
            "Qu'est-ce qu'un relais?",
            "Qu'est-ce qu'un fusible?",
            "Quelle étiquette doit être utilisée?",
            "Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées?",
            "Quelle est la documentation utilisée dans votre poste de travail?",
            "Choisir la définition exacte du Mode Opératoire:",
            "Choisir la définition exacte de l'Aide Visuelle:",
            "La définition exacte de la politique de qualité est:",
            "La définition exacte de la politique d'environnement:",
            "Cocher les trois consignes de sécurité:",
            "Citer les 5S?",
            "Cocher les Valeurs d'APTIV:"
        ];

        // Ring Terminal Quiz Questions (13 questions)
        $ringTerminalQuestions = [
            "Qu'est-ce que le soudage USW sur ring terminal?",
            "Quels sont les éléments nécessaires?",
            "Quels sont les critères de qualité?",
            "Quelle est la séquence de soudage?",
            "Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées?",
            "Quelle est la documentation utilisée dans votre poste de travail?",
            "Choisir la définition exacte du Mode Opératoire:",
            "Choisir la définition exacte de l'Aide Visuelle:",
            "La définition exacte de la politique de qualité est:",
            "La définition exacte de la politique d'environnement:",
            "Cocher les trois consignes de sécurité:",
            "Citer les 5S?",
            "Cocher les Valeurs d'APTIV:"
        ];

        // Contrôle Goulotte Quiz Questions (13 questions)
        $controleGoulotteQuestions = [
            "Quel est le rôle de la goulotte?",
            "Que faut-il contrôler sur la goulotte?",
            "Que faut-il vérifier sur les dérivations?",
            "Quelle étiquette utiliser?",
            "Que doit contenir l'étiquette contrôle goulotte?",
            "Quelle est la documentation utilisée dans votre poste de travail?",
            "Choisir la définition exacte du Mode Opératoire:",
            "Choisir la définition exacte de l'Aide Visuelle:",
            "La définition exacte de la politique de qualité est:",
            "La définition exacte de la politique d'environnement:",
            "Cocher les trois consignes de sécurité:",
            "Citer les 5S?",
            "Cocher les Valeurs d'APTIV:"
        ];

        // Expander Machine Quiz Questions (11 questions)
        $expanderMachineQuestions = [
            "À quoi sert l'Expander Machine?",
            "Quelle est la méthode d'utilisation?",
            "Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées?",
            "Quelle est la documentation utilisée dans votre poste de travail?",
            "Choisir la définition exacte du Mode Opératoire:",
            "Choisir la définition exacte de l'Aide Visuelle:",
            "La définition exacte de la politique de qualité est:",
            "La définition exacte de la politique d'environnement:",
            "Cocher les trois consignes de sécurité:",
            "Citer les 5S?",
            "Cocher les Valeurs d'APTIV:"
        ];

        // Outpining Machine Quiz Questions (15 questions)
        $outpiningQuestions = [
            "Qu'est-ce que l'Outpining?",
            "Quelle est la séquence d'utilisation?",
            "Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées?",
            "Quelle est la documentation utilisée dans votre poste de travail?",
            "Choisir la définition exacte du Mode Opératoire:",
            "Choisir la définition exacte de l'Aide Visuelle:",
            "La définition exacte de la politique de qualité est:",
            "La définition exacte de la politique d'environnement:",
            "Cocher les trois consignes de sécurité:",
            "Citer les 5S?",
            "Cocher les Valeurs d'APTIV:"
        ];

        // Workman Machine Quiz Questions (12 questions)
        $workmanMachineQuestions = [
            "À quoi sert la Workman Machine?",
            "Quels sont les paramètres de la machine?",
            "Quels sont les critères de qualité?",
            "Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées?",
            "Quelle est la documentation utilisée dans votre poste de travail?",
            "Choisir la définition exacte du Mode Opératoire:",
            "Choisir la définition exacte de l'Aide Visuelle:",
            "La définition exacte de la politique de qualité est:",
            "La définition exacte de la politique d'environnement:",
            "Cocher les trois consignes de sécurité:",
            "Citer les 5S?",
            "Cocher les Valeurs d'APTIV:"
        ];

        // Led System Quiz Questions (12 questions)
        $ledSystemQuestions = [
            "Quel est le rôle du système LED?",
            "Comment utiliser le système LED?",
            "Quel est l'avantage du système?",
            "Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées?",
            "Quelle est la documentation utilisée dans votre poste de travail?",
            "Choisir la définition exacte du Mode Opératoire:",
            "Choisir la définition exacte de l'Aide Visuelle:",
            "La définition exacte de la politique de qualité est:",
            "La définition exacte de la politique d'environnement:",
            "Cocher les trois consignes de sécurité:",
            "Citer les 5S?",
            "Cocher les Valeurs d'APTIV:"
        ];

        // Contrôle Électrique Quiz Questions (15 questions)
        $controleElectriqueQuestions = [
            "Que contrôle-t-on pendant le contrôle électrique?",
            "Quelles sont les anomalies détectées par ROB?",
            "Le contrôle électrique est-il obligatoire?",
            "Que fait-on en cas de défaut?",
            "Où place-t-on l'étiquette de contrôle électrique?",
            "L'étiquetage est-il obligatoire?",
            "Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées?",
            "Quelle est la documentation utilisée dans votre poste de travail?",
            "Choisir la définition exacte du Mode Opératoire:",
            "Choisir la définition exacte de l'Aide Visuelle:",
            "La définition exacte de la politique de qualité est:",
            "La définition exacte de la politique d'environnement:",
            "Cocher les trois consignes de sécurité:",
            "Citer les 5S?",
            "Cocher les Valeurs d'APTIV:"
        ];

        // SC CC Firewall Quiz Questions (14 questions)
        $scCcFirewallQuestions = [
            "Quel type de contrôle représente SC/CC?",
            "Comment interpréter les filtres de contrôle?",
            "Qu'est-ce que le ROB?",
            "Qu'est-ce que le Firewall?",
            "Pourquoi utiliser ces contrôles?",
            "Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées?",
            "Quelle est la documentation utilisée dans votre poste de travail?",
            "Choisir la définition exacte du Mode Opératoire:",
            "Choisir la définition exacte de l'Aide Visuelle:",
            "La définition exacte de la politique de qualité est:",
            "La définition exacte de la politique d'environnement:",
            "Cocher les trois consignes de sécurité:",
            "Citer les 5S?",
            "Cocher les Valeurs d'APTIV:"
        ];

        // Sealing Quiz Questions (20 questions)
        $sealingQuestions = [
            "Quel est le rôle de l'isolation par tube rétractable?",
            "Quel type d'appareil pouvons-nous utiliser pour l'isolation des épissures?",
            "Avant d'isoler une épissure, nous devons:",
            "En quoi consiste le contrôle d'une épissure?",
            "Quel type d'isolation devons-nous réaliser pour chaque épissure?",
            "Le tube d'isolement doit être:",
            "Quelles peuvent être les conséquences d'une épissure mal isolée?",
            "Si l'isolation des fils est brûlée pendant le temps de rétraction, nous devons:",
            "L'utilisation de gants dans le processus de rétraction est:",
            "Que devons-nous faire avant d'allumer l'appareil Shrinking?",
            "Quand les interventions de maintenance de 1er niveau doivent-elles être effectuées et enregistrées?",
            "Quel type de machine représente la figure 1?",
            "D'après la figure 1, quel type d'informations collectons-nous sur les compteurs A et B?",
            "Selon le Non Conformance Board, veuillez identifier le problème de l'isolation A?",
            "Conformément au Comité de non-conformité, veuillez identifier le problème de l'isolation B?",
            "Selon le Non Conformance Board, veuillez identifier le problème de l'isolation C?",
            "Conformément au Non Conformance Board, veuillez identifier le problème de l'isolation D?",
            "Selon le Non Conformance Board, veuillez identifier le problème de l'isolation E?",
            "Selon le Non Conformance Board, veuillez identifier le problème de l'isolation F?",
            "Présentez ici les questions locales / spécifications des clients"
        ];

        // Create all quiz questions
        $quizData = [
            'Térostat' => $terostatQuestions,
            'Epissure UCAB' => $epissureQuestions,
            'Emballage' => $emballageQuestions,
            'Vissage' => $vissageQuestions,
            'Réparation' => $reparationQuestions,
            'Réparation ROB' => $reparationROBQuestions,
            'Ultra-sonic Welding' => $uswQuestions,
            'Contrôle Molettes' => $controleMoletteQuestions,
            'Vision Machine' => $visionMachineQuestions,
            'Ring terminal' => $ringTerminalQuestions,
            'Contrôle Goulotte' => $controleGoulotteQuestions,
            'Expander Machine' => $expanderMachineQuestions,
            'Outpining Machine' => $outpiningQuestions,
            'Workman Machine' => $workmanMachineQuestions,
            'Sysème Led' => $ledSystemQuestions,
            'Contrôle Eléctrique' => $controleElectriqueQuestions,
            'Sealing' => $sealingQuestions,
        ];

        $totalQuestions = 0;
        foreach ($quizData as $categoryTitle => $questions) {
            $category = $categories[$categoryTitle];
            
            foreach ($questions as $questionText) {
                quz::create([
                    'question_text' => $questionText,
                    'categories_id' => $category->id,
                ]);
                $totalQuestions++;
            }
            
            $this->command->info("Created " . count($questions) . " questions for $categoryTitle");
        }

        $this->command->info("Successfully created $totalQuestions total quiz questions across all categories");
    }
}
