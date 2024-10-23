@extends('reservations.layout')

@section('content')
<div class="container">
    <h2>Réserver l'activité : {{ $activite->nom }}</h2>

    <!-- Affichage des messages d'erreur ou de succès -->
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if(session('flash_message'))
        <div class="alert alert-success">
            {{ session('flash_message') }}
        </div>
    @endif

    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <input type="hidden" name="activite_id" value="{{ $activite->id }}">
        
        <div class="form-group">
            <label for="nom_client">Nom :</label>
            <input type="text" class="form-control" name="nom_client" required>
        </div>

        <div class="form-group">
            <label for="email_client">Email :</label>
            <input type="email" class="form-control" name="email_client" required>
        </div>

        <div class="form-group">
            <label for="nombre_personnes">Nombre de personnes :</label>
            <input type="number" class="form-control" name="nombre_personnes" min="1" required>
        </div>

        <div class="form-group">
            <label for="date_reservation">Date de réservation :</label>
            <input type="date" class="form-control" name="date_reservation" required>
        </div>

        <button type="submit" class="btn btn-primary">Réserver</button>
    </form>
</div>
@endsection
