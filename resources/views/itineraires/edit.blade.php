//blog\resources\views\itineraires\edit.blade.php
@extends('itineraires.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Edit Itineraire</div>
  <div class="card-body">
       
      <form action="{{ url('itineraire/' .$itineraires->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$itineraires->id}}" id="id" />
        <label>nomItineraire</label></br>
        <input type="text" name="nomItineraire" id="nomItineraire" value="{{$itineraires->nomItineraire}}" class="form-control"></br>
        <label>distance</label></br>
        <input type="text" name="distance" id="distance" value="{{$itineraires->distance}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop

