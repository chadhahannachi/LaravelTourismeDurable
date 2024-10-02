@extends('hebergements.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Create New Hebergements</div>
  <div class="card-body">
       
      <form action="{{ url('hebergement') }}" method="post">
        {!! csrf_field() !!}
        <label>Nom</label></br>
        <input type="text" name="nom" id="nom" class="form-control"></br>
        <label>Label ecologique</label></br>
        <input type="text" name="label_ecologique" id="label_ecologique" class="form-control"></br>
        <label>impact</label></br>
        <input type="text" name="impact" id="impact" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop