//blog\resources\views\itineraires\index.blade.php
@extends('itineraires.layout')
@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Liste des Itinéraires</h2>
                    </div> 
                    <div class="card-body">
                        <a href="{{ url('/itineraire/create') }}" class="btn btn-success btn-sm" title="Add New Itineraire">
                            Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>nomItineraire</th>
                                        <th>Distance</th>
   
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($itineraires as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nomItineraire }}</td>
                                        <td>{{ $item->distance }}</td>
                                        
  
                                        <td>
                                            <a href="{{ url('/itineraire/' . $item->id) }}" title="View Itineraire"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/itineraire/' . $item->id . '/edit') }}" title="Edit Itineraire"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
  
                                            <form method="POST" action="{{ url('/itineraire' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Itineraire" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
  
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


