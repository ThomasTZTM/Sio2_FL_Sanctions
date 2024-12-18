<div class="container">
    <div class="row">
        <div class="col col-12 col-lg-6 text-center">
            <?php if (!isset($_SESSION['utilisateur'])): ?>
                <h2 class="text-center text-secondary">
                    <span class="text-secondary">GAUDPER</span>, c'est bien plus qu'un simple carnet de sanctions. C'est un outil complet qui vous permet de consulter de nombreuses ressources pédagogiques. N'attendez plus pour explorer toutes les fonctionnalités de GAUDPER et optimiser votre apprentissage. Connectez-vous dès maintenant !
                </h2>
                <div class="text-center mb-5">
                    <a href="/sanctions/create" class="btn btn-warning mt-3">Créer un compte</a>
                    <a href="/sanctions/login" class="btn btn-warning mt-3">Connexion</a>
                </div>
            <?php else: ?>
                <h2 class="text-center text-secondary">
                    Bonjour <?= htmlspecialchars($_SESSION['utilisateur']['prenom']) ?> <?= htmlspecialchars(strtoupper($_SESSION['utilisateur']['nom'])) ?> !
                </h2>
                <h2 class="text-center text-secondary">
                    Bienvenue sur votre espace GAUDPER. Vous pouvez maintenant accéder à toutes les fonctionnalités de l'application.
                </h2>
                <div class="d-flex justify-content-center align-items-center mb-2">
                    <div>
                        <a href="/promotions" class="btn btn-secondary me-2 mt-2">Voir les promotions</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="col col-12 col-lg-6">
            <img src="./assets/images/acceuil3.png" alt="Logo gaudper" width="120" height="400"
                 class="d-inline-block align-top container-fluid">
        </div>


    </div>
</div>