<?php

namespace App\Controllers;

use App\Entity\Promotion;
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
        // Vérifier si l'utilisateur est connecté
        $this->requireAuth();

        // Récupérer toutes les promotions
        $promotions = $this->entityManager
            ->getRepository(Promotion::class)
            ->findAll();

        $this->render('promotion/index', [
            'promotions' => $promotions,
            'entityManager' => $this->entityManager
        ]);
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

            if (empty($formData['libelle'])) {
                $errors['libelle'] = "Le libellé est obligatoire";
            }
            if (empty($formData['annee'])) {
                $errors['annee'] = "L'année est obligatoire";
            }

            if (empty($errors)) {
                try {
                    $promotion = new Promotion();
                    $promotion->setLibelle($formData['libelle']);
                    $promotion->setAnnee($formData['annee']);

                    $this->entityManager->persist($promotion);
                    $this->entityManager->flush();

                    $this->redirect('/promotions');
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