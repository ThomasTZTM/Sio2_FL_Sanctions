<?php

namespace App\UserStory;

use App\Entity\User;
use Doctrine\ORM\EntityManager;

class CreateAccount
{
    private EntityManager $entityManager;
    public function __construct(EntityManager $entityManager){
        // L'entityManager est injecté par dépendence
        $this->entityManager = $entityManager;
    }

    // Cette méthode permettra d'exécuter la userStory
    public function execute(string $nom, string $prenom, string $email, string $password, string $password2) : User
    {
        // Vérifier que les données sont présentes
        // Si t'elle n'est pas le cas, on lance une exception

        if (empty($nom) || empty($prenom) || empty($email) || empty($password) || empty($password2)) {
            throw new \InvalidArgumentException("Tous les champs (nom, prenom, email, mot de passe, la re-saisie du mot de passe) doivent être renseignés."); }

        // Vérifier si l'email est valide
        // Si t'elle n'est pas le cas, on lance une exception

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("L'adresse email fournie n'est pas valide."); }

        // Vérifier si le mot de passe est sécuriser
        // Si t'elle n'est pas le cas, on lance une exception

        if (strlen($password) < 8 ||  !preg_match('/[A-Z]/', $password) ||  !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password) ||  !preg_match('/[\W_]/', $password)) {
            throw new \InvalidArgumentException("Le mot de passe doit contenir au moins 8 caractères, dont une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.");}

        // Vérifier si le mot de passe est re saisie
        // Si t'elle n'est pas le cas, on lance une exception

        if (!($password2==$password2)) {
            throw new \InvalidArgumentException("Vous devez re-saisir le même mot de passe.");}

        // Vérifier que l'email n'existe pas déjà (uniciter)
        // Si t'elle n'est pas le cas, on lance une exception

        $existingUser = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $email]);

        if ($existingUser !== null) {
            throw new \InvalidArgumentException("L'adresse email est déjà utilisée par un autre compte.");}

        // Insérer dans la base de données
        // 1. Hacher le mot de passe

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // 2. Créer une instance de la classe User

        $user = new User();
        $user->setNom($nom);
        $user->setPrenom($prenom);
        $user->setEmail($email);
        $user->setMdp($hashedPassword);

        // 3. On persiste l'instance en utilisant l'entityManager

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        // Envoie du mail de confirmation

        //echo "Un email de confirmation à été envoyé à l'utilisateur";

        return $user;
    }


}