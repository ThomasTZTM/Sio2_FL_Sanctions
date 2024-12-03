<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Liste des promotions</h1>
        <a href="/promotions/create" class="btn btn-warning">Ajouter une promotion</a>
    </div>

    <?php if (empty($promotions)): ?>
        <div class="alert alert-info">
            Aucune promotion dispo pour le moment.
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
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>