<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class usuariosController extends Controller
{
    //Lista todos los usuarios
    public function index()
    {
        $usuarios = usuarios::all();
        return view('',compact('usuarios'));
    }

    //Mostrar el formulario para crear un nuevo usuario
    public function create(){
        return view('');
    }


    //crear un nuevo usuario
    public function store(Request $request){
        
        $request->validate([
            'USU_NOMBRE' => 'required|string|max:8',
            'USU_EMPLEADO' => 'nullable|integer',
            'USU_ESTADO' => 'nullable|integer',
            'USU_PASSWORD' => 'required|string|max:45',
            'USU_ROL' => 'nullable|integer',
        ]);

        $usuario = new usuarios([
            'USU_NOMBRE'=>$request->USU_NOMBRE,
            'USU_EMPLEADO'=>$request->USU_EMPLEADO,
            'USU_ESTADO'=>$request->USU_ESTADO,
            'USU_PASSWORD'=> Hash::make($request->USU_PASSWORD),
            'USU_ROL' => $request->USU_ROL,
        ]);

        $usuario->save();
        return redirect()->route('')->with('success','Usuario Creado con éxito');

    }

    //Mostrar un usuario especifico
    public function show($id){
        $usuario = usuarios::find($id);

        if(!$usuario){
            return redirect()->route('')->with('Error','Usuario no encontrado');
        }
        return view('',compact('usuario'));
    }


    //mostrar el formulario para editar un usuario
    public function edit($id){
        $usuario = usuarios::find($id);

        if(!$usuario){
            return redirect()->route('')->with('eror','Usuario no encontrado');
        }

        return view('',compact('usuario'));
    }

    //Actualizar un usuario existente
    public function update(Request $request,$id){
        $usuario = usuarios::find($id);
        if(!$usuario){
            return redirect()->route('')->with('error','Usuario no actualizado');
        }

        $request->validate([
            'USU_NOMBRE' => 'nullable|string|max:8',
            'USU_EMPLEADO' => 'nullable|integer',
            'USU_ESTADO' => 'nullable|integer',
            'USU_PASSWORD' => 'nullable|string|max:45',
            'USU_ROL' => 'nullable|integer',
        ]);

        if($request->has('USU_NOMBRE')){
            $usuario->USU_NOMBRE = $request->USU_NOMBRE;
        }

        if($request->has('USU_EMPLEADO')){
            $usuario->USU_EMPLEADO = $request->USU_EMPLEADO;
        }

        if($request->has('USU_ESTADO')){
            $usuario->USU_ESTADO = $request->USU_ESTADO;
        }

        if($request->has('USU_PASSWORD')){
            $usuario->USU_PASSWORD = $request->USU_PASSWORD;
        }

        if($request->has('USU_ROL')){
            $usuario->USU_ROL = $request->USU_ROL;
        }

        $usuario->save();

        return redirect()->route('')->with('success','usuario actualizado con exito');
    }

    //eliminar un usuario
    public function destroy($id){
        $usuario = usuarios::find($id);

        if(!$usuario){
            return redirect()->route('')->with('error','Usuario no encontrado');
        }

        $usuario->delete();
        return redirect()->route('')->with('success','Usuario eliminado');
    }

}
