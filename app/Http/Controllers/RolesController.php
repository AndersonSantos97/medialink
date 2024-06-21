<?php

namespace App\Http\Controllers;

use App\Models\roles;
use Exception;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    //lleva a la vista del menu del administrador
    public function menu(){
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
