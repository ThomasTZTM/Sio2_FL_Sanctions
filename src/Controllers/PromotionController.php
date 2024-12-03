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

    public function index(): void
    {
        // Si utilisateur connecter
        $this->requireAuth();

        // Récupère toute les promos
        $promotions = $this->entityManager
            ->getRepository(Promotion::class)
            ->findAll();

        $this->render('promotion/index', [
            'promotions' => $promotions
        ]);
    }

    public function create(): void
    {
        // La méthode create existe déjà, on la laisse telle quelle
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

            // Les erreurs :

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
                    $this->redirect('/promotion');
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