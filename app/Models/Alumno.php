<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    //Relacion Uno a Muchos (Inversa) 
    public function modulo(){
        return $this->belongsTo('App\Models\modulo');
    }

    protected $fillable = [
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'expediente',
        'imagen_url',
        'imagen_public_id',
        'modulo_id',
       
    ];


}
