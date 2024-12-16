<?php
// src/Entity/Sanction.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'sanctions')]
class Sanction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Etudiant::class)]
    #[ORM\JoinColumn(name: 'id_etudiant', nullable: false)]
    private Etudiant $etudiant;

    #[ORM\Column(name: 'nom_professeur', type: 'string', length: 100)]
    private string $nomProfesseur;

    #[ORM\Column(type: 'string', length: 255)]
    private string $motif;

    #[ORM\Column(type: 'text')]
    private string $description;

    #[ORM\Column(name: 'date_incident', type: 'datetime')]
    private \DateTime $dateIncident;

    #[ORM\Column(name: 'date_creation', type: 'datetime')]
    private \DateTime $dateCreation;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'id_createur', nullable: false)]
    private User $createur;

    // Getters et Setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtudiant(): Etudiant
    {
        return $this->etudiant;
    }

    public function setEtudiant(Etudiant $etudiant): self
    {
        $this->etudiant = $etudiant;
        return $this;
    }

    public function getNomProfesseur(): string
    {
        return $this->nomProfesseur;
    }

    public function setNomProfesseur(string $nomProfesseur): self
    {
        $this->nomProfesseur = $nomProfesseur;
        return $this;
    }

    public function getMotif(): string
    {
        return $this->motif;
    }

    public function setMotif(string $motif): self
    {
        $this->motif = $motif;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getDateIncident(): \DateTime
    {
        return $this->dateIncident;
    }

    public function setDateIncident(\DateTime $dateIncident): self
    {
        $this->dateIncident = $dateIncident;
        return $this;
    }

    public function getDateCreation(): \DateTime
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTime $dateCreation): self
    {
        $this->dateCreation = $dateCreation;
        return $this;
    }

    public function getCreateur(): User
    {
        return $this->createur;
    }

    public function setCreateur(User $createur): self
    {
        $this->createur = $createur;
        return $this;
    }
}
