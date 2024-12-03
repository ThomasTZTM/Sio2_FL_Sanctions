<?php

namespace App\UserStory;

use App\Entity\Promotion;
use Doctrine\ORM\EntityManager;

class CreatePromotion
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function execute(string $libelle, string $annee): void
    {
        // Vérifier si la promotion existe déjà
        $existingPromotion = $this->entityManager->getRepository(Promotion::class)
            ->findOneBy(['libelle' => $libelle, 'annee' => $annee]);

        if ($existingPromotion) {
            throw new \Exception("Une promotion avec ce libellé et cette année existe déjà");
        }

        // Créer la nouvelle promotion
        $promotion = new Promotion();
        $promotion->setLibelle($libelle);
        $promotion->setAnnee($annee);

        try {
            $this->entityManager->persist($promotion);
            $this->entityManager->flush();
        } catch (\Exception $e) {
            throw new \Exception("Erreur lors de la création de la promotion");
        }
    }
}