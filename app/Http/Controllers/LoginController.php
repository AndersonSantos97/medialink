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
    public function username()
    {
        return 'username';
    }
    public function login(LoginRequest $loginRequest){

        try{
            $credentials = $loginRequest->getCredentials();
            //$credentials = $loginRequest->only('username', 'password');

            // if (!Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
            //     print($credentials);
            //     return redirect()->route('home')->withErrors(['auth' => 'Credenciales incorrectas']);
            // }

            if(!Auth::validate($credentials)){
                return redirect()->route('home')->withErrors(['auth' => 'Credenciales incorrectas']);
            }
    
            // $user = Auth::getProvider()->retrieveByCredentials($credentials);
            // Auth::login($user);
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
