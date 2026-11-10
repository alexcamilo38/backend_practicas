<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    //
     public function index(){

        $profesors=Profesor::all();

        return response()->json($profesors);


    }
    
    public function salida(Request $request){
       //si se le pone el  return Profesor::create($request->all()); muestra los datos escritos
        $profesors = Profesor::create($request->all());
        return response()->json($profesors);
        
    }



    public function show ($id){

     $profesors=Profesor::find($id);
     return response()->json($profesors);
    
    }

    
     public function update(Request $request, Profesor $profesors)
    {
    //metodo mas sencillo sin nesecidad de poner todo lo que pertenece a esa tabla
        $profesors->update($request->all());

        return response()->json($profesors);
    }
      //Destroy se encuentra el registro para luego eliminarlo..
    public function destroy(Profesor $profesors)
    {
        $profesors->delete();
        return response()->json($profesors);
    }

}
