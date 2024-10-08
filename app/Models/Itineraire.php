<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itineraire extends Model
{
    use HasFactory;
    protected $table = 'itineraires';
    protected $primaryKey = 'id';
    protected $fillable = ['nomItineraire', 'distance'];
}
