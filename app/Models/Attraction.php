<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = [
        'nomAttraction',            
        'typeAttraction',   
        'descriptionAttraction',
        'destination_id'
    ];
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
