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
        // if(Auth::check()){
        //     return view('Menuadmin');
        // }else{
        //     //dd(Auth::check());
        //     return redirect()->route('home');
        // }
        return view('Menuadmin');
    }

        //lleva a la vista del menu del moderador
    public function moder(){
        return view('Menumoderador');
            
    }

    public function visor(){
        return view('Menuvisor');
    }

}
