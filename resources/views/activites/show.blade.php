@extends('activites.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Détails de l'Activité</div>
  <div class="card-body">
      <div class="card-body">
        <h5 class="card-title">Nom de l'activité : {{ $activites->nom }}</h5>
        <p class="card-text">Description : {{ $activites->description }}</p>
        <p class="card-text">Type : {{ $activites->type }}</p>
        <p class="card-text">Niveau de durabilité : {{ $activites->niveau_durabilite }}</p>
        <p class="card-text">Prix : {{ $activites->prix }} dt</p>
        <p class="card-text">disponibilite : {{ $activites->disponibilite }} </p>

        

        <!-- Bouton réserver -->
        <a href="{{ route('activite.reserver', $activites->id) }}" class="btn btn-primary">Réserver cette activité</a>
      </div>
  </div>
</div>
@endsection
