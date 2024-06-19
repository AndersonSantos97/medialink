<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

     public function authorize(): bool
     {
         return true;
     }
 
    //  public function rules(): array
    //  {
    //      return [
    //          'username' => 'required',
    //          'password' => 'required',
    //      ];
    //  }
        /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required',
            'password'=> 'required',
            'rol'=> 'required',
        ];
    }

    public function getCredentials(){
        $username =$this ->get('username');
        $password =$this ->get('password');
        $rol = $this->get('rol');

        return $this->only('username','password','rol');
    }
}
