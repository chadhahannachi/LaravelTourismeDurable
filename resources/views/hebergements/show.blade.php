{{-- resources/views/hebergement/show.blade.php --}}

@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <h1>Détails de l'Hébergement</h1>

    <div class="card">
        <div class="card-header">
            <h4>{{ $hebergement->nom }}</h4>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $hebergement->id }}</p>
            <p><strong>Nom:</strong> {{ $hebergement->nom }}</p>
            <p><strong>Impact:</strong> {{ $hebergement->impact }}</p>
            <p><strong>Label Écologique:</strong> {{ optional($hebergement->labelEcologique)->nom ?? 'N/A' }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('hebergement.index') }}" class="btn btn-secondary">Retour à la liste</a>
            <a href="{{ route('hebergement.edit', $hebergement->id) }}" class="btn btn-warning">Modifier</a>
        </div>
    </div>
</div>
@endsection
