<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ParceirosController;
use App\Http\Controllers\AlertasController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//parceiros
Route::get('/parceiros', [ParceirosController::class, 'index'])->name('parceiros');

// Route::get('/parceiros', [ParceirosController::class, 'index'])->name('parceiros.index');
Route::get('/parceiros/{id}/edit', [ParceirosController::class, 'edit'])->name('parceiros.edit');
Route::put('/parceiros/{id}', [ParceirosController::class, 'update'])->name('parceiros.update');
Route::delete('/parceiros/{id}', [ParceirosController::class, 'destroy'])->name('parceiros.destroy');
Route::get('/parceiros/create', [ParceirosController::class, 'create'])->name('parceiros.create');
Route::post('/parceiros', [ParceirosController::class, 'store'])->name('parceiros.store');


//alertas
Route::get('/alertas', [AlertasController::class, 'index'])->name('alertas');
Route::post('/enviarAlertaEmail', 'App\Http\Controllers\AlertasController@enviarAlerta')->name('enviar.alerta');




