<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\usuariosController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

//Lleva a la pagina principal
//Route::get('/',[UserController::class,'usersview'])->name('users.view');

Route::get('/',[LoginController::class,'index'])->name('home');

//Ruta para el login
Route::post('/login',[LoginController::class,'login'])->name('user.login');

//ruta para el menu del medico
Route::get('/menuadmin',[UserController::class,'menu'])->name('admin.menu');

//ruta de tipo post para guardar la informacion del usuario
Route::post('/usersview/save',[UserController::class,'store'])->name('users.save');