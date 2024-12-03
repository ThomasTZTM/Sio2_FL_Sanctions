<?php

namespace App\Controllers;

use App\Entity\Promotion;
use App\UserStory\CreatePromotion;
use Doctrine\ORM\EntityManager;

class PromotionController extends AbstractController
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function create(): void
    {
        // Vérifier si l'utilisateur est connecté
        $this->requireAuth();

        $errors = [];
        $formData = [
            'libelle' => '',
            'annee' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $formData = [
                'libelle' => $_POST['libelle'] ?? '',
                'annee' => $_POST['annee'] ?? ''
            ];

            // Validation des champs
            if (empty($formData['libelle'])) {
                $errors['libelle'] = "Le libellé est obligatoire";
            }
            if (empty($formData['annee'])) {
                $errors['annee'] = "L'année est obligatoire";
            }

            if (empty($errors)) {
                try {
                    $createPromotion = new CreatePromotion($this->entityManager);
                    $createPromotion->execute($formData['libelle'], $formData['annee']);
                    $this->redirect('/sanctions');
                } catch (\Exception $e) {
                    $errors['general'] = $e->getMessage();
                }
            }
        }

        $this->render('promotion/create', [
            'errors' => $errors,
            'formData' => $formData
        ]);
    }
}