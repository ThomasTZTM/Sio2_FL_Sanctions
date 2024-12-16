<?php

return [
    // Page Acceuil
    '/' => ['AcceuilController', 'index'],
    '/sanctions' => ['AcceuilController', 'index'],

    // Connexion Deconnexion Inscription
    '/sanctions/create' => ['ConnexionController', 'create'],
    '/sanctions/login' => ['ConnexionController', 'login'],
    '/sanctions/logout' => ['ConnexionController', 'logout'],

    // Mention légal
    '/legal' => ['MentionLegalController', 'legal'],

    // Promotion
    '/promotions' => ['PromotionController', 'index'],
    '/promotion/create' => ['PromotionController', 'create'],
    '/promotion/affichetest' => ['PromotionController', 'index'], // Annexe

    // Import des etudiant
    '/etudiant/import' => ['EtudiantController', 'import'],

    '/sanction/create' => ['SanctionController', 'create'],

];
