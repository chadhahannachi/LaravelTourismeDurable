@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="alert alert-secondary mx-4" role="alert">
        <span class="text-white">
            <strong>Add, Edit, Delete features are not functional!</strong> This is a
            <strong>PRO</strong> feature! Click <strong>
            <a href="https://www.creative-tim-dashboard.com/live/soft-ui-dashboard-pro-laravel" target="_blank" class="text-white">here</a></strong>
            to see the PRO product!
        </span>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Liste des Activités</h5>
                        </div>
                        <a href="{{ url('/activite/create') }}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Nouvelle Activité</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="row">
                        @foreach($activites as $item)
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        @if($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->nom }}" class="img-fluid" style="max-height: 200px; object-fit: cover;">
                                        @else
                                            <p>Pas d'image</p>
                                        @endif
                                        <h5 class="card-title">{{ $item->nom }}</h5>
                                        <p class="card-text">
                                            <strong>Description:</strong> {{ \Illuminate\Support\Str::limit($item->description, 35, '...') }}
                                        </p>
                                        <p class="card-text"><strong>Disponibilité:</strong> {{ $item->disponibilite }}</p>

                                        <div class="d-flex justify-content-between mt-3">
                                            <!-- View button -->
                                            <a href="{{ url('/activite/' . $item->id) }}" class="btn btn-outline-secondary btn-sm" data-bs-toggle="tooltip" data-bs-original-title="Voir l'activité">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            
                                            <!-- Edit button triggering modal -->
                                            <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editActivityModal{{ $item->id }}" data-bs-toggle="tooltip" data-bs-original-title="Modifier l'activité">
                                                <i class="fas fa-user-edit"></i>
                                            </button>

                                            <!-- Delete form -->
                                            <form method="POST" action="{{ url('/activite' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-link text-danger" title="Supprimer l'activité" onclick="return confirm('Confirmer la suppression ?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Include modal -->
                                @include('activites.modal', ['item' => $item])
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
