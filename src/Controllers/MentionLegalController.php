<?php

namespace App\Controllers;
class MentionLegalController extends AbstractController
{
    // Méthode permettant de gérer la page d'accueil
    public function legal() {
        // Fait appel au modèle afin de récupérer les données dans la BDD
        // Pas besoin
        // Fait appel à la vue afin de renvoyé la page
        $this->render('home/legal');
    }
}