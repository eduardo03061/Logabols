<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NominaController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\SalesController;


use App\Http\Controllers\ClientesController;

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
Route::get('/Pedidos/Registro_Nuevo', [PedidosController::class, 'create'])->name('pedidos.create');
Route::post('/Pedidos/Registro_Nuevo', [PedidosController::class, 'storage'])->name('pedidos.storage');
Route::get('/Pedidos/Detalles/{id}', [PedidosController::class, 'show'])->name('pedidos.showdetails');


Route::get('/Inventory', [InventoryController::class, 'index'])->name('inventory.list');
Route::get('/Inventory/New_Inventory', [InventoryController::class, 'create'])->name('inventory.create');
Route::post('/Inventory/New_Inventory', [InventoryController::class, 'storage'])->name('inventory.storage');
Route::get('/Inventory/Details/{id}', [InventoryController::class, 'show'])->name('inventory.showdetails');
Route::get('/Inventory/Edit/{id}', [InventoryController::class, 'edit'])->name('inventory.edit');
Route::post('/Inventory/update/{id}', [InventoryController::class, 'update'])->name('inventory.update');
Route::get('/Inventory/Delete/{id}', [InventoryController::class, 'delete'])->name('inventory.delete');



Route::get('/Sales', [SalesController::class, 'index'])->name('sales.index');
Route::get('/Sales/new-sale', [SalesController::class, 'create'])->name('sales.create');
Route::post('/Sales/new-sale', [SalesController::class, 'storage'])->name('sales.storage');
Route::get('/Sales/list', [SalesController::class, 'list'])->name('sales.list');
Route::get('/Sales/Details/{id}', [SalesController::class, 'show'])->name('sales.showdetails');
Route::get('/Sales/Print/{id}', [SalesController::class, 'print'])->name('sales.print');


Route::get('/Nomina', [NominaController::class, 'index'])->name('nomina.list');
Route::get('/Nomina/Registro_Nuevo', [NominaController::class, 'create'])->name('nomina.create');
Route::post('/Nomina/Registro_Nuevo', [NominaController::class, 'storage'])->name('nomina.storage');
Route::get('/Nomina/Detalles/{id}', [NominaController::class, 'show'])->name('nomina.showdetails');



//Rutas de modulo cuentas por pagar
Route::get('/Clientes', [ClientesController::class, 'index'])->name('clientes.list');
Route::get('/Nomina/Registro_Nuevo', [ClientesController::class, 'create'])->name('clientes.create');
Route::post('/Nomina/Registro_Nuevo', [ClientesController::class, 'storage'])->name('clientes.storage');
Route::get('/Nomina/Detalles/{id}', [ClientesController::class, 'show'])->name('clientes.showdetails');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

