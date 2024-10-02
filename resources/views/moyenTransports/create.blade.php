//blog\resources\views\moyenTransports\create.blade.php
@extends('moyenTransports.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Ajouter un nouveau Moyen de Transports</div>
  <div class="card-body">
       
      <form action="{{ url('moyenTransport') }}" method="post">
        {!! csrf_field() !!}
        <label>Type</label></br>
        <input type="text" name="type" id="type" class="form-control"></br>
        
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop

