@extends('etapes.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Edit Etape</div>
  <div class="card-body">
       
      <form action="{{ url('etape/' .$etapes->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$etapes->id}}" id="id" />

        <label>nomEtape</label></br>
        <input type="text" name="nomEtape" id="nomEtape" value="{{$etapes->nomEtape}}" class="form-control"></br>

        <label>description</label></br>
        <input type="text" name="description" id="description" value="{{$etapes->description}}" class="form-control"></br>

        <label>localisation</label></br>
        <input type="text" name="localisation" id="localisation" value="{{$etapes->localisation}}" class="form-control"></br>

        <label>impact</label></br>
        <input type="text" name="impact" id="impact" value="{{$etapes->impact}}" class="form-control"></br>

        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop

