@extends('layouts.user_type.auth')
@section('content')
<div class="card" style="margin:20px;">
  <div class="card-header" style="font-weight: bold; font-size: larger;">Destination Details</div>
  <div class="card-body">
    <div class="card-body" style="display: flex; align-items: center;">
      <img src="{{ asset('images/' . $destination->image) }}" class="avatar me-3" alt="user1" style="width: 100%; height: 100%; max-width: 150px;">
      <div>
        <h5 class="card-title">Destination Name : {{ $destination->nom }}</h5>
        <p class="card-text"><span style="font-weight: 600;">Description :</span> {{ $destination->description }}</p>
        <p class="card-text"><span style="font-weight: 600;">localisation :</span> {{ $destination->localisation }}</p>
        <p class="card-text"><span style="font-weight: 600;">Sustainability Level</span> : {{ $destination->niveauDurabilite }}</p>
      </div>
    </div>
    <a href="{{ url('/itineraire') }}" class="btn bg-gradient-primary btn-sm mb-0" type="button"> les itineraires</a>

  </div>
</div>
@endsection