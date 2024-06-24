<?php

namespace App\Http\Controllers;


use App\Http\Requests\LoginRequest;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

    public function login(Request $request){

        try{
            $credentials =[
                "username"=>$request->username,
                "password"=>$request->password,
                "estado"=>1,
            ];
    
            $remember =($request->has('remember')?true:false);
    
            if(Auth::attempt($credentials,$remember)){
                $request->session()->regenerate();

                $user = Auth::user();
                switch($user->rol){
                    case 1:
                        return redirect()->intended(route('admin.menu'));

                    case 2:
                        return redirect()->intended(route('moder.menu'));
                    
                    case 3:
                        return redirect()->intended(route('visor.menu'));
                    default:
                        redirect()->route('home');
                }
                //return redirect()->intended(route('admin.menu'));

            }else{

                return redirect()->route('home')->withErrors(['auth' => 'Credenciales incorrectas']);
            }
        }catch(Exception $e){
            return $e->getMessage();
        }

    }

    public function logout(Request $request){
        try{
            //Session::flush();
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerate();
    
            return redirect()->route('home');

        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function login2(LoginRequest $loginRequest){

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
