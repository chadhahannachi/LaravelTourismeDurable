@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="alert alert-secondary mx-4" role="alert">
        <span class="text-white">
            <strong>Créer un nouvel Itinéraire</strong> Remplissez le formulaire ci-dessous.
        </span>
    </div>

    <div class="container" style="margin-top: 20px;">
        <div class="card">
            <div class="card-header text-center">
                <h5 class="mb-0">Nouvel Itinéraire</h5>
            </div>
            <div class="card-body">

                <!-- <form action="{{ url('/itineraire') }}" method="post"> -->
                <form action="{{ route('itineraire.store') }}" method="POST" novalidate>

                {!! csrf_field() !!}

                    <!-- Nom de l'itinéraire -->
                    <div class="form-group">
                        <label for="nomItineraire">Nom de l'itinéraire</label>
                        <input type="text" name="nomItineraire" id="nomItineraire" class="form-control" required value="{{ old('nomItineraire') }}">
    @error('nomItineraire')
        <small class="text-danger">{{ $message }}</small>
    @enderror
                    </div>

                    <!-- Distance -->
                    <div class="form-group">
                        <label for="distance">Distance (en km)</label>
                        <input type="number" name="distance" id="distance" class="form-control" step="0.01" min="0" required>
                    </div>

                    <div class="form-group">
                        <label for="moyenTransport">Moyen de Transport</label>
                        <select name="moyenTransport" class="form-control" required>
                            <option value="" disabled selected>Choisissez un moyen de transport</option>
                            @foreach($moyenTransports as $transport)  
                                <option value="{{ $transport->type }}">{{ $transport->type }}</option> <!-- Utilisez l'ID du moyen de transport ici -->
                            @endforeach
                        </select>
                    </div>


                    <div class="text-center">
                        <input type="submit" value="Enregistrer" class="btn bg-gradient-primary btn-lg">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
