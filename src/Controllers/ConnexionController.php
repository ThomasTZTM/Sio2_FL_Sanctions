<?php

namespace App\Controllers;
use App\Entity\User;
use App\UserStory\CreateAccount;
use App\UserStory\Login;
use Doctrine\ORM\EntityManager;

class ConnexionController extends AbstractController
{
    private EntityManager $entityManager;

    /**
     * @param EntityManager $entityManager
     */

    public function __construct(EntityManager $entityManager){
        $this->entityManager = $entityManager;
    }

    public function create() {
        $erreurs = [];
        $nom = "";
        $prenom = "";
        $email = "";
        $mdp = "";
        $mdp2 = "";
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $email = $_POST["email"];
            $mdp = $_POST["mdp"];
            $mdp2 = $_POST["mdp2"];

            if (empty($nom)) {
                $erreurs['nom'] = "Le nom est obligatoire";
            }
            if (empty($prenom)) {
                $erreurs['prenom'] = "Le prenom est obligatoire";
            }
            if (empty($email)) {
                $erreurs['email'] = "Le email est obligatoire";
            }
            if (empty($mdp)) {
                $erreurs['mdp'] = "Le mdp est obligatoire";
            }
            if (empty($mdp2)) {
                $erreurs['mdp2'] = "La re-saisie mdp est obligatoire";
            }
            if (count($erreurs) == 0) {
                $nvcompte = new CreateAccount($this->entityManager);
                try {
                    $nvcompte->execute($nom, $prenom, $email, $mdp, $mdp2);
                    $this->redirect('/sanctions/login');
                    // Faire un truc la
                } catch (\Exception $e) {
                    echo "<div class='alert alert-danger ' role='alert'>".$e->getMessage()."</div>";
                }
            }

        }
        $this->render('login/create');
    }

    public function login() {
        $this->render('login/login');
    }


}