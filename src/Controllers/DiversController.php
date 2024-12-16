<?php

namespace App\Controllers;
class DiversController extends AbstractController
{
    public function index() {
        $this->render('divers/brouette');
    }
}

