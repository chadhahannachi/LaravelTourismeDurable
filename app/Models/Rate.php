<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $table = 'rates';
    protected $primaryKey = 'id';

    protected $fillable = [
        'stars',            
        'review',   
        'destination_id',
        'user_id',
        'image'             
    ];
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

