<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Liste des promotions</h1>
        <div>
            <a href="/etudiant/import" class="btn btn-warning me-2 mt-2">Importer des étudiants</a>
            <a href="/promotion/create" class="btn btn-warning mt-2">Ajouter une promotion</a>
        </div>
    </div>

    <?php if (empty($promotions)): ?>
        <div class="alert alert-warning">
            Aucune promotion n'a été créée pour le moment.
        </div>
    <?php else: ?>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php foreach ($promotions as $promotion): ?>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($promotion->getLibelle()) ?></h5>
                            <p class="card-text">
                                Année : <?= htmlspecialchars($promotion->getAnnee()) ?>
                            </p>

                            <?php
                            $etudiants = $entityManager->getRepository(\App\Entity\Etudiant::class)
                                ->findBy(['promotion' => $promotion]);
                            ?>

                            <?php if (!empty($etudiants)): ?>
                                <div class="mt-3">
                                    <small class="text-muted">
                                        <strong>Liste des étudiants : </strong>
                                        <div class="small mt-1">
                                            <?php foreach ($etudiants as $etudiant): ?>
                                                <div class="">
                                                    <?= htmlspecialchars($etudiant->getPrenom()) ?>
                                                    <?= htmlspecialchars($etudiant->getNom()) ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </small>
                                </div>
                            <?php else: ?>
                                <div class="mt-3">
                                    <small class="text-muted">Aucun étudiant dans cette promotion</small>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>