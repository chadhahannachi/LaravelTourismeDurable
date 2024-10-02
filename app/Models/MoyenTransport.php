<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoyenTransport extends Model
{
    use HasFactory;
    protected $table = 'moyenTransports';
    protected $primaryKey = 'id';
    protected $fillable = ['type'];
}
