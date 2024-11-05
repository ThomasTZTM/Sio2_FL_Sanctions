<?php

namespace App\Controllers;
class MentionLegalController
{
    // Méthode permettant de gérer la page d'accueil
    public function mention() {
        // Fait appel au modèle afin de récupérer les données dans la BDD
        // Pas besoin
        // Fait appel à la vue afin de renvoyé la page
        require_once __DIR__ . "/../../views/partial/header.php";
        require_once __DIR__ . "/../../views/annexe/mentionlegal.php";
        require_once __DIR__ . "/../../views/partial/footer.php";
    }
}