<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NominaController;
use App\Http\Controllers\PedidosController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/Contacto', function () {
    return view('contacto');
});





Route::get('/Pedidos', [PedidosController::class, 'index'])->name('pedidos.list');

 
Route::get('/Nomina', [NominaController::class, 'index'])->name('nomina.list');

 
Route::get('/Nomina/Registro_Nuevo', [NominaController::class, 'create'])->name('nomina.create');

 
Route::post('/Nomina/Registro_Nuevo', [NominaController::class, 'storage'])->name('nomina.storage');



 
Route::get('/Nomina/Detalles/{id}', [NominaController::class, 'show'])->name('nomina.showdetails');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

