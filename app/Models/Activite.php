<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\ActivityType;

class Activite extends Model
{
    use HasFactory;
    protected $table = 'activites';
    protected $primaryKey = 'id';

    // Columns that can be mass assigned
    protected $fillable = [
        'nom',             // corresponds to the name of the step
        'description',     // corresponds to the description of the step
        'type',            // corresponds to the type of step
        'niveau_durabilite', // corresponds to the durability level
        'prix'   ,          // corresponds to the price
        'disponibilite',
        'image',
     
    ];

    protected $casts = [
        'type' => ActivityType::class, // Cast 'type' to the enum
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

 
}
