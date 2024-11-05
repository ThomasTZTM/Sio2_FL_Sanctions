<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity]
#[ORM\Table(name: 'users')] // Nom de la table qu'on veut créer
class User
{
    #[ORM\Id]
    #[ORM\Column(name: 'id', type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;
    #[ORM\Column(name: 'nom', type: 'string', length: 200)]
    private string $nom;
    #[ORM\Column(name: 'prenom', type: 'string', length: 200)]
    private string $prenom;
    #[ORM\Column(name: 'email', type: 'string', length: 200, unique: true)]
    private string $email;
    #[ORM\Column(name: 'mdp', type: 'string', length: 200)]
    private string $mdp;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getMdp(): string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): void
    {
        $this->mdp = $mdp;
    }

    

}