<?php

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Créer un compte</title>
</head>
<body>

<?php
?>

<div class="mt-5 mb-5">
    <div>
        <div class="container">
            <div class="w-50 mx-auto shadow p-4 my-5">


                <form action="" method="POST" novalidate>

                    <h1 class="mb-5 text-center">Créer un compte : </h1>

                    <?php
                    //---------------------------------------------------------------------------------
                    //---------------------------------------------------------------------------------
                    //---------------------------------------------------------------------------------
                    ?>

                    <div class="mb-3">
                        <label for="nom" class="form-label text-white">Nom : </label>
                        <input
                            type="text"
                            class="form-control <?= isset($erreurs['nom']) ? "border border-2 border-danger" : "" ?>"
                            id="nom"
                            name="nom"
                            value="<?= $nom ?>"
                            placeholder="Saisir votre nom"
                        >
                        <?php if (isset($erreurs['nom'])) : ?>
                            <p class="form-text text-danger"><?= $erreurs['nom'] ?></p>
                        <?php endif; ?>
                    </div>

                    <?php
                    //---------------------------------------------------------------------------------
                    //---------------------------------------------------------------------------------
                    //---------------------------------------------------------------------------------
                    ?>

                    <div class="mb-3">
                        <label for="prenom" class="form-label text-white">prenom : </label>
                        <input
                            type="text"
                            class="form-control <?= isset($erreurs['prenom']) ? "border border-2 border-danger" : "" ?>"
                            id="prenom"
                            name="prenom"
                            value="<?= $prenom ?>"
                            placeholder="Saisir votre prenom"
                        >
                        <?php if (isset($erreurs['prenom'])) : ?>
                            <p class="form-text text-danger"><?= $erreurs['prenom'] ?></p>
                        <?php endif; ?>
                    </div>


                    <?php
                    //---------------------------------------------------------------------------------
                    //---------------------------------------------------------------------------------
                    //---------------------------------------------------------------------------------
                    ?>


                    <div class="mb-3">
                        <label for="email" class="form-label text-white">Adresse EMAIL : </label>
                        <input
                            type="text"
                            class="form-control <?= isset($erreurs['email']) ? "border border-2 border-danger" : "" ?>"
                            id="email"
                            name="email"
                            value="<?= $email ?>"
                            placeholder="Saisir l'adresse mail"
                        >
                        <?php if (isset($erreurs['email'])) : ?>
                            <p class="form-text text-danger"><?= $erreurs['email'] ?></p>
                        <?php endif; ?>
                    </div>


                    <?php
                    //---------------------------------------------------------------------------------
                    //---------------------------------------------------------------------------------
                    //---------------------------------------------------------------------------------
                    ?>


                    <div class="mb-3">
                        <label for="mdp" class="form-label text-white">Mot de passe : </label>
                        <input
                            type="password"
                            class="form-control <?= isset($erreurs['mdp']) ? "border border-2 border-danger" : "" ?>"
                            id="mdp"
                            name="mdp"
                            value="<?= $mdp ?>"
                            placeholder="Saisir le mot de passe"
                        >
                        <?php if (isset($erreurs['mdp'])) : ?>
                            <p class="form-text text-danger"><?= $erreurs['mdp'] ?></p>
                        <?php endif; ?>
                    </div>

                    <?php
                    //---------------------------------------------------------------------------------
                    //---------------------------------------------------------------------------------
                    //---------------------------------------------------------------------------------
                    ?>

                    <div class="mb-3">
                        <label for="mdp2" class="form-label text-white">Mot de passe : </label>
                        <input
                            type="password"
                            class="form-control <?= isset($erreurs['mdp2']) ? "border border-2 border-danger" : "" ?>"
                            id="mdp2"
                            name="mdp2"
                            value="<?= $mdp2 ?>"
                            placeholder="Saisir de nouveau le mot de passe"
                        >
                        <?php if (isset($erreurs['mdp2'])) : ?>
                            <p class="form-text text-danger"><?= $erreurs['mdp2'] ?></p>
                        <?php endif; ?>
                    </div>

                    <?php
                    //---------------------------------------------------------------------------------
                    //---------------------------------------------------------------------------------
                    //---------------------------------------------------------------------------------
                    ?>





                    <button type="submit" class="btn btn-outline-warning mt-4">Créer le compte</button>
                </form>

            </div>
        </div>
    </div>
</div>



</body>
</html>
