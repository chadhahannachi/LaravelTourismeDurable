<!-- Modal -->

















<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Étape</title>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- Autres styles ici -->
</head>
<body>
    <!-- Votre contenu de modal ici -->
    
    <!-- Modal -->
    <div class="modal fade" id="addEtapeModal" tabindex="-1" aria-labelledby="addEtapeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEtapeModalLabel">Ajouter une Étape</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addEtapeForm" action="{{ url('/itineraire') }}" method="POST">
                    @csrf

                    <!-- Nom de l'étape -->
                    <div class="form-group">
                        <label for="nomEtape">Nom de l'étape</label>
                        <input type="text" name="nomEtape" id="nomEtape" class="form-control" required>
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" required></textarea>
                    </div>

                    <!-- Localisation -->
                    <div class="form-group">
                            <label for="localisation">Localisation</label>
                            <input type="text" name="localisation" id="localisation" class="form-control" required>
                            <button type="button" class="btn btn-secondary" onclick="showMap()">Choisir sur la carte</button>
                        </div>

                        <!-- Ajoutez ici votre carte -->
                        <div id="map" style="height: 300px; display: none;"></div>

                   <!-- Impact -->
<div class="form-group">
    <label for="impact">Impact</label>
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" name="impact" id="impact" value="1">
        <label class="form-check-label" for="impact">A un impact</label>
    </div>
</div>


                    <input type="hidden" name="itineraire_id" id="itineraire_id" value="{{ $itineraire->id }}">

                    <div class="text-center">
                        <button type="submit" class="btn bg-gradient-primary btn-lg">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        let map;
        let marker;

        function showMap() {
            document.getElementById("map").style.display = "block"; // Affiche la carte
            initMap();
        }

        function initMap() {
            map = L.map('map').setView([48.8566, 2.3522], 13); // Coordonnées initiales (ex: Paris)

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            marker = L.marker([48.8566, 2.3522]).addTo(map); // Ajoute un marqueur initial

            map.on('click', function(e) {
                marker.setLatLng(e.latlng); // Déplace le marqueur à la position cliquée
                document.getElementById("localisation").value = e.latlng.lat + ", " + e.latlng.lng; // Met à jour le champ de localisation
            });
        }
    </script>
</body>
</html>
