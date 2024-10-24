//blog\resources\views\itineraires\show.blade.php
@extends('itineraires.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Itineraires Page</div>
  <div class="card-body">
        <div class="card-body">
        <h5 class="card-title">nomItineraire : {{ $itineraires->nomItineraire }}</h5>
        <p class="card-text">distance : {{ $itineraires->distance }}</p>

        <h2>Étapes</h2>
        <ul>
          @foreach ($itineraires->etapes as $etape)
            <li>{{ $etape->nomEtape }} - {{ $etape->description }}</li>
          @endforeach
        </ul>
        
  </div>
    </hr>
  </div>
</div>