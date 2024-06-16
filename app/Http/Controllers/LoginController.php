<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('Login');
    }

    public function login(LoginRequest $loginRequest){
        print('entramos a la excepcion');
        try{
            $credentials = $loginRequest->getCredentials();

            if(!Auth::validate($credentials)){
                return redirect()->route('home')->withErrors('auth.failed');
            }
    
            $user = Auth::getProvider()->retrieveByCredentials($credentials);
            Auth::login($user);
    
            return redirect()->route('admin.menu');
        }catch(Exception $e){
            
            return $e->getMessage();
        }
    }

    public function authenticated(Request $request, $user){
        //esto lo dejamos para despues por si queremos cambiar las rutas de acuerdo con}
        //quien se autentica
    }
}
