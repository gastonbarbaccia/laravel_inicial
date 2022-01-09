<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {    

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard'); //Ruta raiz de la aplicacion, en este caso seria la pagina dashboard

Route::get('/create_user',[DashboardController::class,'create_user'])->name('create.user'); //Esta ruta carga la pagina con el formulario para crear un nuevo usuario

Route::post('/save_user',[DashboardController::class,'save_user'])->name('save.user'); //Esta ruta se encarga de guardar los datos cargados en el formulario anterior

Route::delete('/delete_user/{id}',[DashboardController::class,'delete_user'])->name('delete.user'); //Esta ruta elimina un usuario en base al ID que se le indique en la URI

Route::get('/edit_user/{id}',[DashboardController::class,'edit_user'])->name('edit.user'); //Esta ruta carga una pagina con un formulario y dentro de este se muestran los datos del registro traido para ser editados

Route::put('/update_user/{id}',[DashboardController::class,'update_user'])->name('update.user'); //Esta ruta se encarga de guardar los nuevos datos modificados en la ruta anterior

});


Auth::routes();
