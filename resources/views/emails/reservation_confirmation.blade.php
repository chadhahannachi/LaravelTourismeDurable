<!DOCTYPE html>
<html>
<head>
    <title>Confirmation de votre réservation</title>
</head>
<body>
    <h1>Bonjour {{ $reservation->nom_client }},</h1>
    <p>Votre réservation pour l'activité "{{ $reservation->activite->nom }}" est confirmée.</p>
    <p>Nombre de personnes : {{ $reservation->nombre_personnes }}</p>
    <p>Date de réservation : {{ $reservation->date_reservation }}</p>
    <p>Merci pour votre réservation !</p>
</body>
</html>
