<?php

namespace App\Controllers;
class AcceuilController extends AbstractController
{
    // Méthode permettant de gérer la page d'accueil
    public function index() {
        $this->render('home/index');
    }
}