<?php

namespace App\Controllers;

use App\Entity\User;
use App\UserStory\CreateAccount;
use App\UserStory\Login;
use Doctrine\ORM\EntityManager;

class ConnexionController extends AbstractController
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function create()
    {
        if ($this->isAuthenticated()) {
            $this->redirect('/sanctions');
        }

        $erreurs = [];
        $formData = [
            'nom' => '',
            'prenom' => '',
            'email' => '',
            'mdp' => '',
            'mdp2' => ''
        ];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $formData = [
                'nom' => $_POST["nom"] ?? '',
                'prenom' => $_POST["prenom"] ?? '',
                'email' => $_POST["email"] ?? '',
                'mdp' => $_POST["mdp"] ?? '',
                'mdp2' => $_POST["mdp2"] ?? ''
            ];

            foreach ($formData as $field => $value) {
                if (empty($value)) {
                    $erreurs[$field] = "Le champ " . $field . " est obligatoire";
                }
            }

            if (empty($erreurs)) {
                $nvcompte = new CreateAccount($this->entityManager);
                try {
                    $nvcompte->execute(
                        $formData['nom'],
                        $formData['prenom'],
                        $formData['email'],
                        $formData['mdp'],
                        $formData['mdp2']
                    );
                    $this->redirect('/sanctions/login');
                } catch (\Exception $e) {
                    $erreurs['general'] = $e->getMessage();
                }
            }
        }

        $this->render('login/create', [
            'erreurs' => $erreurs,
            'formData' => $formData
        ]);
    }

    public function login()
    {
        if ($this->isAuthenticated()) {
            $this->redirect('/sanctions');
        }

        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = new Login($this->entityManager);
            try {
                $user = $login->execute(
                    $_POST['email'] ?? '',
                    $_POST['password'] ?? ''
                );

                if ($user instanceof User) {
                    $_SESSION['utilisateur'] = [
                        'id' => $user->getId(),
                        'nom' => $user->getNom(),
                        'prenom' => $user->getPrenom(),
                        'email' => $user->getEmail(),
                    ];
                    $this->redirect('/sanctions');
                }
            } catch (\Exception $e) {
                $error = $e->getMessage();
            }
        }

        $this->render('login/login', ['error' => $error]);
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        session_start();
        $this->redirect('/sanctions');
    }
}