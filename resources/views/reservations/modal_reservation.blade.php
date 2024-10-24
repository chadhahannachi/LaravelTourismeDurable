<div class="modal fade" id="reservationModal" tabindex="-1" role="dialog" aria-labelledby="reservationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reservationModalLabel">Réserver l'activité : {{ $activites->nom }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Affichage des messages d'erreur ou de succès -->
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if(session('flash_message'))
                    <div class="alert alert-success">
                        {{ session('flash_message') }}
                    </div>
                @endif

                <form action="{{ route('reservations.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="activite_id" value="{{ $activites->id }}">
                    
                    <div class="form-group">
                        <label for="nom_client">Nom :</label>
                        <input type="text" class="form-control" name="nom_client" required>
                    </div>

                    <div class="form-group">
                        <label for="email_client">Email :</label>
                        <input type="email" class="form-control" name="email_client" required>
                    </div>

                    <div class="form-group">
                        <label for="nombre_personnes">Nombre de personnes :</label>
                        <input type="number" class="form-control" name="nombre_personnes" min="1" required>
                    </div>

                    <div class="form-group">
                        <label for="date_reservation">Date de réservation :</label>
                        <input type="date" class="form-control" name="date_reservation" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Réserver</button>
                </form>
            </div>
        </div>
    </div>
</div>
