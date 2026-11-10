<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use Illuminate\Http\Request;

class ModuloController extends Controller
{
    //
    public function index(){

        $modulos=Modulo::all();

        return response()->json($modulos);


    }
    
    public function salida(Request $request){
       //si se le pone el  return Modulo::create($request->all()); muestra los datos escritos
        $modulos = Modulo::create($request->all());
        return response()->json($modulos);
        
    }

    public function show ($id){

     $modulos=Modulo::find($id);
     return response()->json($modulos);
    
    }

    
     public function update(Request $request, Modulo $modulos)
    {
    //metodo mas sencillo sin nesecidad de poner todo lo que pertenece a esa tabla
        $modulos->update($request->all());

        return response()->json($modulos);
    }
      //Destroy se encuentra el registro para luego eliminarlo..
    public function destroy(Modulo $modulos)
    {
        $modulos->delete();
        return response()->json($modulos);
    }
}
