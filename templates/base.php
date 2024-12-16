<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>GAUDPER - Etablissement Scolaire</title>
</head>
<body>
<nav class="navbar navbar-expand-lg" data-bs-theme="light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/sanctions">
            <img src="/assets/images/logotextsans.png" alt="Logo GaudPer" width="140" height="36" class="d-inline-block align-top me-">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <?php if (!isset($_SESSION['utilisateur'])): ?>
            <div class="collapse navbar-collapse" id="navbarColor03">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/sanctions/login">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/sanctions/create">Créer un compte</a>
                    </li>
                </ul>
            </div>
        <?php else: ?>
            <div class="dropdown">
                <button class="btn btn-warning dropdown-toggle me-5" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Action de <?= htmlspecialchars(strtoupper($_SESSION["utilisateur"]['nom']) . ' ' . $_SESSION["utilisateur"]['prenom']) ?>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/sanctions/logout">Deconnexion</a></li>
                    <li><a class="dropdown-item" href="/promotion/create">Créer une promotion</a></li>
                    <li><a class="dropdown-item" href="/promotion/affichetest">Voir les promotions</a></li>
                    <li><a class="dropdown-item" href="/etudiant/import">Ajouter des étudiants</a></li>
                    <li><a class="dropdown-item" href="/sanction/create">Créer une sanction</a></li>
                    <li><a class="dropdown-item" href="/divers/brouette">Brouette</a></li>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</nav>

<hr class="my-4 opacity-25 container">

<main class="container">
    <?= $content ?>
</main>

<hr class="my-4 opacity-25 container">

<div class="container">
    <div class="row">
        <div class="col mt-5">
            <h3 class="fs-5 display-6">Support : vie.scolaire@gaudper.fr</h3>
            <h3 class="fs-5 display-6">Réseaux Sociaux : tiktok.com/gaudpersanction</h3>
            <ul class="navbar-nav me-auto mt-2 mb-5">
                <li class="nav-item">
                    <a class="nav-link" href="/sanctions">Retour à l'accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/legal">Mention légal</a>
                </li>
            </ul>
        </div>
        <div class="col mb-3 mt5">
            <img class="w-75 border-dark mt5" src="/assets/images/logosansimage.png" alt="">
        </div>
    </div>
</div>
</body>
</html>