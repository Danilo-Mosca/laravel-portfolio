<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    // creo la relazione many to many (molti a molti) con la tabella projects:
    public function projects(){
        return $this->belongsToMany(Project::class);
    }
}
