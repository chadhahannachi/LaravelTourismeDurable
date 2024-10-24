@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="alert alert-secondary mx-4" role="alert">
        <span class="text-white">
            <strong>Add, Edit, Delete features are not functional!</strong> This is a
            <strong>PRO</strong> feature! Click <strong>
                <a href="https://www.creative-tim.com/live/soft-ui-dashboard-pro-laravel" target="_blank" class="text-white">here</a></strong>
            to see the PRO product!
        </span>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Liste des Destinations</h5>
                        </div>
                        <a href="{{ url('/destination/create') }}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Nouvelle Destination</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Localisation</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Attraction</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Niveau de durabilité</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($destinations as $item)
                                <tr>
                                    <td class="text-center">
                                        <div class="d-flex px-2 py-1 items-center">
                                            <div>
                                                <img src="{{ asset('images/' . $item->image) }}" class="avatar avatar-sm me-3" alt="user1">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $item->nom }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->localisation }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->description }}</p>
                                    </td>
                                    <td class="text-center">
                                        @if($item->attractions->isNotEmpty())

                                        @foreach($item->attractions as $attraction)
                                        <p class="text-xs font-weight-bold mb-0">{{ $attraction->nomAttraction }} ({{ $attraction->typeAttraction }})</p>
                                        @endforeach

                                        @else
                                        <p>Aucune attraction</p>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->niveauDurabilite }}</p>
                                    </td>
                                    <td class="text-center">
                                        <!-- View button -->
                                        <a href="{{ url('/destination/' . $item->id) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Voir l'activité">
                                            <i class="fas fa-eye text-secondary"></i>
                                        </a>

                                        <!-- Edit button -->
                                        <a href="{{ url('/destination/' . $item->id . '/edit') }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Modifier la déstination">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>

                                        <!-- Delete form -->
                                        <form method="POST" action="{{ url('/destination' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-link text-danger" title="Supprimer l'destination" onclick="return confirm('Confirmer la suppression ?')">
                                                <i class="fas fa-trash text-secondary"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @yield('modal')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection