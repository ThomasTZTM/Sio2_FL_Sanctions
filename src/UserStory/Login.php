<?php

namespace App\UserStory;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class Login
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function execute(string $email, string $password): ?User
    {
        if (empty($email) || empty($password)) {
            throw new \InvalidArgumentException("L'email et le mot de passe sont obligatoires.");
        }

        $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $email]);

        if (!$user) {
            return null;
        }

        if (password_verify($password, $user->getMdp())) {
            return $user;
        }else{
            throw new \InvalidArgumentException("Identifiant ou mot de passe incorrect.");
        }
    }
}