<!-- Modal -->
<div class="modal fade" id="editEtapeModal" tabindex="-1" aria-labelledby="editEtapeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEtapeModalLabel">Modifier l'Étape</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editEtapeForm" action="" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="id" id="modalEtapeId" />

                    <!-- Nom de l'étape -->
                    <div class="mb-3">
                        <label for="modalNomEtape" class="form-label">Nom de l'Étape</label>
                        <input type="text" name="nomEtape" id="modalNomEtape" class="form-control" required>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="modalDescription" class="form-label">Description</label>
                        <textarea name="description" id="modalDescription" class="form-control" required></textarea>
                    </div>

                    <!-- Localisation -->
                    <div class="mb-3">
                        <label for="modalLocalisation" class="form-label">Localisation</label>
                        <input type="text" name="localisation" id="modalLocalisation" class="form-control" required>
                    </div>

                    <!-- Impact -->
                    <div class="mb-3">
                        <label for="modalImpact" class="form-label">Impact</label>
                        <select name="impact" class="form-control" id="modalImpact" required>
                            <option value="1">Oui</option>
                            <option value="0">Non</option>
                        </select>
                    </div>

                    <button type="submit" class="btn bg-gradient-primary btn-lg">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>
</div>
