@extends('layouts.user_type.auth')

@section('content')
  <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Edit Itinéraire</h5>
                        </div>
                    </div>
                </div>



  <div class="container mt-4"> <!-- Ajout de la classe container pour centrer et organiser -->
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-6">
            <div class="card mb-3 bg-gray-100">
    <div class="card-header bg-gray-100 d-flex justify-content-between align-items-center"> 



  <form action="{{ url('itineraire/' . $itineraires->id) }}" method="POST">
  @csrf
      @method('PATCH')
        <input type="hidden" name="id" id="id" value="{{$itineraires->id}}" id="id" />
        <label>nomItineraire</label></br>
        <input type="text" name="nomItineraire" value="{{ $itineraires->nomItineraire }}" required class="form-control"></br>
        <label>distance</label></br>
        <input type="number" name="distance" value="{{ $itineraires->distance }}" required class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

</div>
</div></div></div></div>

   
    
  </div>
</div> 
@stop

