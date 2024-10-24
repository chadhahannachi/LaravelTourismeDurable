@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <h2>Détails de la Réservation</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Activité : {{ $reservation->activite->nom }}</h5>
            <p><strong>Nom du Client :</strong> {{ $reservation->nom_client }}</p>
            <p><strong>Email :</strong> {{ $reservation->email_client }}</p>
            <p><strong>Nombre de Personnes :</strong> {{ $reservation->nombre_personnes }}</p>
            <p><strong>Date de Réservation :</strong> {{ $reservation->date_reservation }}</p>
        </div>
    </div>

    <a href="{{ route('reservations.index') }}" class="btn btn-secondary mt-3">Retour</a>
</div>
@endsection
