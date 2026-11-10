<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    use HasFactory;
    // Relacion Uno a Muchos
    public function alumnos(){
        return $this->hasMany('App\Models\alumno');
    }

    //Relacion muchos a muchos
    public function profesors(){
        return $this->belongsToMany('App\Models\profesor');
    }
    
    protected $fillable = [
        'codigo',
        'nombre',
       
    ];
}

