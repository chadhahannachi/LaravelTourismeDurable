<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';
    protected $primaryKey = 'id';

    protected $fillable = [
        'activite_id', // Lien avec l'activité
        'nom_client',  // Nom du client qui réserve
        'email_client', // Email du client
        'date_reservation', // Date de la réservation
        'nombre_personnes', // Nombre de personnes réservées
    ];

    // Définir la relation avec Activite
    public function activite()
    {
        return $this->belongsTo(Activite::class);
    }
}
