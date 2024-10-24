@extends('hebergements.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Edit Hebergement</div>
  <div class="card-body">
       
      <form action="{{ url('hebergement/' .$hebergements->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$hebergements->id}}" id="id" />
        <label>Nom</label></br>
        <input type="text" name="nom" id="nom" value="{{$hebergements->nom}}" class="form-control"></br>
        <label>Label ecologique</label></br>
        <input type="text" name="label_ecologique" id="label_ecologique" value="{{$hebergements->label_ecologique}}" class="form-control"></br>
        <label>Impact</label></br>
        <input type="text" name="impact" id="impact" value="{{$hebergements->impact}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop