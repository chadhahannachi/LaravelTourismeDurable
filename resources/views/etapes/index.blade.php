//blog\resources\views\etapes\index.blade.php
@extends('etapes.layout')
@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Liste des Etapes</h2>
                    </div> 
                    <div class="card-body">
                        <a href="{{ url('/etape/create') }}" class="btn btn-success btn-sm" title="Add New Etape">
                            Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>nomEtape</th>
                                        <th>Description</th>
                                        <th>localisation</th>
                                        <th>impact</th>
   
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($etapes as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nomEtape }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->localisation }}</td>
                                        <td>{{ $item->impact }}</td>
                                        
                                        <td>
                                            <a href="{{ url('/etape/' . $item->id) }}" title="View Etape"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/etape/' . $item->id . '/edit') }}" title="Edit Etape"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
  
                                            <form method="POST" action="{{ url('/etape' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Etape" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                
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


