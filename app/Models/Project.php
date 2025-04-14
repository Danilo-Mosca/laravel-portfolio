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

    // Colleghiamo i progetti e creo la relazione 1 to many (1 a molti) tra la tabella technologies (1) e la tabella projects (molti):
    public function technologies()
    {
        return $this->belongsTo(Technology::class);
    }
}