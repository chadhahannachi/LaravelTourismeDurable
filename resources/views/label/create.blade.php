@extends('layouts.user_type.auth')

@section('content')

<div class="card" style="margin:20px;">
    <div class="card-header">Créer un Nouveau Label Écologique</div>
    <div class="card-body">
        <form action="{{ route('label.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}" required>
                @error('nom')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="criteres">Critères</label>
                <textarea name="criteres" id="criteres" class="form-control" rows="4" required>{{ old('criteres') }}</textarea>
                @error('criteres')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Enregistrer</button>
        </form>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success" style="margin: 20px;">
        {{ session('success') }}
    </div>
@endif

@endsection
