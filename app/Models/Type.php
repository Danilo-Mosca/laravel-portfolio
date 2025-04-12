<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    // colleghiamo i progetti:
    public function projects()
    {
        return $this->hasMany(Project::class);  //in questo modo da un Type posso stampare tutti i Progetti ad esso collegati
    }
}