<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\usuariosController;
use App\Http\Controllers\empleadoController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

//Lleva a la pagina principal
//Route::get('/',[UserController::class,'usersview'])->name('users.view');

Route::get('/',[LoginController::class,'index'])->name('home');

//Ruta para el login
Route::post('/login',[LoginController::class,'login'])->name('user.login');

//Ruta para el logout
Route::post('/logout',[LoginController::class,'logout'])->name('user.logout');



//ruta para el menu del admin
Route::get('/menuadmin',[RolesController::class,'menu'])->name('admin.menu');

//ruta para el menu del moderador
Route::get('/menumodera',[RolesController::class,'moder'])->name('moder.menu');

//ruta para el menu del visor
Route::get('/menuvisor',[RolesController::class,'visor'])->name('visor.menu');

//Ruta para acceder a la vista de usuario 
Route::get('/usuarios',[UserController::class,'usersview'])->name('user.view');

//ruta de tipo post para guardar la informacion del usuario
Route::post('/usuarios/save',[UserController::class,'store'])->name('users.save');

//Ruta para actualizar el usuario
Route::put('usuaios/update/{id}',[UserController::class,'update'])->name('users.update');

//ruta para empleados
Route::get('/empleados',[empleadoController::class,'emp'])->name('Empleados');

