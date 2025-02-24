<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    //Relación con rooms
    public function sales()
    {
        return $this->belongsTo(Sale::class, 'sale');
    }
}
