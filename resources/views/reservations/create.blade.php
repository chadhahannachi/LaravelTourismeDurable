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

        <!-- Nom du client -->
        <div class="form-group">
            <label for="nom_client">Nom :</label>
            <input type="text" class="form-control" name="nom_client" value="{{ old('nom_client') }}" >
            @error('nom_client')
                <div style="color: red; font-size: small;">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email du client -->
        <div class="form-group">
            <label for="email_client">Email :</label>
            <input type="email" class="form-control" name="email_client" value="{{ old('email_client') }}" required>
            @error('email_client')
                <div style="color: red; font-size: small;">{{ $message }}</div>
            @enderror
        </div>

        <!-- Nombre de personnes -->
        <div class="form-group">
            <label for="nombre_personnes">Nombre de personnes :</label>
            <input type="number" class="form-control" name="nombre_personnes" min="1" value="{{ old('nombre_personnes') }}" required>
            @error('nombre_personnes')
                <div style="color: red; font-size: small;">{{ $message }}</div>
            @enderror
        </div>

        <!-- Date de réservation -->
        <div class="form-group">
            <label for="date_reservation">Date de réservation :</label>
            <input type="date" class="form-control" name="date_reservation" value="{{ old('date_reservation') }}" required>
            @error('date_reservation')
                <div style="color: red; font-size: small;">{{ $message }}</div>
            @enderror
        </div>

        <!-- Bouton de soumission -->
        <button type="submit" class="btn btn-primary">Réserver</button>
    </form>
</div>
@endsection
