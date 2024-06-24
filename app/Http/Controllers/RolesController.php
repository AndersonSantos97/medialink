<?php

namespace App\Http\Controllers;

use App\Models\roles;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{
    //lleva a la vista del menu del administrador
    public function menu(){
        if(Auth::check()){
            redirect()->route('home');
            
        }else{
            dd(Auth::check());
            return view('Menuadmin');
        }
        
        
    }

        //lleva a la vista del menu del moderador
    public function moder(){
        return view('Menumoderador');
            
    }

    public function visor(){
        return view('Menuvisor');
    }

}
