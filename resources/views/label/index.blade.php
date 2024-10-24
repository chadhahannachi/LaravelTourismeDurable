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
                            <h5 class="mb-0">Liste des hébergements</h5>
                        </div>
                        <div class="d-flex">
                            <a href="{{ route('label.create') }}" class="btn bg-gradient-secondary btn-sm mb-0 me-2" type="button">+&nbsp; Nouveau Label Écologique</a> <!-- New button for label -->
                            <a href="{{ url('/hebergement/create') }}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Nouvel Hébergement</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Label écologique</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Impact</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hebergements as $item)
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->nom }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->label_ecologique }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->impact }}</p>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ url('/hebergement/' . $item->id) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Voir l'hébergement">
                                                <i class="fas fa-eye text-secondary"></i>
                                            </a>
                                            <a href="{{ url('/hebergement/' . $item->id . '/edit') }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Modifier l'hébergement">
                                                <i class="fas fa-user-edit text-secondary"></i>
                                            </a>
                                            <form method="POST" action="{{ url('/hebergement' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-link text-danger" title="Supprimer l'hébergement" onclick="return confirm('Confirmer la suppression ?')">
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
