//blog\resources\views\moyenTransports\edit.blade.php
@extends('moyenTransports.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Edit MoyenTransport</div>
  <div class="card-body">
       
      <form action="{{ url('moyenTransport/' .$moyenTransports->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$moyenTransports->id}}" id="id" />
        <label>type</label></br>
        <input type="text" name="type" id="type" value="{{$moyenTransports->type}}" class="form-control"></br>
        
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop

