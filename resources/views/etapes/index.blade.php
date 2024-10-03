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
                            <h5 class="mb-0">Liste des Etapes</h5>
                        </div>
                        <a href="{{ url('/etape/create') }}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Nouvelle Etape</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom Etape</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Localisation</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Impact</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($etapes as $item)
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->nomEtape }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->description }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->localisation }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->impact }}</p>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ url('/etape/' . $item->id) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Voir l'étape">
                                                <i class="fas fa-eye text-secondary"></i>
                                            </a>
                                            <a href="{{ url('/etape/' . $item->id . '/edit') }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Modifier l'étape">
                                                <i class="fas fa-user-edit text-secondary"></i>
                                            </a>
                                            <form method="POST" action="{{ url('/etape' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-link text-danger" title="Supprimer l'étape" onclick="return confirm('Confirmer la suppression ?')">
                                                    <i class="fas fa-trash text-secondary"></i>
                                                </button>
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
