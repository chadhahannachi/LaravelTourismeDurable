@extends('layouts.FrontOffice.auth_no_sidebar')

@section('content')

<div>
    <div class="alert alert-secondary mx-4" role="alert">
        <span class="text-white">
            <strong>Détails de l'Activité</strong>
        </span>
    </div>

    <div class="container" style="margin-top: 20px;">
        <div class="card">
            <div class="card-header text-center">
                <h5 class="mb-0">Activité: {{ $activites->nom }}</h5>
            </div>
            <div class="card-body">
               <!-- Image Display -->
               @if($activites->image)
                    <img src="{{ asset('storage/' . $activites->image) }}" alt="{{ $activites->nom }}" class="img-fluid" style="max-height: 200px; object-fit: cover;">
                @else
                    <p>Pas d'image disponible</p>
                @endif
                <h5 class="card-title">Nom de l'activité: {{ $activites->nom }}</h5>
                <p class="card-text"><strong>Description:</strong> {{ $activites->description }}</p>
                <p class="card-text"><strong>Type:</strong> {{ $activites->type }}</p>
                <p class="card-text"><strong>Niveau de durabilité:</strong> {{ $activites->niveau_durabilite }}</p>
                <p class="card-text"><strong>Prix:</strong> {{ $activites->prix }} dt</p>
                <p class="card-text"><strong>Disponibilité:</strong> {{ $activites->disponibilite }}</p>

               

                <!-- Reserve Button -->
                <div class="text-center" style="margin-top: 20px;">
                    <a href="{{ route('activite.reserver', $activites->id) }}" class="btn btn-primary">Réserver cette activité</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection