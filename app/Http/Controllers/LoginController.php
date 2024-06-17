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

        try{
            //$credentials = $loginRequest->getCredentials();
            $credentials = $loginRequest->only('name', 'password');

            if (!Auth::attempt(['name' => $credentials['name'], 'password' => $credentials['password']])) {
                return redirect()->route('home')->withErrors(['auth' => 'Credenciales incorrectas']);
            }
    
            // $user = Auth::getProvider()->retrieveByCredentials($credentials);
            // Auth::login($user);
    
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
