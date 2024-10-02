<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Hebergement extends Model
{
    use HasFactory;
    protected $table = 'hebergement';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'label_ecologique', 'impact'];
}

