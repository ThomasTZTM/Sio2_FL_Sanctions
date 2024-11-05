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
            throw new \InvalidArgumentException("Email and password are required.");
        }

        $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $email]);

        if (!$user) {
            return null;
        }

        if (password_verify($password, $user->getPassword())) {
            return $user;
        }

        return null;
    }
}