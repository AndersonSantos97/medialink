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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'USU_NOMBRE'=>'requiered',
            'USU_PASSWORD'=>'required',
            'USU_ROL'=>'requiered',
            'USU_ESTADO'=>'required'
        ];
    }

    public function getCredentials(){
        $usu_nombre=$this->get('USU_NOMBRE');
        $usu_password=$this->get('USU_PASSWORD');
        $usu_rol = $this->get('USU_ROL');
        $usu_estado = $this->get(1);

        return $this->only('usu_nombre','usu_password','usu_rol','usu_estado');
    }
}
