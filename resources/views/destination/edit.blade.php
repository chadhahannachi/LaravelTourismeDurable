@extends('layouts.user_type.auth')
@section('content')

<div class="card" style="margin:20px;">
  <div class="card-header">Modifier la déstination</div>
  <div class="card-body">

    <form action="{{ url('destination/' .$destination->id) }}" method="post">
      {!! csrf_field() !!}
      @method("PATCH")
      <input type="hidden" name="id" id="id" value="{{ $destination->id }}" />

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="nom">Nom de la destination</label>
            <input type="text" name="nom" id="nom" value="{{ $destination->nom }}" class="form-control" required>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="localisation">Localisation</label>
            <input type="text" name="localisation" id="localisation" value="{{ $destination->localisation }}" class="form-control" required>
          </div>
        </div>
      </div>
      <label>Niveau de durabilité</label></br>
      <input type="number" name="niveauDurabilite" id="niveauDurabilite" value="{{ $destination->niveauDurabilite }}" class="form-control" min="1" max="10" required></br>

      <label>Description</label></br>
      <textarea name="description" id="description" class="form-control" required>{{ $destination->description }}</textarea></br>

      <input type="submit" value="Mettre à jour" class="btn btn-success"></br>
    </form>

  </div>
</div>

@endsection