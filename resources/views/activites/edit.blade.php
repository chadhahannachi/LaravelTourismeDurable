@extends('layouts.user_type.auth')
@section('content')

<div class="card" style="margin:20px;">
  <div class="card-header">Modifier l'Activité</div>
  <div class="card-body">

    <form action="{{ url('activite/' .$activites->id) }}" method="post" novalidate>
      {!! csrf_field() !!}
      @method("PATCH")
      <input type="hidden" name="id" id="id" value="{{ $activites->id }}" />

      <div class="row">
        <!-- Nom de l'activité -->
        <div class="col-md-6">
          <div class="form-group">
            <label for="nom">Nom de l'activité</label>
            <input type="text" name="nom" id="nom" value="{{ $activites->nom }}" class="form-control" required>
            @error('nom')
            <div style="color: red; font-size: small;">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <!-- Type d'activité -->
        <div class="col-md-6">
          <div class="form-group">
            <label for="type">Type</label>
            <input type="text" name="type" id="type" value="{{ $activites->type }}" class="form-control" required>
            @error('type')
            <div style="color: red; font-size: small;">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </div>

      <div class="row">
        <!-- Niveau de durabilité -->
        <div class="col-md-6">
          <div class="form-group">
            <label for="niveau_durabilite">Niveau de durabilité</label>
            <input type="number" name="niveau_durabilite" id="niveau_durabilite" value="{{ $activites->niveau_durabilite }}" class="form-control" min="1" max="10" required>
            @error('niveau_durabilite')
            <div style="color: red; font-size: small;">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <!-- Prix -->
        <div class="col-md-6">
          <div class="form-group">
            <label for="prix">Prix</label>
            <input type="number" name="prix" id="prix" value="{{ $activites->prix }}" class="form-control" step="0.01" min="0" required>
            @error('prix')
            <div style="color: red; font-size: small;">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </div>

      <div class="row">
        <!-- Description -->
        <div class="col-md-12">
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $activites->description }}</textarea>
            @error('description')
            <div style="color: red; font-size: small;">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </div>

      <div class="row">
        <!-- Disponibilité -->
        <div class="col-md-12">
          <div class="form-group">
            <label for="disponibilite">Disponibilité</label>
            <input type="number" name="disponibilite" id="disponibilite" value="{{ $activites->disponibilite }}" class="form-control" step="0.01" min="0" required>
            @error('disponibilite')
            <div style="color: red; font-size: small;">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </div>

      <!-- Bouton de mise à jour -->
      <div class="form-group mt-4">
        <input type="submit" value="Mettre à jour" class="btn btn-success">
      </div>
    </form>

  </div>
</div>

@endsection
