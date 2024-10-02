//blog\resources\views\moyenTransports\show.blade.php
@extends('moyenTransports.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">MoyenTransports Page</div>
  <div class="card-body">
        <div class="card-body">
        <h5 class="card-title">type : {{ $moyenTransports->type }}</h5>
        
  </div>
    </hr>
  </div>
</div>