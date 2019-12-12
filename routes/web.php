<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group whichhttp://localhost/controlIngresosApp/app/Http/routes.php
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/' , 'NotaController@index')->name('inicio');

Route::get('/agregar' , 'NotaController@store')->name('store');

Route::get('/editar/{id}' , 'NotaController@Edit')->name('editar');

Route::put('/update{id}' , 'NotaController@update')->name('update');

Route::delete('/eliminar/{id}' , 'NotaController@destroy')->name('eliminar');






