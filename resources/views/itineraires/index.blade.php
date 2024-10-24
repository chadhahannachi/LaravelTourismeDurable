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
                            <h5 class="mb-0">Liste des Itinéraires</h5>
                        </div>
                        <a href="{{ url('/itineraire/create') }}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Nouvel Itinéraire</a>
                    </div>
                    
                </div>
                <div class="container mt-4"> <!-- Ajout de la classe container pour centrer et organiser -->
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-md-6">
                            @foreach($itineraires as $itineraire)
                            
                            <div class="card mb-3 bg-gray-100">
                    <div class="card-header bg-gray-100 d-flex justify-content-between align-items-center"> 
                    <div class=" text-start">
                        <h6>{{ $itineraire->nomItineraire }}</h6>
                        <p class="text-sm">
                            <span class="font-weight-bold">{{ $itineraire->distance }} km</span> 
                        </p>
                        <p class="text-sm">
                            <span class="font-weight-bold">Moyen de Transport : {{ $itineraire->moyenTransport }}</span> 
                        </p>
                    </div>
                    <div class="ms-auto text-end">
                    <a class="btn btn-link text-dark" href="#" data-bs-toggle="modal" data-bs-target="#editItineraireModal" 
                        onclick="openEditModal('{{ $itineraire->id }}', '{{ $itineraire->nomItineraire }}', {{ $itineraire->distance }})">
                            <i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit
                        </a>

                    <form method="POST" action="{{ url('/itineraire' . '/' . $itineraire->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-link text-danger" title="Supprimer l'itineraire" onclick="return confirm('Confirmer la suppression ?')">
                            <i class="far fa-trash-alt me-2"></i> Delete
                        </button>
                    </form>

                  
                </div>
            </div>
                <div class="card-body">
                    <div class="timeline timeline-one-side">
                        @foreach($itineraire->etapes as $index => $etape)
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <span style="color: #bc2695;">{{ $index + 1 }}</span> <!-- Numéro de l'étape -->
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">{{ $etape->nomEtape }}</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">                        
                                    <i class="fa fa-map-marker" style="color: #bc2695;" aria-hidden="true"></i>
                                        {{ $etape->localisation }}
                                </p>
                                <p class="text-dark text-xs mt-1 mb-0">{{ $etape->description }}</p>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                    Impact : {{ $etape->impact ? 'Oui' : 'Non' }}
                                </p>

                                <div class="text-start">

                                <a href="#" class="mx-3 my-3" data-bs-toggle="modal" data-bs-target="#editEtapeModal" 
                                    onclick="openEditEtapeModal('{{ $etape->id }}', '{{ $etape->nomEtape }}', '{{ $etape->description }}', '{{ $etape->localisation }}', '{{ $etape->impact ? 1 : 0 }}')">
                                    <i class="fas fa-pencil-alt text-secondary " aria-hidden="true"></i>
                                </a>
                                @include('etapes.edit')            
                                            
                                            <form method="POST" action="{{ url('/etape' . '/' . $etape->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-link text-danger" title="Supprimer l'étape" onclick="return confirm('Confirmer la suppression ?')" data-bs-toggle="tooltip" data-bs-original-title="supprimer l'étape">
                                                    <i class="fas fa-trash text-secondary mt-2"></i>
                                                </button>
                                            </form>
                                </div>

                            </div>
                        </div>
                        @endforeach

                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                            <!-- Button to Open Modal -->


                        <a href="#" data-bs-toggle="modal" data-bs-target="#addEtapeModal" 
                            onclick="setItineraireId('{{ $itineraire->id }}')">
                            <i class="fa fa-plus mr-1" style="color: #bc2695;" aria-hidden="true"></i> 
                            </a>

                            </span>
                        </div>
                        @include('etapes.create') <!-- Assuming 'create' contains the modal code -->

                       
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Modal -->
<div class="modal fade" id="editItineraireModal" tabindex="-1" aria-labelledby="editItineraireModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editItineraireModalLabel">Modifier Itinéraire</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editItineraireForm" action="" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="id" id="modalId" />
                    <div class="mb-3">
                        <label for="modalNomItineraire" class="form-label">Nom de l'Itinéraire</label>
                        <input type="text" name="nomItineraire" id="modalNomItineraire" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="modalDistance" class="form-label">Distance (km)</label>
                        <input type="number" name="distance" id="modalDistance" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="moyenTransport">Moyen de Transport</label>
                        <select name="moyenTransport" class="form-control" required>
                            <option value="moyenTransport" disabled selected>Choisissez un moyen de transport</option>
                            @foreach($moyenTransports as $transport)  
                                <option value="{{ $transport->type }}">{{ $transport->type }}</option> <!-- Utilisez l'ID du moyen de transport ici -->
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn bg-gradient-primary btn-lg">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>
</div>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
    function openEditModal(id, nomItineraire, distance) {
        document.getElementById('modalId').value = id;
        document.getElementById('modalNomItineraire').value = nomItineraire;
        document.getElementById('modalDistance').value = distance;
        document.getElementById('editItineraireForm').action = `/itineraire/${id}`;
    }
</script>

<script>
    function setItineraireId(itineraireId) {
        document.getElementById('itineraire_id').value = itineraireId;
    }
</script>

<script>
    function openEditEtapeModal(id, nomEtape, description, localisation, impact) {
        document.getElementById('modalEtapeId').value = id;
        document.getElementById('modalNomEtape').value = nomEtape;
        document.getElementById('modalDescription').value = description;
        document.getElementById('modalLocalisation').value = localisation;
        document.getElementById('modalImpact').value = impact;
        document.getElementById('editEtapeForm').action = `/etape/${id}`;
    }
</script>


