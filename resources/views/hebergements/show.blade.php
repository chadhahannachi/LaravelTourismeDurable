@extends('hebergements.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Hebergement Page</div>
  <div class="card-body">
        <div class="card-body">
        <h5 class="card-title">Nom : {{ $hebergements->nom }}</h5>
        <p class="card-text"> : Label Ecologique{{ $hebergements->label_ecologique }}</p>
        <p class="card-text">Impact : {{ $hebergements->impact }}</p>
  </div>
    </hr>
  </div>
</div>