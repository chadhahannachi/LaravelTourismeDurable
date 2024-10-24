<!-- Modal for editing activity -->
<div class="modal fade" id="editActivityModal{{ $item->id }}" tabindex="-1" aria-labelledby="editActivityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editActivityModalLabel">Modifier l'Activité</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('activite/' . $item->id) }}" method="post">
                    {!! csrf_field() !!}
                    @method("PATCH")
                    
                    <!-- Nom de l'activité -->
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom de l'activité</label>
                        <input type="text" name="nom" id="nom" value="{{ $item->nom }}" class="form-control" required>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" required>{{ $item->description }}</textarea>
                    </div>

                   <!-- Type d'activité -->
                   <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select name="type" id="type" class="form-control" required>
                            @foreach(App\Enums\ActivityType::cases() as $type)
                                <option value="{{ $type->value }}" {{ $item->type === $type->value ? 'selected' : '' }}>
                                    {{ $type->value }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Niveau de durabilité -->
                    <div class="mb-3">
                        <label for="niveau_durabilite" class="form-label">Niveau de durabilité</label>
                        <input type="number" name="niveau_durabilite" id="niveau_durabilite" value="{{ $item->niveau_durabilite }}" class="form-control" min="1" max="10" required>
                    </div>

                    <!-- Prix -->
                    <div class="mb-3">
                        <label for="prix" class="form-label">Prix</label>
                        <input type="number" name="prix" id="prix" value="{{ $item->prix }}" class="form-control" step="0.01" min="0" required>
                    </div>

                    <!-- Disponibilité -->
                    <div class="mb-3">
                        <label for="disponibilite" class="form-label">Disponibilité</label>
                        <input type="number" name="disponibilite" id="disponibilite" value="{{ $item->disponibilite }}" class="form-control" min="1" max="10" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <input type="submit" value="Mettre à jour" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
