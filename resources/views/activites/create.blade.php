@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="alert alert-secondary mx-4" role="alert">
        <span class="text-white">
            <strong>Créer une nouvelle Activité</strong> Remplissez le formulaire ci-dessous.
        </span>
    </div>

    <div class="container" style="margin-top: 20px;">
        <div class="card">
            <div class="card-header text-center">
                <h5 class="mb-0">Nouvelle Activité</h5>
            </div>
            <div class="card-body">

                <form action="{{ url('activite') }}" method="post">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="nom">Nom de l'activité</label>
                        <input type="text" name="nom" id="nom" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="text" name="type" id="type" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="niveau_durabilite">Niveau de durabilité</label>
                        <input type="number" name="niveau_durabilite" id="niveau_durabilite" class="form-control" min="1" max="10" required>
                    </div>

                    <div class="form-group">
                        <label for="prix">Prix</label>
                        <input type="number" name="prix" id="prix" class="form-control" step="0.01" min="0" required>
                    </div>

                    <div class="form-group">
                        <label for="disponibilite">disponibilite</label>
                        <input type="number" name="disponibilite" id="disponibilite" class="form-control" min="1" max="10" required>
                    </div>

                    <div class="text-center">
                        <input type="submit" value="Enregistrer" class="btn bg-gradient-primary btn-lg">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
