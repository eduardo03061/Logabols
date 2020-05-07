<?php

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


Route::get('/Nomina', 'NominaController@index')->name('nomina.list');
Route::get('/Nomina/Registro_Nuevo', 'NominaController@create')->name('nomina.create');

Route::post('/Nomina/Registro_Nuevo', 'NominaController@storage')->name('nomina.storage');

