<div class="mt-5 mb-5">
    <div>
        <div class="container">
            <div class="w-50 mx-auto shadow p-4 my-5">


                <form action="" method="POST" novalidate>

                    <h1 class="mb-5 text-center">Créer un compte : </h1>
                    <div class="alert alert-danger" role="alert">
                        <?php foreach ($erreurs as $value) { echo $value." et "; } ?>
                    </div>

                    <div class="mb-3">
                        <label for="nom" class="form-label text-white">Nom : </label>
                        <input
                                type="text"
                                class="form-control"
                                id="nom"
                                name="nom"
                                placeholder="Saisir votre nom"
                                value="<?= htmlspecialchars($_SESSION['form_data']['nom'] ?? '') ?>"
                        >
                    </div>


                    <div class="mb-3">
                        <label for="prenom" class="form-label text-white">Prenom : </label>
                        <input
                                type="text"
                                class="form-control"
                                id="prenom"
                                name="prenom"
                                placeholder="Saisir votre prenom"
                                value="<?= htmlspecialchars($_SESSION['form_data']['prenom'] ?? '') ?>"
                        >
                    </div>


                    <div class="mb-3">
                        <label for="email" class="form-label text-white">Adresse EMAIL : </label>
                        <input
                                type="text"
                                class="form-control"
                                id="email"
                                name="email"
                                placeholder="Saisir l'adresse mail"
                                value="<?= htmlspecialchars($_SESSION['form_data']['mail'] ?? '') ?>"
                        >
                    </div>


                    <div class="mb-3">
                        <hr></hr>
                        <p>Le mot de passe doit contenir au moins 8 caractères, dont une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.</p>
                        <label for="mdp" class="form-label text-white">Mot de passe : </label>
                        <input
                                type="password"
                                class="form-control"
                                id="mdp"
                                name="mdp"
                                placeholder="Saisir le mot de passe"
                        >
                    </div>


                    <div class="mb-3">
                        <label for="mdp2" class="form-label text-white">Mot de passe : </label>
                        <input
                                type="password"
                                class="form-control"
                                id="mdp2"
                                name="mdp2"
                                placeholder="Saisir de nouveau le mot de passe"
                        >
                    </div>


                    <button type="submit" class="btn btn-outline-warning mt-4">Créer le compte</button>
                    <a href="/sanctions/login" class="btn btn-outline-primary mt-4">Connexion</a>
                </form>
                <?php unset($_SESSION["form_data"]);?>
            </div>
        </div>
    </div>
</div>