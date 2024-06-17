<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class usuarios extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = "usuarios";

    //Aqui especificamos cual es la clave primaria
    protected $primaryKey = "ID";

    //Campos que pueden ser asignados masivamente
    protected $fillable = [
        'USU_NOMBRE',
        'USU_ESTADO',
        'USU_PASSWORD',
        'USU_ROL',
    ];


    //ocultar campos sensibles
    protected $hidden = [
        'USU_PASSWORD',
    ];


    //definir que campos son fechas 
    protected $dates = [
        'created_at',
        'updated_at',
    ];


    //Definir la relacion con el rol (si existe una tabla roles)
    public function rol()
    {
        return $this->belongsTo(Roles::class,'USU_ROL');
    }

        // Ajustar para usar el campo de nombre de usuario
        public function getAuthIdentifierName()
        {
            return 'USU_NOMBRE';
        }
    
        // Ajustar para usar el campo de contraseña personalizado
        public function getAuthPassword()
        {
            return $this->USU_PASSWORD;
        }
}
