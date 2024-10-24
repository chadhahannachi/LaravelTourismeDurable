<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itineraire extends Model
{
    use HasFactory;
    protected $table = 'itineraires';
    protected $primaryKey = 'id';
    protected $fillable = ['nomItineraire', 'distance', 'moyenTransport'];

    // public function etapes()
    // {
    //     return $this->hasMany(Etape::class);
    // }

    public function etapes()
    {
        return $this->hasMany(Etape::class); // 'itineraire_id' est la clé étrangère dans la table 'etapes'
    }
}
