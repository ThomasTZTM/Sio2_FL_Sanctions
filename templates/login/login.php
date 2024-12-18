
    <h1 class="mb-4">Connexion</h1>

<?php if (isset($error)): ?>
    <p class="text-danger mb-4"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

    <form action="" method="post" class="mb-3">

        <div class="mb-4">
            <label for="email" class="form-label">Email :</label>
            <input type="email" id="email" name="email" class="form-control">
        </div>

        <div class="mb-6">
            <label for="password" class="form-label">Mot de passe :</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-outline-primary mt-4">Valider</button>
        <a href="/sanctions/create" class="btn btn-outline-warning mt-4">Créer un compte</a>

        <div class="alert alert-info mt-5" role="alert">
            Compte existant : /!\ Aide de développement /!\
            <br>
            - thomas@sanction.php
            <br>
            - Ab.45678

        </div>
    </form>
