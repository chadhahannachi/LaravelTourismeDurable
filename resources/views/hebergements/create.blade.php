@extends('hebergements.layout')
@section('content')

<div class="card" style="margin:20px;">
    <div class="card-header">Créer un nouvel Hébergement</div>
    <div class="card-body">
        <form action="{{ url('hebergement') }}" method="post">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" required>
                @error('nom')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="label_ecologique_id">Label Écologique</label>
                <select name="label_ecologique_id" id="label_ecologique_id" class="form-control" required>
                    <option value="">Sélectionner un label</option>
                    @foreach($labels as $label) <!-- Supposons que vous passez une liste de labels écologiques à la vue -->
                        <option value="{{ $label->id }}">{{ $label->nom }}</option>
                    @endforeach
                </select>
                @error('label_ecologique_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="impact">Impact</label>
                <input type="text" name="impact" id="impact" class="form-control" required>
                @error('impact')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <input type="submit" value="Enregistrer" class="btn btn-success">
        </form>
    </div>
</div>

@stop
