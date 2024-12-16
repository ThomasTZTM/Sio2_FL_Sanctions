<?php

namespace App\UserStory;

use App\Entity\Sanction;
use App\Entity\Etudiant;
use App\Entity\User;
use Doctrine\ORM\EntityManager;

class CreateSanction
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function execute(
        int $etudiantId,
        string $nomProfesseur,
        string $motif,
        string $description,
        string $dateIncident,
        int $createurId
    ): void {


        $this->validateData($etudiantId, $nomProfesseur, $motif, $description, $dateIncident);


        $etudiant = $this->getEtudiant($etudiantId);
        $createur = $this->getCreateur($createurId);


        $sanction = new Sanction();
        $sanction->setEtudiant($etudiant)
            ->setNomProfesseur($nomProfesseur)
            ->setMotif($motif)
            ->setDescription($description)
            ->setDateIncident(new \DateTime($dateIncident))
            ->setDateCreation(new \DateTime())
            ->setCreateur($createur);

        try {
            $this->entityManager->persist($sanction);
            $this->entityManager->flush();
        } catch (\Exception $e) {
            throw new \Exception("Erreur lors de la création de la sanction : " . $e->getMessage());
        }
    }

    private function validateData(
        int $etudiantId,
        string $nomProfesseur,
        string $motif,
        string $description,
        string $dateIncident
    ): void {
        if (empty($etudiantId)) {
            throw new \Exception("Le choix d'un étudiant est obligatoire");
        }
        if (empty($nomProfesseur)) {
            throw new \Exception("Le nom du professeur est obligatoire");
        }
        if (empty($motif)) {
            throw new \Exception("Le motif est obligatoire");
        }
        if (empty($description)) {
            throw new \Exception("La description est obligatoire");
        }
        if (empty($dateIncident)) {
            throw new \Exception("La date de la sanction est obligatoire");
        }

        try {
            new \DateTime($dateIncident);
        } catch (\Exception $e) {
            throw new \Exception("La date de la sanction n'est pas valide");
        }
    }

    private function getEtudiant(int $etudiantId): Etudiant
    {
        $etudiant = $this->entityManager->getRepository(Etudiant::class)->find($etudiantId);
        if (!$etudiant) {
            throw new \Exception("L'étudiant sélectionner n'existe pas");
        }
        return $etudiant;
    }

    private function getCreateur(int $createurId): User
    {
        $createur = $this->entityManager->getRepository(User::class)->find($createurId);
        if (!$createur) {
            throw new \Exception("Utilisateur non trouver");
        }
        return $createur;
    }
}
