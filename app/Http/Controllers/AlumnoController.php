<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;

class AlumnoController extends Controller
{
    //
    public function index(){

        $alumnos=Alumno::all();

        return response()->json($alumnos);
    }

    
    public function salida(Request $request){
       //si se le pone el  return Alumno::create($request->all()); muestra los datos escritos
       // $alumnos = Alumno::create($request->all());
       // return response()->json($alumnos);

       $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'expediente' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'modulo_id' => 'nullable|integer|min:1',
        ]);

        $file = $request->file('imagen');

        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => config('services.cloudinary.cloud_name'),
                'api_key' => config('services.cloudinary.api_key'),
                'api_secret' => config('services.cloudinary.api_secret'),
            ],
            'url' => ['secure' => true],
        ]);

        $resultado = $cloudinary->uploadApi()->upload(
            $file->getRealPath(),
            [
                'folder' => 'alumnos',
                'resource_type' => 'image',
            ]
        );

        $alumno = Alumno::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'expediente' => $request->expediente,
            'imagen_url' => $resultado['secure_url'],
            'imagen_public_id' => $resultado['public_id'],
            'modulo_id' => $request->modulo_id,
        ]);

        return response()->json([
            'message' => 'Alumno creada correctamente',
            'data' => $alumno,
        ], 201);
        
    }


    public function show ($id){

     $alumnos=Alumno::find($id);
     return response()->json($alumnos);
    

    }


     public function update(Request $request, Alumno $alumnos)
    {
    //metodo mas sencillo sin nesecidad de poner todo lo que pertenece a esa tabla
        $alumnos->update($request->all());

        return response()->json($alumnos);
    }
      //Destroy se encuentra el registro para luego eliminarlo..
    public function destroy(Alumno $alumnos)
    {
        $alumnos->delete();
        return response()->json($alumnos);
    }


}