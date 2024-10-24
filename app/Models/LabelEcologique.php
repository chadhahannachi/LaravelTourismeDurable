<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabelEcologique extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'label_ecologiques';

    // Define the primary key (optional, 'id' is default)
    protected $primaryKey = 'id';

    // Allow mass assignment on these fields
    protected $fillable = ['nom', 'criteres'];

    // One LabelEcologique can have many Hebergements
    public function hebergements()
    {
        return $this->hasMany(Hebergement::class);
    }
}
