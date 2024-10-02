//blog\resources\views\etapes\create.blade.php
@extends('etapes.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Create New Etapes</div>
  <div class="card-body">
       
      <form action="{{ url('etape') }}" method="post">
        {!! csrf_field() !!}
        <label>Nom etape</label></br>
        <input type="text" name="nomEtape" id="nomEtape" class="form-control"></br>

        <label>Description </label></br>
        <input type="text" name="description" id="description" class="form-control"></br>

        <label>Localisation </label></br>
        <input type="text" name="localisation" id="localisation" class="form-control"></br>

        <label>Impact </label></br>
        <input type="text" name="impact" id="impact" class="form-control"></br>
        
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop

