<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center mb-0 text-secondary">Créer une promotion</h2>
                </div>
                <div class="card-body">
                    <?php if (isset($errors['general'])): ?>
                        <div class="alert alert-danger">
                            <?= htmlspecialchars($errors['general']) ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" novalidate>
                        <div class="mb-3">
                            <label for="libelle" class="form-label">Libellé</label>
                            <input
                                type="text"
                                class="form-control <?= isset($errors['libelle']) ? 'is-invalid' : '' ?>"
                                id="libelle"
                                name="libelle"
                                value="<?= htmlspecialchars($formData['libelle']) ?>"
                                placeholder="Ex: BTS SIO2"
                            >
                            <?php if (isset($errors['libelle'])): ?>
                                <div class="invalid-feedback">
                                    <?= htmlspecialchars($errors['libelle']) ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="annee" class="form-label">Année</label>
                            <input
                                type="text"
                                class="form-control <?= isset($errors['annee']) ? 'is-invalid' : '' ?>"
                                id="annee"
                                name="annee"
                                value="<?= htmlspecialchars($formData['annee']) ?>"
                                placeholder="Ex: 2024"
                            >
                            <?php if (isset($errors['annee'])): ?>
                                <div class="invalid-feedback">
                                    <?= htmlspecialchars($errors['annee']) ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-warning">Créer la promotion</button>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <a href="/promotions" class="btn btn-secondary me-2 mt-2">Voir les promotions</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>