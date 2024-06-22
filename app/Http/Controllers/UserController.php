<?php

namespace App\Http\Controllers;

use App\Models\roles;
use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\search;

class UserController extends Controller
{
    
        //lleva a la vista donde se administran los usuarios
        public function usersview(){
            //$list = $this->searchRole();
            try{
                $roles = roles::all();
                
                $users = DB::table('users')
                ->join('roles','users.rol','=','roles.id')
                ->select('users.id','users.username','roles.rol_descripcion')
                ->get();
                //dd($roles);
                return view('Usuarios',compact('users','roles'));
            }catch(Exception $e){
                return $e->getMessage();
            }
        }
    
        //Lista todos los usuarios
        public function index()
        {
            try{
                
                $usuarios = User::all();
                return view('',compact('usuarios'));
            }catch(Exception $e){
                return $e->getMessage();
            }
            
        }
    
        //Mostrar el formulario para crear un nuevo usuario
        public function create(){
            try{
                return view('');
            }catch(Exception $e){
                return $e->getMessage();
            }
            
        }
        
        //Buscar todos los usuarios que esten activos
        public function searchRole(){
            //$roles = roles::find
            $users = User::with('rol')->get();
            return $users;
        }
    
        //crear un nuevo usuario
        public function store(Request $request){
            
            try{
                $usuario = new User([
                    'username'=>$request->usu_nombre,
                    'estado'=>1,
                    'password'=> Hash::make($request->usu_password),
                    'rol' => $request->usu_rol,
                    'created_at'=>Carbon::now(),
                    'name'=>$request->usu_nombre
                ]);
        
                $usuario->save();
                return redirect()->route('user.view')->with('success','Usuario Creado con éxito');
            }catch(Exception $e){
                print($e);
                return $e->getMessage();
            }
    
        }
    
        //Mostrar un usuario especifico
        public function show($id){
    
            try{
                $usuario = User::find($id);
    
                if(!$usuario){
                    return redirect()->route('')->with('Error','Usuario no encontrado');
                }
                return view('',compact('usuario'));
            }catch(Exception $e){
                return $e->getMessage();
            }
            
        }
    
    
        //mostrar el formulario para editar un usuario
        public function edit($id){
    
            try{
                $usuario = User::find($id);
    
                if(!$usuario){
                    return redirect()->route('')->with('eror','Usuario no encontrado');
                }
        
                return view('',compact('usuario'));
            }catch(Exception $e){
                return $e->getMessage();
            }
            
        }
    
        //Actualizar un usuario existente
        public function update(Request $request,$id){
    
            try{
                $usuario = User::find($id);
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
            }catch(Exception $e){
                return $e->getMessage();
            }
            
    
    
        }
    
        //eliminar un usuario
        public function destroy($id){
    
            try{
                $usuarios = User::all();
                $usuario = User::find($id);
    
                if(!$usuario){
                    return redirect()->route('')->with('error','Usuario no encontrado');
                }
        
                $usuario->delete();
                return redirect()->route('')->with('success','Usuario eliminado');
            }catch(Exception $e){
                return $e->getMessage();
            }
            
        }
}