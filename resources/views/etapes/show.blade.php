@extends('etapes.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Etapes Page</div>
  <div class="card-body">
        <div class="card-body">
        <h5 class="card-title">nomEtape : {{ $etapes->nomEtape }}</h5>
        <p class="card-text">description : {{ $etapes->description }}</p>
        <p class="card-text">localisation : {{ $etapes->localisation }}</p>
        <p class="card-text">impact : {{ $etapes->impact }}</p>
        
  </div>
    </hr>
  </div>
</div>