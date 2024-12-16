<?php

namespace App\Controllers;

use App\Entity\Promotion;
use App\Entity\Sanction;
use App\UserStory\CreateSanction;
use Doctrine\ORM\EntityManager;

class SanctionController extends AbstractController
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
        $sanctions = $this->entityManager
            ->getRepository(Sanction::class)
            ->findAll();

        $this->render('sanction/index', [
            'sanctions' => $sanctions,
            'entityManager' => $this->entityManager
        ]);
    }

    public function create(): void
    {
        $this->requireAuth(); // vérifie si connecté

        $errors = [];
        $formData = $this->getInfoFormulaire();
        $promotions = $this->getPromotions();
        $etudiants = $this->getEtudiants($formData['promotion_id']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($formData['etudiant_id'])) {
            try {
                $this->envoieSanctionCreation($formData);
                $this->redirect('/sanctions');
            } catch (\Exception $e) {
                $errors['general'] = $e->getMessage();
            }
        }

        $this->render('sanction/create', [
            'promotions' => $promotions,
            'etudiants' => $etudiants,
            'errors' => $errors,
            'formData' => $formData
        ]);
    }

    private function getInfoFormulaire(): array
    {
        return [
            'promotion_id' => $_POST['promotion_id'] ?? '', // Si on arrive pas à récupérer alors on donne une chaine vide
            'etudiant_id' => $_POST['etudiant_id'] ?? '',
            'nom_professeur' => $_POST['nom_professeur'] ?? '',
            'motif' => $_POST['motif'] ?? '',
            'description' => $_POST['description'] ?? '',
            'date_incident' => $_POST['date_incident'] ?? ''
        ];
    }

    private function getPromotions(): array
    {
        return $this->entityManager->getRepository('App\Entity\Promotion')->findAll();
    }

    private function getEtudiants(?string $promotionId): array
    {
        if (empty($promotionId)) {
            return [];
        }

        return $this->entityManager->getRepository('App\Entity\Etudiant')
            ->findBy(['promotion' => $promotionId]);
    }

    private function envoieSanctionCreation(array $formData): void
    {
        $createSanction = new CreateSanction($this->entityManager);
        $createSanction->execute(
            (int)$formData['etudiant_id'], // On a besoin que l'id soit sous la forme int et non string
            $formData['nom_professeur'],
            $formData['motif'],
            $formData['description'],
            $formData['date_incident'],
            $_SESSION['utilisateur']['id']
        );
    }
}
