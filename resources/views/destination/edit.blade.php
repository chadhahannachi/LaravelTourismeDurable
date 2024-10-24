@extends('layouts.user_type.auth')
@section('content')

<div class="card" style="margin:20px;">
  <div class="card-header">Modifier la déstination</div>
  <div class="card-body">

    <form action="{{ url('destination/' .$destination->id) }}" method="post" novalidate >
      {!! csrf_field() !!}
      @method("PATCH")
      <input type="hidden" name="id" id="id" value="{{ $destination->id }}" />

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="nom">Nom de la destination</label>
            <input type="text" name="nom" id="nom" value="{{ $destination->nom }}" class="form-control" required>
            @error('nom')
            <div style="color: red; font-size: small;">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="localisation">Localisation</label>
            <input type="text" name="localisation" id="localisation" value="{{ $destination->localisation }}" class="form-control" required>
            @error('localisation')
            <div style="color: red; font-size: small;">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </div>

      <label>Niveau de durabilité</label></br>
      <input type="number" name="niveauDurabilite" id="niveauDurabilite" value="{{ $destination->niveauDurabilite }}" class="form-control" min="1" max="10" required></br>
      @error('niveauDurabilite')
      <div style="color: red; font-size: small;">{{ $message }}</div>
      @enderror
      <label>Description</label></br>
      <textarea name="description" id="description" class="form-control" required>{{ $destination->description }}</textarea></br>
      @error('description')
      <div style="color: red; font-size: small;">{{ $message }}</div>
      @enderror
      <div id="attraction-container" class="container mb-4">
        @if($destination->attractions->isEmpty())
        <div class="row align-items-center attraction-block" id="attraction-block-1">
          <div class="col-md-2">
            <label for="nonAttraction-1">Nom Attraction</label>
            <input type="text" name="nonAttraction[]" id="nonAttraction-1" class="form-control" required>
            @error('nonAttraction.0')
            <div style="color: red; font-size: small;">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-2">
            <label for="typeAttraction-1">Type Attraction</label>
            <input type="text" name="typeAttraction[]" id="typeAttraction-1" class="form-control" required>
            @error('typeAttraction.0')
            <div style="color: red; font-size: small;">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="descriptionAttraction-1">Description</label>
            <input name="descriptionAttraction[]" id="descriptionAttraction-1" class="form-control" required>
            @error('descriptionAttraction.0')
            <div style="color: red; font-size: small;">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-1 text-center mt-5">
            <button class="btn btn-outline-secondary" type="button" id="add-attraction-1">+</button>
          </div>
          <div class="col-md-1 text-center mt-5">
            <button class="btn btn-outline-secondary" type="button" id="remove-attraction-1">-</button>
          </div>
        </div>
        @else
        @foreach($destination->attractions as $index => $attraction)
        <div class="row align-items-center attraction-block" id="attraction-block-{{ $index + 1 }}">
          <div class="col-md-2">
            <label for="nonAttraction-{{ $index + 1 }}">Nom Attraction</label>
            <input type="text" name="nonAttraction[]" id="nonAttraction-{{ $index + 1 }}" class="form-control" value="{{ $attraction->nomAttraction }}" required>
            @error('nonAttraction.' . $index)
            <div style="color: red; font-size: small;">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-2">
            <label for="typeAttraction-{{ $index + 1 }}">Type Attraction</label>
            <input type="text" name="typeAttraction[]" id="typeAttraction-{{ $index + 1 }}" class="form-control" value="{{ $attraction->typeAttraction }}" required>
            @error('typeAttraction.' . $index)
            <div style="color: red; font-size: small;">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="descriptionAttraction-{{ $index + 1 }}">Description</label>
            <input name="descriptionAttraction[]" id="descriptionAttraction-{{ $index + 1 }}" class="form-control" value="{{ $attraction->descriptionAttraction }}" required>
            @error('descriptionAttraction.' . $index)
            <div style="color: red; font-size: small;">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-1 text-center mt-5">
            <button class="btn btn-outline-secondary" type="button" id="add-attraction-{{ $index + 1 }}">+</button>
          </div>
          <div class="col-md-1 text-center mt-5">
            <button class="btn btn-outline-secondary" type="button" id="remove-attraction-{{ $index + 1 }}">-</button>
          </div>
        </div>
        @endforeach
        @endif
      </div>



      <input type="submit" value="Mettre à jour" class="btn btn-success"></br>
    </form>

  </div>
</div>

@endsection

@section('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const attractionContainer = document.getElementById('attraction-container');
    let attractionCount = 1; // Start counting from the initial block

    // Function to add a new attraction block
    function addAttractionBlock() {
      attractionCount++; // Increment count for new ID
      const newBlock = document.createElement('div');
      newBlock.classList.add('row', 'align-items-center', 'attraction-block');
      newBlock.id = `attraction-block-${attractionCount}`;
      newBlock.innerHTML = `
                <div class="col-md-2">
                    <label for="nonAttraction-${attractionCount}">Nom Attraction</label>
                    <input type="text" name="nonAttraction[]" id="nonAttraction-${attractionCount}" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <label for="typeAttraction-${attractionCount}">Type Attraction</label>
                    <input type="text" name="typeAttraction[]" id="typeAttraction-${attractionCount}" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="descriptionAttraction-${attractionCount}">Description</label>
                    <input name="descriptionAttraction[]" id="descriptionAttraction-${attractionCount}" class="form-control" required>
                </div>
                <div class="col-md-1 text-center mt-5">
                    <button class="btn btn-outline-secondary" type="button" id="add-attraction-${attractionCount}">+</button>
                </div>
                <div class="col-md-1 text-center mt-5">
                    <button class="btn btn-outline-secondary" type="button" id="remove-attraction-${attractionCount}">-</button>
                </div>
            `;
      attractionContainer.appendChild(newBlock);
    }

    // Function to remove the last attraction block
    function removeAttractionBlock() {
      const attractionBlocks = document.querySelectorAll('.attraction-block');
      if (attractionBlocks.length > 0) {
        attractionBlocks[attractionBlocks.length - 1].remove();
        attractionCount--; // Decrement count
      }
    }

    // Event delegation for the attraction container
    attractionContainer.addEventListener('click', function(event) {
      const target = event.target;
      if (target.matches('[id^="add-attraction-"]')) {
        addAttractionBlock();
      } else if (target.matches('[id^="remove-attraction-"]')) {
        removeAttractionBlock();
      }
    });
  });
</script>
@endsection