<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    use HasFactory;
    protected $table = 'etapes';
    protected $primaryKey = 'id';
    protected $fillable = ['nomEtape', 'description', 'localisation', 'impact'];

    // public function itineraire()
    // {
    //     return $this->belongsTo(Itineraire::class);
    // }

    public function itineraire()
    {
        return $this->belongsTo(Itineraire::class, 'itineraire_id');
    }
}
