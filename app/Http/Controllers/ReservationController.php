<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\Activite;
use App\Mail\ReservationConfirmed;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
     // Afficher les réservations
     public function index()
     {
         $reservations = Reservation::with('activite')->get();
         return view('reservations.index', compact('reservations'));
     }
 
     // Formulaire de création d'une nouvelle réservation
     public function create($activite_id)
     {
         $activite = Activite::findOrFail($activite_id);
         return view('reservations.create', compact('activite'));
     }
 
    
public function store(Request $request)
{
    $validatedData = $request->validate([
        'activite_id' => 'required|exists:activites,id',
        'nom_client' => 'required|string|max:255',
        'email_client' => 'required|email',
        'nombre_personnes' => 'required|integer|min:1',
        'date_reservation' => 'required|date|after_or_equal:today',
    ]);

    // Trouver l'activité associée
    $activite = Activite::findOrFail($validatedData['activite_id']);

    // Vérifier si la disponibilité est suffisante
    if ($activite->disponibilite < $validatedData['nombre_personnes']) {
        return redirect()->back()->with('error', 'Désolé, pas assez de places disponibles pour cette activité.');
    }

     // Créer la réservation et stocker l'objet dans $reservation
     $reservation = Reservation::create($validatedData);


    // Créer la réservation
    //Reservation::create($validatedData);

    // Mettre à jour la disponibilité de l'activité
    $activite->disponibilite -= $validatedData['nombre_personnes'];
    $activite->save();

     // Envoyer l'email de confirmation de la réservation
     Mail::to($validatedData['email_client'])->send(new ReservationConfirmed($reservation));


    return redirect()->route('reservations.index')->with('flash_message', 'Réservation effectuée avec succès!');
}
     // Détails d'une réservation
     public function show($id)
     {
         $reservation = Reservation::with('activite')->findOrFail($id);
         return view('reservations.show', compact('reservation'));
     }
 
     // Supprimer une réservation
     public function destroy($id)
     {
         Reservation::destroy($id);
         return redirect()->route('reservations.index')->with('flash_message', 'Réservation supprimée avec succès!');
     }
}
