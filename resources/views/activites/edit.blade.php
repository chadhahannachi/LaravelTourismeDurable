@extends('activites.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Modifier l'Activité</div>
  <div class="card-body">
       
      <form action="{{ url('activite/' .$activites->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{ $activites->id }}" />

        <!-- Nom de l'activité -->
        <label>Nom de l'activité</label></br>
        <input type="text" name="nom" id="nom" value="{{ $activites->nom }}" class="form-control" required></br>

        <!-- Description -->
        <label>Description</label></br>
        <textarea name="description" id="description" class="form-control" required>{{ $activites->description }}</textarea></br>

        <!-- Type d'activité -->
        <label>Type</label></br>
        <input type="text" name="type" id="type" value="{{ $activites->type }}" class="form-control" required></br>

        <!-- Niveau de durabilité -->
        <label>Niveau de durabilité</label></br>
        <input type="number" name="niveau_durabilite" id="niveau_durabilite" value="{{ $activites->niveau_durabilite }}" class="form-control" min="1" max="10" required></br>

        <!-- Prix -->
        <label>Prix</label></br>
        <input type="number" name="prix" id="prix" value="{{ $activites->prix }}" class="form-control" step="0.01" min="0" required></br>


        <label>disponibilite</label></br>
        <input type="number" name="disponibilite" id="prix" value="{{ $activites->disponibilite }}" class="form-control" step="0.01" min="0" required></br>

        <!-- Bouton de mise à jour -->
        <input type="submit" value="Mettre à jour" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop
