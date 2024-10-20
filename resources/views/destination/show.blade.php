@extends('layouts.user_type.auth')
@section('content')
<div class="card" style="margin:20px;">
  <div class="card-header">Détails de la déstination</div>
  <div class="card-body">
      <div class="card-body">
        <h5 class="card-title">Nom de la déstination : {{ $destination->nom }}</h5>
        <p class="card-text">Description : {{ $destination->description }}</p>
        <p class="card-text">localisation : {{ $destination->localisation }}</p>
        <p class="card-text">Niveau de durabilité : {{ $destination->niveauDurabilite }}</p>
      </div>
  </div>
</div>
@endsection
