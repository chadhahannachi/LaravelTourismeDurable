@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="alert alert-secondary mx-4" role="alert">
        <span class="text-white">
            <strong>Créer une nouvelle Destination</strong> Remplissez le formulaire ci-dessous.
        </span>
    </div>

    <div class="container" style="margin-top: 20px;">
        <div class="card">
            <div class="card-header text-center">
                <h5 class="mb-0">Nouvelle Destination</h5>
            </div>
            <div class="card-body">

                <form action="{{ url('destination') }}" method="post" novalidate enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nom">Nom de la destination</label>
                                <input type="text" name="nom" id="nom" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="localisation">Localisation</label>
                                <input type="text" name="localisation" id="localisation" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="niveauDurabilite">Niveau de durabilité</label>
                        <input type="number" name="niveauDurabilite" id="niveauDurabilite" class="form-control" min="1" max="10" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" required></textarea>
                    </div>

                    <!-- Container for Attraction Blocks -->
                    <div id="attraction-container" class="container mb-4">
                        <div class="row align-items-center attraction-block" id="attraction-block-1">
                            <div class="col-md-2">
                                <label for="nonAttraction-1">Nom Attraction</label>
                                <input type="text" name="nonAttraction[]" id="nonAttraction-1" class="form-control" required>
                            </div>
                            <div class="col-md-2">
                                <label for="typeAttraction-1">Type Attraction</label>
                                <input type="text" name="typeAttraction[]" id="typeAttraction-1" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="descriptionAttraction-1">Description</label>
                                <input name="descriptionAttraction[]" id="descriptionAttraction-1" class="form-control" required>
                            </div>
                            <div class="col-md-1 text-center mt-5">
                                <button class="btn btn-outline-secondary" type="button" id="add-attraction-1">+</button>
                            </div>
                            <div class="col-md-1 text-center mt-5">
                                <button class="btn btn-outline-secondary" type="button" id="remove-attraction-1">-</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                                <label for="image">Destination Image</label>
                                <input type="file" name="image" id="image" class="form-control" required>
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

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const attractionContainer = document.getElementById('attraction-container');
        let attractionCount = 1; // Start counting from the initial block

        // Function to add a new attraction block
        function addAttractionBlock() {
            attractionCount++; // Increment count for new ID
            const newBlock = document.createElement('div');
            newBlock.classList.add('row', 'align-items-center', 'attraction-block');
            newBlock.id = `attraction-block-${attractionCount}`;
            newBlock.innerHTML = `
                <div class="col-md-2">
                    <label for="nonAttraction-${attractionCount}">Nom Attraction</label>
                    <input type="text" name="nonAttraction[]" id="nonAttraction-${attractionCount}" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <label for="typeAttraction-${attractionCount}">Type Attraction</label>
                    <input type="text" name="typeAttraction[]" id="typeAttraction-${attractionCount}" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="descriptionAttraction-${attractionCount}">Description</label>
                    <input name="descriptionAttraction[]" id="descriptionAttraction-${attractionCount}" class="form-control" required>
                </div>
                <div class="col-md-1 text-center mt-5">
                    <button class="btn btn-outline-secondary" type="button" id="add-attraction-${attractionCount}">+</button>
                </div>
                <div class="col-md-1 text-center mt-5">
                    <button class="btn btn-outline-secondary" type="button" id="remove-attraction-${attractionCount}">-</button>
                </div>
            `;
            attractionContainer.appendChild(newBlock);
        }

        // Function to remove the last attraction block
        function removeAttractionBlock() {
            const attractionBlocks = document.querySelectorAll('.attraction-block');
            if (attractionBlocks.length > 1) {
                attractionBlocks[attractionBlocks.length - 1].remove();
                attractionCount--; // Decrement count
            }
        }

        // Event delegation for the attraction container
        attractionContainer.addEventListener('click', function(event) {
            const target = event.target;
            if (target.matches('[id^="add-attraction-"]')) {
                addAttractionBlock();
            } else if (target.matches('[id^="remove-attraction-"]')) {
                removeAttractionBlock();
            }
        });
    });
</script>
@endsection