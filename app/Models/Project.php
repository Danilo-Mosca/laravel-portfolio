<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // colleghiamo il type al progetto:
    public function type()
    {
        return $this->belongsTo(Type::class);   //in questo modo da un progetto possiamo accedere e stampare solo il Type collegata a quel progetto
    }
}