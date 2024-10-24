@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="alert alert-secondary mx-4" role="alert">
        <span class="text-white">
            <strong>Ajouter un nouveau Moyen de Transport</strong> Remplissez le formulaire ci-dessous.
        </span>
    </div>

    <div class="container" style="margin-top: 20px;">
        <div class="card">
            <div class="card-header text-center">
                <h5 class="mb-0">Nouveau Moyen de Transport</h5>
            </div>
            <div class="card-body">

                <form action="{{ url('moyenTransport') }}" method="post">
                    {!! csrf_field() !!}

                    <!-- Type du moyen de transport -->
                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="text" name="type" id="type" class="form-control" required>
                    </div>

                    <div class="text-center">
                        <input type="submit" value="Enregistrer" class="btn bg-gradient-primary btn-lg">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
