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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'usu_nombre'=>'requiered',
            'usu_password'=>'required',
            'usu_rol'=>'requiered',
            'usu_estado'=>'required'
        ];
    }

    public function getCredentials(){
        $usu_nombre=$this->get('usu_nombre');
        $usu_password=$this->get('usu_password');
        $usu_rol = $this->get('usu_rol');
        $usu_estado = $this->get(1);

        return $this->only('usu_nombre','usu_password','usu_rol','usu_estado');
    }
}
