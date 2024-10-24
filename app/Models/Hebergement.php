<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hebergement extends Model
{
    use HasFactory;

    protected $table = 'hebergements';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'impact', 'label_ecologique_id']; // Including label_ecologique_id
    
    // Relation Many-to-One with LabelEcologique
    public function labelEcologique()
    {
        // Explicitly specifying the foreign key in case of a custom name
        return $this->belongsTo(LabelEcologique::class, 'label_ecologique_id');
    }
}
