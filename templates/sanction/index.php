<div class="container mt-4">

    <?php if (empty($sanctions)): ?>
        <div class="alert alert-warning">
            Aucune sanctions n'a été créée pour le moment.
        </div>
    <?php else: ?>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php foreach ($sanctions as $sanction): ?>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="card-title text-center">Sanction <?= htmlspecialchars($sanction->getMotif()) ?></h5>
                        </div>
                        <div class="card-body">

                            <div class="alert alert-warning" role="alert">
                                <p class="card-text">
                                    Etudiant : <?= htmlspecialchars($sanction->getEtudiant()->getNom()) ?> <?= htmlspecialchars($sanction->getEtudiant()->getPrenom()) ?>
                                </p>

                                <p class="card-text">
                                    Promotion : <?= htmlspecialchars($sanction->getEtudiant()->getPromotion()->getLibelle()) ?>
                                </p>
                            </div>

                            <p class="card-text">
                                Professeur : <?= htmlspecialchars($sanction->getNomProfesseur()) ?>
                            </p>

                            <p class="card-text">
                                Description : <?= htmlspecialchars($sanction->getDescription()) ?>
                            </p>

                            <p class="card-text">
                                Date de l'incident : <?= $sanction->getDateIncident()->format('d/m/Y') ?>
                            </p>


                        </div>
                        <div class="card-footer text-body-secondary text-center">
                            <p class="card-text">
                                Date enregistrement : <?= $sanction->getDateCreation()->format('d/m/Y H:i') ?>
                            </p>

                            <p class="card-text">
                                Surveillant : Monsieur/Madame <?= htmlspecialchars($sanction->getCreateur()->getNom()) ?>
                            </p>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <div class="mb-2">
        <a href="/promotions" class="btn btn-secondary me-2 mt-2">Voir les promotions</a>
    </div>
</div>