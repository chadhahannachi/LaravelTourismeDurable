@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <h2>Liste des Réservations</h2>

    <!-- Affichage des messages d'erreur ou de succès -->
    @if(session('flash_message'))
        <div class="alert alert-success">
            {{ session('flash_message') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom du Client</th>
                <th>Email</th>
                <th>Nombre de Personnes</th>
                <th>Date de Réservation</th>
                <th>Activité</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->nom_client }}</td>
                    <td>{{ $reservation->email_client }}</td>
                    <td>{{ $reservation->nombre_personnes }}</td>
                    <td>{{ $reservation->date_reservation }}</td>
                    <td>{{ $reservation->activite->nom }}</td>
                    <td>
                        <a href="{{ route('reservations.show', $reservation->id) }}" class="btn btn-info">Détails</a>
                        <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <a href="{{ route('reservations.create', $reservation->activite->id) }}" class="btn btn-primary">Nouvelle Réservation</a>
</div>
@endsection
