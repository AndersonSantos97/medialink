<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    use HasFactory;
    protected $table = "usuarios";

    //Aqui especificamos cual es la clave primaria
    protected $primaryKey = "ID";

    //Campos que pueden ser asignados masivamente
    protected $fillable = [
        'USU_NOMBRE',
        'USU_EMPLEADO',
        'USU_ESTADO',
        'USU_PASSWORD',
        'USU_ROL',
    ];


    //ocultar campos sensibles
    protected $hidden = [
        'usu_password',
    ];


    //definir que campos son fechas 
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    //Definir la relacion con el empleado (si existe una tabla empleados)
    public function empleado()
    {
        return $this->belongsTo(Empleado::class,'USU_EMPLEADO');
    }

    //Definir la relacion con el rol (si existe una tabla roles)
    public function rol()
    {
        return $this->belongsTo(Roles::class,'USU_ROL');
    }
}
