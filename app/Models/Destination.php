<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;
    protected $table = 'destinations';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nom',            
        'localisation',   
        'niveauDurabilite',
        'description',
        'image'             
    ];
    public function attractions()
    {
        return $this->hasMany(Attraction::class);
    }
    public function rates()
    {
        return $this->hasMany(Rate::class);
    }
}

