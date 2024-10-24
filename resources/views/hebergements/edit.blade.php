@extends('hebergements.layout')

@section('content')

<div class="card" style="margin:20px;">
    <div class="card-header">Edit Hebergement</div>
    <div class="card-body">
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('hebergement', $hebergement->id) }}" method="post">
            @csrf
            @method('PUT')
            <label>Nom</label></br>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $hebergement->nom) }}"></br>
            <label>Label écologique</label></br>
            <input type="text" name="label_ecologique_id" id="label_ecologique_id" class="form-control" value="{{ old('label_ecologique_id', $hebergement->label_ecologique_id) }}"></br>
            <label>Impact</label></br>
            <input type="text" name="impact" id="impact" class="form-control" value="{{ old('impact', $hebergement->impact) }}"></br>
            <input type="submit" value="Update" class="btn btn-success"></br>
        </form>
        
    </div>
</div>

@stop
