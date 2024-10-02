//blog\resources\views\itineraires\create.blade.php
@extends('itineraires.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Create New Itineraires</div>
  <div class="card-body">
       
      <form action="{{ url('itineraire') }}" method="post">
        {!! csrf_field() !!}
        <label>Nom itineraire</label></br>
        <input type="text" name="nomItineraire" id="nomItineraire" class="form-control"></br>
        <label>Distance</label></br>
        <input type="text" name="distance" id="distance" class="form-control"></br>
        
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop

