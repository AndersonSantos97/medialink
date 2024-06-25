<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    //protected $table = 'users';
    protected $fillable = [
        'password',
        'rol',
        'estado',
        'username',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

        // Definir el identificador para la autenticación
    public function getAuthIdentifierName()
    {
        return 'username';
    }

    // public function setPasswordAttribute($value){
    //     $this->attributes['password'] = bcrypt($value);
    // }

    // Definir el campo de la contraseña
    public function getAuthPassword()
    {
        return $this->password;
    }

    public function roles(){
        return $this->belongsTo(roles::class,'id');
    }
}
