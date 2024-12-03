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
    '/promotion/create' => ['PromotionController', 'create'],
    '/promotion/affichetest' => ['PromotionController', 'index'], // Annexe

    // Import des etudiant
    '/etudiant/import' => ['EtudiantController', 'import']
];
